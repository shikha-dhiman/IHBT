<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use DB;
use Validator;
use File;
use App\Models\admin;

class UserauthController extends Controller
{
    
     public function login(Request $req)
    {
        if($req->isMethod('post')){
	        $rule = ['username' => ['required']];
	        $validator = Validator::make($req->all(), $rule);
	        if($validator->fails()){
	            $errors =  $validator->errors()->first();
	            return $errors;
	        }else{
	            $username = $req->username;
	            $password = $req->password;
	          	$url = $req->user_type;
	          	if($url == 'owner'){
	          		$user_type = 'admin';
	          	}elseif($url == 'receptionist_user'){
	          		$user_type = 'receptionist';
	          	}elseif($url == 'doctor'){
	          		$user_type = 'doctor';
	          	}
	            $query = Admin::where(['username' => $username, 'password' => $password, 'user_type' => $user_type])->get();
	            $Count = $query->count();
	            if($Count == 1){
	                foreach ($query as $key => $value) {
	                   $username= $value->username;
	                   $user_details = ['username' => $username,
	                   'user_type' => $user_type];
	                    session($user_details);
	                    $message =  "Logged in sucessfully";
	                    return $message;
	                }
	            }else{
	                $message =  "Wrong username or password.";
	                return $message;
	            }
	        }
    	}
    	Session::forget('username');
    	return view('Owner.Auth.login');
    }
}
