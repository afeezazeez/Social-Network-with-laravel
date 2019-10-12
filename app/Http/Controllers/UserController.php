<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\User;

class UserController extends Controller
{

	public function getDashboard(){
		return view('dashboard');
	}
    public function postsignUp(Request $request){
    	$email=$request->input('email');
    	$first_name=$request->input('first_name');
    	$password=bcrypt($request->input('password'));

    	$user= new User;
    	$user->email=$email;
    	$user->password=$password;
    	$user->first_name=$first_name;
    	$user->save();
    	Auth::login($user);
    	return redirect()->route('dashboard');
    }

	public function postsignIn(Request $request){
    	if(Auth::attempt(['email'=> $request['email'], 'password' => $request['password']])){
    			return redirect()->route('dashboard');
    	}
    	return redirect()->back();
    }
}
