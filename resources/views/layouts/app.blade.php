<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- CSS Files -->
    <link href="{{ asset('assets/materialize/css/materialize.css') }}" rel="stylesheet" />
    
    <!-- Compiled and minified CSS -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css"> -->

    <!-- Compiled and minified JavaScript -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Material Kit Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <script type="text/javascript" src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <link rel="stylesheet" type="text/css" id="u0" href="http://cdn.tinymce.com/4/skins/lightgray/skin.min.css">
     <script type="text/javascript">
    tinymce.init({
      selector : "#content",
      plugins : ["advlist autolink lists link image charmap print preview anchor", "searchreplace visualblocks code", "insertdatetime media table contextmenu paste"],
      toolbar : "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | fontsizeselect ",
      fontsize_formats: '8pt 10pt 12pt 14pt 18pt 24pt 36pt',
      height: "480",
      
  });
  </script>

  <style>
  .href:hover {
    color: #80cbc4;
}

.drop2 {
        left: 30% !important;
        right: auto;
        text-align: center;
        transform: translate(-100%, -85%);
        width: 250px !important;
        height: 150px !important;
      }
      
  </style>
</head>
<body>
    <div id="app">
    <nav>
    <div class="nav-wrapper" style="background-color:#2d2d2d;">
      <!-- <a href="" class="brand-logo center">Inked</a> -->
      <a href="{{ url('/') }}" class="brand-logo center "><img src='{{URL::asset("/public/img/logo1.png")}}' style="width:200px"></a>
      <ul id="nav-mobile" class="left hide-on-med-and-down">
       @if(Auth::user() != null)
        <li><a href="{{ url('/') }}">Inked</a></li>
        <li><a href='{{url("articles")}}'>Articles</a></li>
        <li><a href="{{url('/profile') }}">Profile</a></li>
        @else
        <li><a href="{{ url('/') }}">Inked</a></li>
        <li><a href='{{url("articles")}}'>Articles</a></li>
        @endif        

      </ul>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <!-- Authentication Links -->                          
        @guest
            <li><a href="{{ route('login') }}">Login</a></li>
            <li><a href="{{ route('register') }}">Register</a></li>
        @else
            <li><a href=""><img src="/uploads/{{ Auth::user()->avatar }}" style="width:32px;height:32px;border-radius: 50%">
                    {{ Auth::user()->name }}</a></li>
            <li><a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                            Logout</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form></li>
        </ul>
        @endguest
    </div>           
</nav>
</div>
<br><br><br>
@yield('main_content')  

<footer class="page-footer grey darken-4" >
          <div class="container">
            <div class="row">
              <div class="col l6 s12">
                <h5 class="white-text">Footer Content</h5>
                <p class="grey-text text-lighten-4">You can use rows and columns here to organize your footer content.</p>
              </div>
              <div class="col l4 offset-l2 s12">
                <h5 class="white-text">Links</h5>
                <ul>
                  <li><a class="grey-text text-lighten-3" href="#!">Link 1</a></li>
                  <li><a class="grey-text text-lighten-3" href="#!">Link 2</a></li>
                  <li><a class="grey-text text-lighten-3" href="#!">Link 3</a></li>
                  <li><a class="grey-text text-lighten-3" href="#!">Link 4</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="footer-copyright">
            <div class="container">
            © 2018 Copyright Text
            <a class="grey-text text-lighten-4 right" href="#!">More Links</a>
            </div>
          </div>
        </footer>
    <!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>

<!-- <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>

<script src="{{ asset('assets/js/jquery.min.js') }}"></script> -->

<!-- <script type="text/javascript" src='{{ asset("assets/materialize/js/materialize.min.js")}}'></script>

<script type="text/javascript" src='{{ asset("assets/materialize/js/materialize.js")}}'></script>

<script type="text/javascript" src='{{ asset("assets/materialize/js/jquery.min.js")}}'></script>

<script type="text/javascript">
  $(document).ready(function(){
    $('.modal').modal();
  });
  $('.dropdown-trigger').dropdown();
</script> -->


<script type="text/javascript" src="js/bootstrap/bootstrap-dropdown.js"></script>
<script>
     $(document).ready(function(){
        $('.dropdown-toggle').dropdown()
    });
</script>

</body>
</html>
