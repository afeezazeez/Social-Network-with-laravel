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
@include("includes.nav")
<div class="container">
@yield('content')
</div>


<script src="{{ URL::to('src/js/jquery-1.11.3.min.js') }}"></script>
<script src="{{ URL::to('src/js/app.js') }}"></script>
<script src="{{ URL::to('src/js/bootstrap.min.js') }}"></script>
</body> 
</html>