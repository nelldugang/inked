<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Inked Up</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            @import url('https://fonts.googleapis.com/css?family=Niconne|Leckerli+One|Satisfy|Alex+Brush|Parisienne');
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;

            }

            .full-height {
                height: 15vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            .machine {
            animation: shake 0.5s;
            animation-iteration-count: infinite;
            }

            @keyframes shake {
              0% { transform: translate(1px, 1px) rotate(0deg); }
              10% { transform: translate(-1px, -1px) rotate(0deg); }
              20% { transform: translate(-1px, 0px) rotate(0deg); }
              30% { transform: translate(1px, 1px) rotate(0deg); }
              40% { transform: translate(1px, -1px) rotate(0deg); }
              50% { transform: translate(-1px, 1px) rotate(0deg); }
              60% { transform: translate(-1px, 1px) rotate(0deg); }
              70% { transform: translate(1px, 1px) rotate(-0deg); }
              80% { transform: translate(-1px, -1px) rotate(0deg); }
              90% { transform: translate(1px, 1px) rotate(0deg); }
              100% { transform: translate(1px, -1px) rotate(0deg); }
            }

            .bzzt {
             
            /*font-family: 'Leckerli One', cursive;*/
             font-family: 'Satisfy', cursive;
            /*font-family: 'Alex Brush', cursive;*/
            /*font-family: 'Parisienne', cursive;*/
            font-size:6vw;

            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/articles') }}">Home</a>
                    @else
                        <a href="{{ url('/articles') }}">Visit as Guest</a>
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            @endif
        </div>    
<!--             <div class="content">
                <div class="title m-b-md">
                    LAVAREL
                </div>

                <div class="links">
                    <a href="https://laravel.com/docs">Documentation</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div>
            </div>
        </div> -->
<div style="text-align: center">
<h1 class="bzzt" style="display: inline;color: black">Inked</h1>
<img class="machine" src='{{URL::asset("/public/img/machine.jpg")}}' style="width:33vw;min-width:300px; max-width: 450px;height:auto;display: inline-block;">
</div>
    </body>
</html>
