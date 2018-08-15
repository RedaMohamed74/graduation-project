<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Validator;
class UsersController extends Controller
{
  public function register(Request $request)
  {
      $rules =[
        'name'     => ['required','string','max:255'],
        'email'    => ['required','string','email','max:255','unique:users'],
        'phone'    => ['required','string','max:14'],
        'lat' => ['required'],
        'lng' => ['required'],
        'location' => ['required'],
        'password' => ['required','string','min:6'],
      ];

      $validate = Validator::make($request->all(), $rules);
      if ($validate->fails()) {
        return response(['status'=>'false','messages' => $validate->messages()]);
      }else{

          $data = new User;
          $data->name = $request['name'];
          $data->email = $request['email'];
          $data->password =bcrypt($request['password']);
          $data->location = $request['location'];
          $data->lat = $request['lat'];
          $data->lng = $request['lng'];
          $data->phone = $request['phone'];
          $data->save();
 
  		return response(['status'=>'done','data'=>[ "Username"=>$data->name, "email"=>$data->email,"phone"=>$data->phone,"user_id"=>''.$data->id.'']]);

        
    }
  } 


  public function login(/*Request $request*/)
  {
  	$rules =[
  		'email'=>'required|email',
  		'password'=>'required',
  	];

  	$validate = Validator::make(request()->all(), $rules);
  	if ($validate->fails()) {
  		return response(['status'=>'false', 'messages' => $validate->messages()]);
  	}else{
  		if (auth()->attempt(['email'=>request('email'),'password'=>request('password')])) {
  			$user = auth()->user();
  			$user->api_token = str_random(60);
  			$user->save();
  			return response(['status'=>'done', 'data'=>[ "user_id"=>''.$user->id.'',"Username"=>$user->name, "email"=>$user->email,"phone"=>$user->phone,"password"=>$user->password], 'token'=>$user->api_token]);
  		}else{
  			return response(['status'=>'false', 'message' => 'you have some problem about Email or password']);
  		}
  	}
  }

          //++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
        // $user = User::create([
        //     'name' => $data['name'],
        //     'phone' => $data['phone'],
        //     'email' => $data['email'],
        //     'password' => bcrypt($data['password']),
        // ]);
        // return response(['status'=>'true','data' => $data]);
    //     $user = auth()->user();
  		// $user->api_token = str_random(60);
  		// $user->save();

  		// $name = $request->name;
    //     $email = $request->email;
    //     $password = $request->password;
        
    //     $user = User::create(['name' => $name, 'email' => $email, 'password' => Hash::make($password)]);
}
