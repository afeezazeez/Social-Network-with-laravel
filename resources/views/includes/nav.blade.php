

<nav class="navbar navbar-expand-lg navbar-default navbar-light bg-light">
<div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="{{ route('index') }}">Home</a></li>
            <li><a href="#">Members</a></li>
            <li><a href="#">Contact</a></li>
            <li><a href="#">Groups</a></li>
            <li><a href="#">Photos</a></li>
            <li><a href="#">Profile</a></li>
            <li><a href="{{ route('logout') }}">Logout</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
</nav>