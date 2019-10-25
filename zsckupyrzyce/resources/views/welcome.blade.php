<!DOCTYPE html>
@include('head')
    <body id="welcome" onkeypress="myFunction(event)">
        <div id="home" class="flex-center position-ref full-height" style="display: table;
        width: 100%;">
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

            <div class="content"  style="opacity:1;transition:0.5s all ease-in-out;display: table-cell;">
                <div class="title m-b-md">
                    Projekt ZSCKU PYRZYCE
                </div>
                <div class="animate-flicker">
                    <a href="{{route('kalkulator')}}"> ENTER </a>
                    <p id="demo"></p>
                  
                </div>
            </div>
            <div class="second" style="opacity:0;display: none;transition:0.5s all ease-in-out;">
              @include('auto.index')
            </div>
            <script>    
                    function myFunction(event) {
                        var x = event.which || event.keyCode;
                       // document.getElementById("demo").innerHTML = "The Unicode value is: " + x;
                        if(parseInt(x) == 13)  {
                           document.querySelector(".content").style.opacity = '0';
                           document.querySelector(".second").style.opacity = '1';
                           document.querySelector(".second").style.display = '';
                           document.querySelector(".content").style.display = 'none';
                        }
                    }
                </script>
        </div>
    </body>
</html>
