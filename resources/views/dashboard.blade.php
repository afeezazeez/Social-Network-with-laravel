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
		<article class="post">
			<p>Lorem ipsum is a text generating site...Lorem ipsum is a text generating site...
			Lorem ipsum is a text generating site...Lorem ipsum is a text generating site...
			Lorem ipsum is a text generating site...Lorem ipsum 	is a text generating site...
			Lorem ipsum is a text generating site...Lorem ipsum is a text generating site...<br></p>
			<div class="info">
				Posted by Locci on 12 Feb 2019
			</div>
			<div class="interaction">
				<a href="#">Like</a> |
				<a href="#">Dislike</a> |
				<a href="#">Edit</a> |
				<a href="#">Delete</a> |
			</div>
		</article><br>

		<article class="post">
			<p>Lorem ipsum is a text generating site...Lorem ipsum is a text generating site...
			Lorem ipsum is a text generating site...Lorem ipsum is a text generating site...
			Lorem ipsum is a text generating site...Lorem ipsum 	is a text generating site...
			Lorem ipsum is a text generating site...Lorem ipsum is a text generating site...<br></p>
			<div class="info">
				Posted by Locci on 12 Feb 2019
			</div>
			<div class="interaction">
				<a href="#">Like</a> | 
				<a href="#">Dislike</a> |
				<a href="#">Edit</a> |
				<a href="#">Delete</a> |
			</div>
		</article>

	</div>
</section>

@endsection
