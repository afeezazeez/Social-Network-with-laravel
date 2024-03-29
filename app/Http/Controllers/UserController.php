<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;


use App\User;

class UserController extends Controller
{

	
    public function postsignUp(Request $request){
    	$this->validate($request,[
    		'email'=> 'required|email|unique:users',
    		'first_name' => 'required|max:120',
    		'password' => 'required|min:4'
    	]);
    	$email=$request['email'];
    	$first_name=$request['first_name'];
    	$password=bcrypt($request['password']);

    	$user= new User;
    	$user->email=$email;
    	$user->password=$password;
    	$user->first_name=$first_name;
    	$user->save();
    	Auth::login($user);
    	return redirect()->route('dashboard');
    }

	public function postsignIn(Request $request){
		$this->validate($request,[
    		'email'=> 'required',
    		'password' => 'required'
    	]);
    	if(Auth::attempt(['email'=> $request['email'], 'password' => $request['password']])){
    			return redirect()->route('index');
		}
		$message="Incorrect username or password";
    	return redirect()->back()->with(['message' => $message]);
    }

    public function getLogout(){
        Auth::logout();
        return redirect()->route('homepage');
	}
	
	public function getAccount(){
		return view('account',['user'=> Auth::user()]);
	}

	
	public function postSaveAccount(Request $request){
		$this->validate($request,[
    		'first_name'=> 'required'
		]);
		

		$user=Auth::user();
		$user->first_name=$request['first_name'];
		$user->update();
		
		$file=$request->file('image');
		$filename= $request['first_name'].'-'.$user->id.'jpg';
		
		if ($file) {
			Storage::disk('local')->put($filename,File::get($file));
		}

		return redirect()->route('account');
	}

	public function getUserImage($filename){
		$file=Storage::disk('local')->get($filename);
		return new Response($file,200);
	}
} 

























