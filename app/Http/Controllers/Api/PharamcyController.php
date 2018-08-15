<?php

namespace App\Http\Controllers\Api;
use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Pharamcy;
use App\User;
use App\Drugs;
use App\Quantity;
use App\pharmcy_favorite;
use Validator;
class PharamcyController extends Controller
{

  public function getallplaces()
  {
        $check = Pharamcy::all();
        if (empty($check)) {
          $messages = 'Not Exist Any Pharamcy';
          return response(['status'=>'false','messages' => $messages]);
        }else{
        return response(['status'=>'done', 'data'=>$check]);         
    }
  }

  //-------------------------------------------------

      function getSearch(Request $request)
    {
       $Pharamcy = 'There is no pharmacy containing this drug';
       $Quangtity = Quantity::orderBy('created_at','desc')->get();
       $drugs = Drugs::orderBy('created_at','desc')->get();
       if (empty($request['id'])) {
         $status = 'false';
         $Pharamcy = 'Please enter the drug Identification';
       }else{
        if($request['id']){
            $Quantity = Quantity::where('drugg_id','like','%'.$request['id'].'%')->orderBy('created_at','desc')->get();

            for ($i=0; $i <count($Quantity) ; $i++) { 
              $Pharamcy = Pharamcy::find($Quantity[$i]);
            }
            if (count($Quantity)==0) {
              $status = 'false';
            }else{
              $status = 'done';
            }
        }
      }
        return response(['status'=>$status,'Pharamcy'=>$Pharamcy]);   
    }


  // /**
  //    * add restaurant  to my favorite restaurants list
  //    * @return bool
  //    * @param $pharamcyId
  //    * @param $userId
  //    */
  //   public function add_pharmcy_fav($pharamcyId, $userId)
  //   {
  //       $query = 'INSERT INTO pharmcy_favorites SET pharamcyId = ?, userId = ?, isFavorite = 1';
  //       $stmt = $this->db->prepare($query);
  //       return $stmt->execute([$pharamcyId, $userId]);

  //   }

        public function add_pharmcy_fav(Request $request)
        {
        $rules =[
                'pharamcyId'    => ['required','max:14'],
                'userId'    => ['required','max:14'],
              ];

              $validate = Validator::make($request->all(), $rules);
              if ($validate->fails()) {
                return response(['status'=>'false','messages' => $validate->messages()]);
              }else{

                  $data = new pharmcy_favorite;
                  $data->pharamcyId = $request['pharamcyId'];
                  $data->userId = $request['userId'];
                  $data->isFavorite = 1;
                  $data->save();
                 return response(['status'=>'done', 'messages'=>'successful']);

            
        }
      }

    public function getPharmcyFavFromSpecificUser(Request $request)
    {

       $Pharamcy = 'This user has not added any medicines to their favorites';
       $phafav = pharmcy_favorite::orderBy('created_at','desc')->get();
       if (empty($request['id'])) {
         $status = 'false';
         $Pharamcy = 'Please enter your user ID';
       }else{
        if($request['id']){
            $phafav = pharmcy_favorite::where('userId','like','%'.$request['id'].'%')->orderBy('created_at','desc')->get();

            for ($i=0; $i <count($phafav) ; $i++) { 
              $Pharamcy = Pharamcy::find($phafav[$i]);
            }
            if (count($phafav)==0) {
              $status = 'false';
            }else{
              $status = 'done';
            }
        }
      }
        return response(['status'=>$status,'Favorite Pharmacies'=>$Pharamcy]);   
    } 

    public function updatePharamcy(Request $request)
    {
       $Pharamcy = Pharamcy::find($request['id']);
       $update=\DB::table('pharamcies')
            ->where('id', $Pharamcy)
            ->update(['rating' => $request['rate']]);
     }

    public function ratePharamcy(Request $request)
    {
         $rules =[
                'pharamcyId'    => ['required','max:14'],
                'userId'    => ['required','max:14'],
                'rating'    => ['required','numeric']
              ];

                   $user = User::find($request['userId']);
                  if (empty($user['id'])) {
                    return response(['status'=>'false', 'messages'=>'user not found !!']);
                  }

                  if ($request['userId']>5) {
                    $request['rating'] = 5;
                  }

              $validate = Validator::make($request->all(), $rules);
              if ($validate->fails()) {
                return response(['status'=>'false','messages' => $validate->messages()]);
              }else{
                  $all=pharmcy_favorite::all();
                  for ($i = 0; $i <count($all) ; $i++) {
                    if ($request['pharamcyId']==$all[$i]->pharamcyId and $request['userId']==$all[$i]->userId) {
                   $update=\DB::table('pharmcy_favorites')
                        ->where('pharamcyId', $request['pharamcyId'])
                        ->where('userId', $request['userId'])
                        ->update(['rating' => $request['rating']]);
                        $avgStar = pharmcy_favorite::where('pharamcyId','like','%'.$request['pharamcyId'].'%')->avg('rating');
                        if ($avgStar>5) {
                          $avgStar = 5;
                        }
                   $update=\DB::table('pharamcies')
                        ->where('id', $request['pharamcyId'])
                        ->update(['rating' => $avgStar]);
                 return response(['status'=>'done', 'messages'=>'You have been modified to live this pharmacy']);
                    } 
                  }

                  $data = new pharmcy_favorite;
                  $data->pharamcyId = $request['pharamcyId'];
                  $data->userId = $request['userId'];
                  $data->rating = $request['rating'];
                  $data->save();

                  $avgStar = pharmcy_favorite::where('pharamcyId','like','%'.$request['pharamcyId'].'%')->avg('rating');
                  if ($avgStar>5) {
                    $avgStar = 5;
                  }
                   $Pharamcy = Pharamcy::find($request['pharamcyId']);
                   $update=\DB::table('pharamcies')
                        ->where('id', $request['pharamcyId'])
                        ->update(['rating' => $avgStar]);
                 return response(['status'=>'done', 'messages'=>'successful']);

            
        }

     }

    /*search-------------------------------------------------------------------------*/




    // $query = 'INSERT INTO `pharmcy_favorites` (`id`, `pharamcyId`, `userId`, `isFavorite`, `created_at`, `updated_at`) VALUES (NULL, "1", "1", "1", NULL, NULL)';


    /*<?php

namespace FRONT\SERVICES ;
use PHPMVC\LIB\Filter;
use \PHPMVC\MODELS\ServicesModels ;

$token = '$2y$10$YMJdyhiJK.NU7Y6qDFOfGO2qWTuRVJAOeyosg4e6G.z1GSKx1qiHW';

if (isset($_REQUEST['token'])) {
    if ($_REQUEST['token'] != $token)
        exit();
}else {
    exit();
}

require_once 'config.php';
require_once '..'. DS . 'lib' . DS . 'autoload.php';

$rest_id = Filter::filterInt($_REQUEST['rest_id']);
$user_id = Filter::filterInt($_REQUEST['user_id']);

$result = (new ServicesModels())->add_rest_fav($rest_id, $user_id);

$json_object = new \stdClass();
$json_object->status = "done";
if (empty($result)) {
    $json_object->status = "empty";
}
echo json_encode($json_object);*/

       // $Quantity = DB::select('SELECT pharamcy_id FROM quantities WHERE drugg_id=3');               
                          // $Quantity = DB::table('Quantity')
            //          ->select('pharamcy_id')
            //          ->where('drugg_id','like','%'.$request['id'].'%')
            //          ->groupBy('status')
            //          ->get();

            // $Pharamcy = Pharamcy::where('id','like','%'.$Quantity->pharamcy_id.'%')->orderBy('created_at','desc')->get();
              # code...
}
