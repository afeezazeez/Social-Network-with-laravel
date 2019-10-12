@extends("layouts.master")

@section("title")
    welcome page
@endsection

@section("content")

<div class="row">
	<div class="col-md-6">
		<h3>Sign Up</h3>
		<form method="post" action="{{route('signup')}}">
			{{csrf_field() }}
		<div class="form-group ">
			<label for="email">Your Email</label>
			<input type="text" name="email" id="email" class="form-control" value="{{ Request::old('email') }}">
		</div>
		@if($errors->has('email'))
			<div class="error text-danger">
				{{ $errors->first('email') }}
			</div>
		@endif
		<div class="form-group">
			<label for="email">Your First Name</label>
			<input type="text" name="first_name" id="first_name" class="form-control" value="{{ Request::old('first_name') }}">
		</div>

		@if($errors->has('first_name'))
			<div class="error text-danger">
				{{ $errors->first('first_name') }}
			</div>
		@endif

		<div class="form-group">
			<label for="email">Your Password</label>
			<input type="password" name="password" id="password" class="form-control" value="{{ Request::old('password') }}">
		</div>

		@if($errors->has('password'))
			<div class="error text-danger">
				{{ $errors->first('password') }}
			</div>
		@endif<br>
		<button type="submit" class="btn btn-primary">Submit </button>

		</form>	
	</div>

	<div class="col-md-6">
		<h3>Sign In</h3>
		<form method="post" action="{{route('signin')}}">
			{{csrf_field() }}
		<div class="form-group ">
			<label for="email">Your Email</label>
			<input type="text" name="email" id="email" class="form-control" value="{{ Request::old('email') }}">
		</div>

		@if($errors->has('email'))
			<div class="error text-danger">
				{{ $errors->first('email') }}
			</div>
		@endif
		<div class="form-group">
			<label for="email">Your Password</label>
			<input type="password" name="password" id="password" class="form-control" value="{{ Request::old('password') }}">
		</div>

		@if($errors->has('password'))
			<div class="error text-danger">
				{{ $errors->first('password') }}
			</div>
		@endif<br>
		<button type="submit" class="btn btn-primary">Submit </button>
		</form>	
	</div>
</div>
@endsection



