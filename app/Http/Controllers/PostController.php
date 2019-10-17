<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;

class PostController extends Controller
{

	public function getDashboard(){
	$post=Post::all();
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


}
