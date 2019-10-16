<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
                background-color: black;
                font-size: 40px;
            }

            .full-height {
                height: 100vh;
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
                font-size: 80px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
            @keyframes flickerAnimation {
                0%   { opacity:1; }
                50%  { opacity:0; }
                100% { opacity:1; }
            }
            @-o-keyframes flickerAnimation{
                0%   { opacity:1; }
                50%  { opacity:0; }
                100% { opacity:1; }
            }
            @-moz-keyframes flickerAnimation{
                0%   { opacity:1; }
                50%  { opacity:0; }
                100% { opacity:1; }
            }
            @-webkit-keyframes flickerAnimation{
                0%   { opacity:1; }
                50%  { opacity:0; }
                100% { opacity:1; }
            }
            .animate-flicker {
            -webkit-animation: flickerAnimation 1s infinite;
            -moz-animation: flickerAnimation 1s infinite;
            -o-animation: flickerAnimation 1s infinite;
            animation: flickerAnimation 1s infinite;
            }
            #welcome {
            
display: block;
 
height: 100vh;
width: 100%;
margin: 33vh 0;

            }
        </style>
    </head>
    <body onkeypress="myFunction(event)">
        <div id="welcome" class="flex-center position-ref full-height">
            {{-- @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif --}}

            <div class="content"  style="opacity:1;transition:0.5s all ease-in-out;">
                <div class="title m-b-md">
                    Projekt ZSCKU PYRZYCE
                </div>
                <div class="animate-flicker">
                    <a href="http://127.0.0.1:8000/kalkulator"> ENTER </a>
                    <p id="demo"></p>
                  
                </div>
            </div>
            <div class="second" style="opacity:0;transition:0.5s all ease-in-out;">
              @include('auto.index')
            </div>
            <script>    
                    function myFunction(event) {
                        var x = event.which || event.keyCode;
                       // document.getElementById("demo").innerHTML = "The Unicode value is: " + x;
                        if(parseInt(x) == 13)  {
                           document.querySelector(".content").style.opacity = '0';
                           document.querySelector(".second").style.opacity = '1';
                        }
                    }
                </script>
        </div>
    </body>
</html>
