<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Post;
use App\Like;

class PostController extends Controller
{

	public function getDashboard(){
	$post=Post::orderBy('created_at','desc')->get();
		return view('index', ['posts'=> $post]);
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
    	return redirect()->route('index')->with(['message' => $message]);
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
    	return redirect()->route('index')->with(['message' => $message]);

    }

    public function getEdit(Request $request){
		
		$this->validate($request,[
    		'body'=> 'required'
    		
		]);
		$post=Post::find($request['postId']);
		if (Auth::user()!=$post->user) {
    		return redirect()->back();
    	}
    	
		
		
		$post->body=$request['body'];
		$post->update();
		return response()->json(['new_body'=>$post->body],200);
		
		
	}
	
	public function getLikePost(Request $request){
		$post_id=$request['postId'];
		$isLike=$request['isLike']==='true';
		$update=false;
		$post=Post::find($post_id);
		if(!$post){
			return null;
		}

		$user=Auth::user();
		$like= $user->likes('post_id',$post_id)->first();
		if ($like) {
			$already_like=$like->like;
			$update=true;
			if ($already_like==$isLike) {
				$like->delete();
				return null;
			}
		}
		else{
			$like= new Like;
		}

		$like->like=$isLike;
		$like->user_id=$user->id;
		$like->post_id=$post->id;
		if ($update) {
			$like->update();
		}
		else{
			$like->save();
		}

		return null;
		

	}//function

}//class
