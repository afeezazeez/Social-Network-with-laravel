@extends('layouts.master')

@section('content')

<section class="row new-post">
	<div class="col-md-6 col-md-offset-3">
		@if(Session::has('message'))
			<div class="error text-success success">
				{{ Session::get('message') }}
			</div>
			@endif
			@if($errors->has('post'))
				<div class="error text-danger error">
					<li>{{ $errors->first('post') }}</li>
				</div>
			@endif
		<header><h3>What do you have to say?</h3></header>

			<form action="{{ route('post.create') }}" method="post">
				{{csrf_field() }}
				<div class="form-group">
					<textarea class="form-control" name="post" id="new-post" rows="5" placeholder="Your Post"></textarea>
				</div>
				<button type="submit" class="btn btn-primary">Create Post</button>
			</form>


			

			
	
	</div>
	
</section>

<section class="row posts">
	<div class="col-md-6 col-md-offset-3">
		<header><h3>What other people say...</h3></header>
		@foreach($posts as $post)
			<article class="post">
			<p>{{ $post->body }}</p>
			<div class="info">
				Posted by {{ $post->user->first_name }} on {{ $post->created_at }}			</div>
			<div class="interaction">
				<a href="#">Like</a> |
				<a href="#">Dislike</a> 
				@if(Auth::user()==$post->user)
				|
				<a href="#"  id="edit">Edit</a> |
				<a href="{{ route('post.delete',['post_id'=>$post->id]) }}">Delete</a> 
				@endif
			</div>
		</article>
		@endforeach
		
	</div>
</section>

<div class="modal" tabindex="-1" role="dialog" id="edit-modal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Post</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
        	<div class="form-group">
        		<label for="post-body">Edit this post</label>
        		<textarea class="form-control" name="post-body" id="post-body" rows="5"></textarea>
        	</div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

@endsection
