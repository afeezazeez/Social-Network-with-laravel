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
		<div class="form-group">
			<label for="email">Your Email</label>
			<input type="text" name="email" id="email" class="form-control">
		</div>
		<div class="form-group">
			<label for="email">Your First Name</label>
			<input type="text" name="first_name" id="first_name" class="form-control">
		</div>
		<div class="form-group">
			<label for="email">Your Password</label>
			<input type="password" name="password" id="password" class="form-control">
		</div>
		<button type="submit" class="btn btn-primary">Submit </button>

		</form>	
	</div>

	<div class="col-md-6">
		<h3>Sign In</h3>
		<form>
		<div class="form-group">
			<label for="email">Your Email</label>
			<input type="text" name="email" id="email" class="form-control">
		</div>
		<div class="form-group">
			<label for="email">Your First Name</label>
			<input type="text" name="first_name" id="first_name" class="form-control">
		</div>
		<div class="form-group">
			<label for="email">Your Password</label>
			<input type="password" name="password" id="password" class="form-control">
		</div>
		<button type="submit" class="btn btn-primary">Submit </button>
		</form>	
	</div>
</div>
@endsection



