<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class UserController extends Controller
{
    public function postsignUp(Request $request){
    	$email=$request->input('email');
    	$first_name=$request->input('first_name');
    	$password=bcrypt($request->input('password'));

    	$user= new User;
    	$user->email=$email;
    	$user->password=$password;
    	$user->first_name=$first_name;
    	$user->save();
    	
    	return redirect()->back();
    }

	public function postsignIp(Request $request){
    	
    }
}
