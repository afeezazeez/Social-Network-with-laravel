<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Post;

class PostController extends Controller
{

	public function getDashboard(){
	$post=Post::orderBy('created_at','desc')->get();
		return view('dashboard', ['posts'=> $post]);
	}
    public function postCreatePost(Request $request){
    	//validation

    	$this->validate($request,[
    		'post'=> 'required|max:1000'
    		
    	]);

    	$post = new Post;
    	$post->body=$request['post'];
    	$message="There was an error!";
    	// post belongs to currently authenticated user
    	if($request->user()->posts()->save($post)){
    		$message="Post successfully created";
    	}
    	return redirect()->route('dashboard')->with(['message' => $message]);
    }

    public function getDeletePost($post_id){

    	$post = Post::where('id',$post_id)->first();
    	if (Auth::user()!=$post->user) {
    		return redirect()->back();
    	}
    	$message="There was an error";

    	if ($post->delete()) {
    		$message="Post successfully deleted";

    	}
    	return redirect()->route('dashboard')->with(['message' => $message]);

    }


}
