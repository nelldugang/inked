<!DOCTYPE html>
<html>
<head>
	<title>Sample Template</title>
	<link href="{{ asset('css/bootstrap3.3.7/css/bootstrap.min.css') }}" rel="stylesheet">
	<link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>


<nav class="navbar" style="background-color:;">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">
        Admin dashboard
      </a>
      <ul class="nav navbar-nav navbar-right">
        <li>    
            <a href="{{ route('logout') }}"
                onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();"  style="float:right">
                Logout
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
            </li>
            </ul>
    </div>
  </div>
</nav>






	<div class="container">
	@yield("main_content")
	</div>




</body>
</html>