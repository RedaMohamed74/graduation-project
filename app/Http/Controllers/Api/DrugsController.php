<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Pharamcy;
use App\User;
use App\Drugs;
use App\pharmcy_favorite;
use Validator;


class DrugsController extends Controller
{



    public function getallDrugs()
  {
        $checck = Drugs::all();
        if (empty($checck)) {
          $messages = 'Not Exist Any Pharamcy';
          return response(['status'=>'false','messages' => $messages]);
        }else{
        return response(['status'=>'done', 'data'=>$checck]);          
        }
   }
}