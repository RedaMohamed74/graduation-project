<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;
use App\Pharamcy;
use Validator;

class UsersController extends Controller
{
        public function signup(Request $request)
    {
        $this->validate($request,[
            'name'=>'required|max:50',
            'email'=>'required|email|unique:users',
            'phone'=>'required|unique:users',
            'location'=>'required|max:120',
            'password'=>'required|min:4',
            'lat' => 'required',
            'lng'=>'required'
        ]);
        $phone_number=$request['phone'];
        $email = $request['email'];
        $user_name = $request['name'];
        $location = $request['location'];
        $havepharamcy=$request['havepharamcy'];
        $password = bcrypt($request['password']);

        $user = new User();
        $user ->email=$email;
        $user ->phone=$phone_number;
        $user ->name=$user_name;
        $user ->password=$password;
        $user ->location=$location;
        $user ->havepharamcy=$havepharamcy;
        $user ->lat=$request['lat'];
        $user ->lng=$request['lng'];
        if ($user ->save()) {
            Auth::login($user);
            $message = 'user successfully created!';
        }else {
            $message = 'you have some errors !';
        }
        return redirect()->route('home')->with(['message' => $message]);
    }

    public function postSignIn(Request $request)
    {
        $this->validate($request, [
            'name'=>'required|max:120',
            'password'=>'required|min:4',
        ]);
        if (Auth::attempt(['name' => $request['name'], 'password' => $request['password']]))
        {
            $user = auth()->user();
            $user->api_token = str_random(60);
            $user->save();
            $message = 'Sign in successfully !';
        }else {
            $message = 'There was an error';
        }
            return redirect()->route('home')->with(['message' => $message]);


    }

    public function getLogout()
    {
        Auth::logout() ;
        return redirect()->route('home');
    }
}
