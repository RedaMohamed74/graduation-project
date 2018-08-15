<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Pharamcy;
use App\Attribute;
use App\Drugs;
use App\Bill;
use App\Quantity; 
use Validator;

class HomeController extends Controller
{
    public function getIndex()
    {
        $id = Auth::user();
        $phars = Pharamcy::where('user_id','like','%'.$id['id'].'%')->orderBy('created_at','desc')->get();
        $attributes = Attribute::orderBy('created_at','desc')->get();
        $drugs = Drugs::orderBy('created_at','desc')->get();
        return view('index',compact('attributes','drugs','phars'));
    }

    public function gethome()
    {
        $id = Auth::user();
        $phars = Pharamcy::where('user_id','like','%'.$id['id'].'%')->orderBy('created_at','desc')->get();
        $attributes = Attribute::orderBy('created_at','desc')->get();
        $drugs = Drugs::orderBy('created_at','desc')->get();
        return view('index',compact('attributes','drugs','phars'))->with(['message' => 'welcome ^.^']);
    }

    public function profile()
    {
        $id = Auth::user();
        $phars = Pharamcy::where('user_id','like','%'.$id['id'].'%')->orderBy('created_at','desc')->get();
        $attributes = Attribute::orderBy('created_at','desc')->get();
        $drugs = Drugs::orderBy('created_at','desc')->get();
        return view('pages.profile',compact('attributes','drugs','phars'))->with(['message' => 'welcome ^.^']);
    }

    public function getinfoph()
    {
        $id = Auth::user();
        $phars = Pharamcy::where('user_id','like','%'.$id['id'].'%')->orderBy('created_at','desc')->get();
        $attributes = Attribute::orderBy('created_at','desc')->get();
        $drugs = Drugs::orderBy('created_at','desc')->get();
        return view('pages.info_ph',compact('attributes','drugs','phars'))->with(['message' => 'welcome ^.^']);
    }    

    public function result()
    {
        $id = Auth::user();
        $phars = Pharamcy::where('user_id','like','%'.$id['id'].'%')->orderBy('created_at','desc')->get();
        $attributes = Attribute::orderBy('created_at','desc')->get();
        $drugs = Drugs::orderBy('created_at','desc')->get();
        return view('pages.result',compact('attributes','drugs','phars'))->with(['message' => 'welcome ^.^']);
    }    

    public function bills()
    {
        $id = Auth::user();
        $phars = Pharamcy::where('user_id','like','%'.$id['id'].'%')->orderBy('created_at','desc')->get();
        $attributes = Attribute::orderBy('created_at','desc')->get();
        $drugs = Drugs::orderBy('created_at','desc')->get();
        return view('pages.bills',compact('attributes','drugs','phars'))->with(['message' => 'welcome ^.^']);
    }



    public function addPharamcy(Request $request)
    {
       $this->validate($request , [
            'namee'=>'required|max:50',
            'email'=>'required|email|unique:pharamcies',
            'phone'=>'required|unique:pharamcies',
            'loccation'=>'required|max:120',
            'password'=>'required|min:4',
            'lat' => 'required',
            'lng'=>'required'
        ], [
        'namee.required' =>'من فضلك قم بتسجيل اسم القاعه',
        'phone.required'=>'من فضلك قم بتسجيل رقم الجوال',
        'loccation.required' =>'من فضلك أدخل اسم الحي ',
        'password.required'=>'من فضلك أدخل الرقم السري',
        'lat.required'=>'من فضلك قم بتسجيل خط الطول',
        'lng.required' =>'من فضلك قم بتسجيل خط العرض',
        'email.required'=>'من فضلك أدخل البريد الاليكتروني',
    ]);
        $this->validate($request,[

        ]);
        $phone_number=$request['phone'];
        $email = $request['email'];
        $user_name = $request['namee'];
        $locaion = $request['loccation'];
        $password = bcrypt($request['password']);
        $Phar = new Pharamcy();
        $user = Auth::user()->id;
        $havePharamcy = Auth::user()->havePharamcy;
        if(!$user || $havePharamcy == 0){
             return response()->json(['value' => '0' ,'key' => "fail", 'msg'=>'هذا المستخدم غير موجود او ليس صاحب  صيدلية ']);

        }

        $Phar ->email=$email;
        $Phar ->phone=$phone_number;
        $Phar ->name=$user_name;
        $Phar ->locaion=$locaion;
        $Phar ->password=$password;
        $Phar ->user_id=$user;
        $Phar ->lat=$request['lat'];
        $Phar ->lng=$request['lng'];

       if ($Phar ->save()) {
            $message = 'user successfully created!';
        }else {
            $message = 'you have some errors !';
        }
        return redirect()->route('home')->with(['message' => $message]);
    }


    public function addDrugs(Request $request)
    {
        $this->validate($request,[
            'name'=>'required|max:50|unique:drugs',
            'type'=>'required|string',
            'price'=>'required|numeric',
            'attribute_id'=>'required',
            'expire_data'=>'nullable|date',
        ]);
        $name         = $request['name'];
        $type         = $request['type'];
        $price        = $request['price'];
        $attribute_id = $request['attribute_id'];
        $expire_data  = $request['expire_date'];

        $drug = new Drugs();
        $drug ->name=$name;
        $drug ->type=$type;
        $drug ->price=$price;
        $drug->attribute_id=$attribute_id;

        if ($drug ->save()) {
            $message = 'drug successfully created!';
        }else {
            $message = 'you have some errors !';
        }
        return redirect()->route('home')->with(['message' => $message]);
    }

    public function addQuantity(Request $request)
    {
        $this->validate($request,[
            'quantity'=>'required|max:50',
            'pharamcy_id'=>'required|string',
            'drugs_id'=>'required',
            'expire_data'=>'nullable|date',
        ]);
        $quantity = new Quantity();
        $quantity ->quantity   =$request['quantity'];
        $quantity ->pharamcy_id=$request['pharamcy_id'];
        $quantity ->expire_date=$request['expire_date'];
        $quantity ->drugg_id   =$request['drugs_id'];

        if ($quantity ->save()) {
            $message = 'quantity successfully created!';
        }else {
            $message = 'you have some errors !';
        }
        // Session::flash('message', 'Successfully updated nerd!');
        return redirect()->route('home')->with(['message' => $message]);
    }

    function Search(Request $request)
    {
        $results=[];
       $Pharamcies = [];
       $Quangtity = Quantity::orderBy('created_at','desc')->get();
       $drugs = Drugs::orderBy('created_at','desc')->get();
        if($request['name']){
            $results = Drugs::where('name','like','%'.$request['name'].'%')->orderBy('created_at','desc')->get();
        }else{
            $results = [];
        }
        
       if (empty($results[0]->id)) {
         $Pharamcies = [];
         $results = [];
         $dds = [];
       }elseif($results[0]->id){

            $Quantity = Quantity::where('drugg_id','like','%'.$results[0]->id.'%')->orderBy('created_at','desc')->get();
            $dds =Drugs::where('id','like','%'.$results[0]->id.'%')->orderBy('created_at','desc')->get();

            for ($i=0; $i <count($Quantity) ; $i++) { 
              $Pharamcies = Pharamcy::find($Quantity[$i]);
            }
        }

        $id = Auth::user();
        $phars = Pharamcy::where('user_id','like','%'.$id['id'].'%')->orderBy('created_at','desc')->get();
        $attributes = Attribute::orderBy('created_at','desc')->get();
        return view('pages.search',compact('Pharamcies','drugs','dds','phars','attributes'));
    }
    public function addBill(Request $request)
    {   $message = 'not have value';
        $check = false;
        $total_price=0;
        $price=0;
        $value=0;
        $this->validate($request,[
            'namedrugs'=>'required|max:50',
            'value'=>'required|numeric',
            'pharamcy_id'=>'required|numeric',
        ]);
        $value = $request['value'];
        $namedrugs = Drugs::where('name','like','%'.$request['namedrugs'].'%')->orderBy('created_at','desc')->get();
        if(!empty($namedrugs[0]->id))
        {  
            // $quantity = Quantity::where('drugg_id','like','%'.$namedrugs[0]->id.'%')->orderBy('created_at','desc')->get();
            $quantity = Quantity::where('drugg_id','like','%'.$namedrugs[0]->id.'%')
                ->where('pharamcy_id','like','%'.$request['pharamcy_id'].'%')
                ->orderBy('created_at','desc')->get();
            if(!empty($quantity[0]->id)){
                $resultt = $quantity[0]->quantity - $value ;
                $total_price =$namedrugs[0]->price * $value ;
                $price =$namedrugs[0]->price;
                if ($resultt<0) {
                    $msg='الكمية المتاحة غير كافية';
                }else {

                $update = Quantity::find($quantity[0]->id);
                $update->quantity =$resultt;
                $update->save();
                $msg='تمت العملية بنجاح وتمت عملية انقاص الكمية المخزنة';

                $pharamcies = Pharamcy::find($request['pharamcy_id'])->name;
                if (!empty($pharamcies[0]->id)) {
                    $check = true;
                    $pharamcies='not found';
                }
                //__________________________
                $bill = new Bill();
                $bill ->total_price =$total_price;
                $bill ->drug_id   =$namedrugs[0]->id;
                $bill ->pharamcy_id=$request['pharamcy_id'];
                $bill ->value=$value;
                if ($bill ->save()) {
                    $message = 'bill successfully created!';
                    $created_at =$bill ->created_at;
                }else {
                    $message = 'you have some errors !'; 
                }
                //__________________________
                }

            }else {
                $msg='قد يكون هذا الدواء متاح لدينا لكن في صيدلة اخري غير التي اخترتها';
            }

        }else {
            $msg='نعتذر فهذا الدواء غير متاح لدينا ';
            $check = false;
        }

        $id = Auth::user();
        $phars = Pharamcy::where('user_id','like','%'.$id['id'].'%')->orderBy('created_at','desc')->get();
        $attributes = Attribute::orderBy('created_at','desc')->get();
        $drugs = Drugs::orderBy('created_at','desc')->get();
        return view('pages.result',compact('check','attributes','drugs','phars','resultt','msg','namedrugs','pharamcies','total_price','price','value','created_at'))->with(['message' => $message]);

    }

    public function getBills(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
        ]);
        $bills = Bill::where('created_at','like','%'.$request['name'].'%')->orderBy('created_at','desc')->get();
        if(!empty($bills[0]->id))
        {   
        $check = true;
        $pharamcies = Pharamcy::find($bills[0]->pharamcy_id);
        $ph=$pharamcies->name;
        $druggs = Drugs::find($bills[0]->drug_id);
        $dr=$druggs->name;
        }else{
        $check = false;
        $ph= 0;
        $dr= 0;
        }
        $id = Auth::user();
        $phars = Pharamcy::where('user_id','like','%'.$id['id'].'%')->orderBy('created_at','desc')->get();
        $attributes = Attribute::orderBy('created_at','desc')->get();
        $drugs = Drugs::orderBy('created_at','desc')->get();
        return view('pages.bills',compact('check','attributes','drugs','phars','bills','ph','dr'));
    }



}

