<!DOCTYPE html>
<html>
<head>
	<title>Sample Template</title>
	<link href="{{ asset('css/bootstrap3.3.7/css/bootstrap.min.css') }}" rel="stylesheet">
	<link href="{{ asset('css/style.css') }}" rel="stylesheet">
  <script type="text/javascript" src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <link rel="stylesheet" type="text/css" id="u0" href="http://cdn.tinymce.com/4/skins/lightgray/skin.min.css">
  </script>
  <script type="text/javascript">
    tinymce.init({
      selector : "#content",
      plugins : ["advlist autolink lists link image charmap print preview anchor", "searchreplace visualblocks code", "insertdatetime media table contextmenu paste"],
      toolbar : "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | fontsizeselect ",
      fontsize_formats: '8pt 10pt 12pt 14pt 18pt 24pt 36pt',
      
  });
  </script>
</head>
<body>


<nav class="navbar" style="background-color:;">
  <div class="container-fluid">
    <div class="navbar-header">
      <p class="navbar-brand">
        Admin dashboard
      </p>
      <ul class="nav navbar-nav navbar-right">
        <li>    
            <a href="{{ route('logout') }}"
                onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
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