<!DOCTYPE html>
<html>
<head>

<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<title>@yield('title')</title>
	<link rel="stylesheet" href="{{ URL::to('src/css/main.css') }}">
    <link rel="stylesheet" href="{{ URL::to('src/css/bootstrap.min.css') }}">
    <!-- Bootstrap core CSS -->
    <link href="{{ URL::to('src/css/bootstrap.css') }}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ URL::to('src/css/style.css') }}" rel="stylesheet">
    <link href="{{ URL::to('src/css/font-awesome.css') }}" rel="stylesheet">


</head>
<body>
  @include("includes.head")
<div class="container">


<section>
      <div class="container">
	<div class="row" style="margin-top:30px;">
	  <div class="col-md-8">
	    <div class="panel panel-default">
	      <div class="panel-heading">
		<h3 class="panel-title">Register Here</h3>
	      </div>
	      <div class="panel-body">
        <form method="post" action="{{route('signup')}}">
                          {{csrf_field() }}
                        <div class="form-group ">
                          <label for="email">Your Email</label>
                          <input type="text" name="email" id="email" class="form-control" value="{{ Request::old('email') }}">
                        </div>
                        @if($errors->has('email'))
                          <div class="text-danger">
                            {{ $errors->first('email') }}
                          </div><br>
                        @endif
                        <div class="form-group">
                          <label for="email">Your First Name</label>
                          <input type="text" name="first_name" id="first_name" class="form-control" value="{{ Request::old('first_name') }}">
                        </div>

                        @if($errors->has('first_name'))
                          <div class=" text-danger ">
                            {{ $errors->first('first_name') }}
                          </div><br>
                        @endif

                        <div class="form-group">
                          <label for="email">Your Password</label>
                          <input type="password" name="password" id="password" class="form-control" value="{{ Request::old('password') }}">
                        </div><br>

                        @if($errors->has('password'))
                          <div class="text-danger">
                            {{ $errors->first('password') }}
                          </div><br>
                        @endif
                        <button type="submit" class="btn btn-primary">Submit</button>
                 </form>
		  
		  </div> <!-- panel body -->
	    </div> <!-- panel -->




	  </div> <!-- md 8 -->

	  <!-- SIDEBAR -->
	  <div class="col-md-4">
	    <div class="panel panel-default friends">
	      <div class="panel-heading">
		<h3 class="panel-title">Login Here</h3>
	      </div>
	      <div class="panel-body">

        @if(Session::has('message'))
			<div class=" text-danger danger">
				{{ Session::get('message') }}
			</div><br>
			@endif
		<form method="post" action="{{route('signin')}}">
			{{csrf_field() }}
		<div class="form-group ">
			<label for="email">Your Email</label>
			<input type="text" name="email" id="email" class="form-control" value="{{ Request::old('email') }}">
		</div>

		@if($errors->has('email'))
			<div class=" text-danger">
				{{ $errors->first('email') }}
			</div><br>
		@endif
		<div class="form-group">
			<label for="email">Your Password</label>
			<input type="password" name="password" id="password" class="form-control" value="{{ Request::old('password') }}">
		</div>

		@if($errors->has('password'))
			<div class="text-danger">
				{{ $errors->first('password') }}
			</div><br>
		@endif

	
		
		<button type="submit" class="btn btn-primary">Submit </button>
		</form>
		    </div> <!-- panel body -->
	    
	  </div> <!-- md 4 -->

	</div> <!-- row -->
      </div> <!-- container -->
    </section>


</div>


<script src="{{ URL::to('src/js/jquery-1.11.3.min.js') }}"></script>
<script src="{{ URL::to('src/js/app.js') }}"></script>
<script src="{{ URL::to('src/js/bootstrap.min.js') }}"></script>
</body> 
</html>
