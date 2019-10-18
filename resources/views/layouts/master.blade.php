<!DOCTYPE html>
<html>
<head>
	<title>@yield('title')</title>
	<link rel="stylesheet" href="{{ URL::to('src/css/main.css') }}">
	<link rel="stylesheet" href="{{ URL::to('src/css/bootstrap.min.css') }}">


</head>
<body>
@include("includes.header")
<div class="container">
@yield('content')
</div>


<script src="{{ URL::to('src/js/jquery-1.11.3.min.js') }}"></script>
<script src="{{ URL::to('src/js/app.js') }}"></script>
<script src="{{ URL::to('src/js/bootstrap.min.js') }}"></script>
</body> 
</html>