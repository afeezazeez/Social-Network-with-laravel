@extends('layouts.master')
@section('title')
@endsection
@section('content')

	<section class="row new-post">
		<div class="col-md-6 col-md-offset-3">
			<header><h3>Your Account</h3></header>
			<form action="{{ route('account.save') }}" method="post" enctype="multipart/form-data">
					{{csrf_field() }}
				<div class="form-group">
					<label for="first_name">First Name</label>
					<input type="text" name="first_name" class="form-control" value="{{ $user->first_name }}" id="first_name">
				</div>

				<div class="form-group">
					<label for="image">Image (only .jpg)</label>
					<input type="file" name="image" class="form-control" >
				</div>
				<button type="submit" class="btn btn-primary">Save Account</button>
				
			</form>
		</div>
	</section>

	@if(Storage::disk('local')->has($user->first_name.'-'.$user->id.'jpg'))
		<section class="row new-post">
			<div class="col-md-6 col-md-offset-3">
				
                <img src="{{ route('account.image',['filename'=> $user->first_name.'-'.$user->id.'jpg']) }} " width='250' height='250'>
                
                
			</div>
		
		</section>
	@endif



@endsection