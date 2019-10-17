<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;

class PostController extends Controller
{
    public function postCreatePost(Request $request){
    	//validation

    	$post = new Post;
    	$post->body=$request['new-post'];

    	// post belongs to currently authenticated user
    	$request->user()->posts()->save($post);
    	return redirect()->route('dashboard');
    }
}
