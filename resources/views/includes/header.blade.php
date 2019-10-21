



<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="{{ route('dashboard') }}">Loccini</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
    
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('dashboard') }}">Home <span class="sr-only">(current)</span></a>
      </li>
    <li class="nav-item active"><a   class="nav-link"  href="{{ route('account') }}">Account</a></li>
  	<li class="nav-item active"><a   class="nav-link"  href="{{ route('logout') }}">Logout</a></li>
  
    </ul>
  </div>
</nav>