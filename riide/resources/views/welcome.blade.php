<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <style>
    canvas {
  position: absolute;
  width: 100% ;
  height: 100% ;
  top: 0;
  left: 0;
}
    </style>
    <script src="/js/rain.js"></script>
    <script src="/js/rd.js"></script>
    <script src="/js/rds.js"></script>
    </head>
    <body class="bg-primary">
    <div class="backgroud_splash">


    <div class="container_logo">
       <a href="/">
       	<img src="{{ asset('img/logo_riide.svg') }}" alt="">
       </a>
    </div>


</div>



<div style="display: none">
    <svg class="r_bg" id="svgElement" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
        width="62.393px" height="57.426px" viewBox="0 0 62.393 57.426" enable-background="new 0 0 62.393 57.426" xml:space="preserve">
    <path fill-rule="evenodd" clip-rule="evenodd" fill="#ffffff8f" d="M5.566,1.091c2.382-1.084,5.059-1.125,7.627-1.08
    c10.105,0.009,20.215-0.008,30.325,0.004c2.778-0.004,5.726,0.641,7.871,2.509c2.223,1.935,2.909,5.034,2.863,7.863
    c-0.042,3.874,0.055,7.749-0.047,11.619c-0.177,3.596-2.479,7.087-6.05,8.057c-3.672,1.164-7.593,0.22-11.341,0.763
    c-1.863,0.886-1.989,3.989-0.113,4.972c8.199,6.686,16.526,13.217,24.756,19.869c0.932,0.71,0.932,1.498,0.426,1.75
    c-3.911,0.012-10.526,0.252-11.273-0.527c-10.937-8.524-21.881-17.032-32.821-25.553c-0.025-0.565-0.046-1.13-0.067-1.695
    c-0.063-1.547,0.004-2.588-0.059-4.14c-0.145-0.713,0.575-0.953,0.94-0.855c6.864-0.228,13.739-0.038,20.595-0.523
    c2.787-0.325,4.883-2.964,4.739-5.738c-0.055-2.517,0.186-5.055-0.173-7.555c-0.511-2.623-3.128-4.364-5.722-4.305
    C31.296,6.475,24.55,6.534,17.809,6.5c-1.572-0.013-3.242,0.097-4.574,1.02c-1.408,0.86-2.196,2.433-2.424,4.03
    c-0.034,9.376,0.021,18.749-0.03,28.125c-1.547,0.03-3.095,0.034-4.642,0.025c-1.88-0.013-3.76-0.009-5.637-0.004
    c-0.046-9.63-0.004-19.254-0.025-28.883C0.465,9.009,0.587,7.162,1.295,5.484C2,3.482,3.635,1.914,5.566,1.091z"/>
    </svg>
</div>


<script>bubbly({
    blur:0,
    colorStart: '#17c0d5',
    colorStop: '#17c0d5',
    //canvas: document.getElementById("bgn"),
    radiusFunc:() => 5,
    angleFunc:() => -Math.PI / 2,
    velocityFunc:() => 4,

    bubbles:10
  });
  </script>
    <!--<canvas id='snow'></canvas>-->
        <div class="w-100 h-100 position-fixed d-flex justify-content-center align-items-center">
            <img src="{{ asset('img/logo_white.png') }}" alt="" width="200" height="200">
        </div>
        @auth
            <script>
                $(function(){
                    setTimeout(function(){
                        window.location.href = "/home"
                    },3000);
                });
            </script>
        @else
            <script>
                $(function(){
                    setTimeout(function(){
                        window.location.href = "/seleccione-idioma"
                    },3000);
                });
            </script>     
        @endauth
        <!--<div class="flex-center position-ref full-height">
            @if (Route::has('login'))
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
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Laravel
                </div>

                <div class="links">
                    <a href="https://laravel.com/docs">Docs</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://blog.laravel.com">Blog</a>
                    <a href="https://nova.laravel.com">Nova</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://vapor.laravel.com">Vapor</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div>
            </div>
        </div>-->
        <script>
        /*
var canvas = document.getElementById('snow');
var ctx = canvas.getContext('2d');

var w = canvas.width = window.innerWidth;
var h = canvas.height = window.innerHeight;

var num = 60;
var tamaño = 40;
var elementos = [];

inicio();
nevada();

window.addEventListener("resize", function() {
  w = canvas.width = window.innerWidth;
  h = canvas.height = window.innerHeight;
});

function inicio() {
  for (var i = 0; i < num; i++) {
    elementos[i] = {
      x: Math.ceil(Math.random() * w),
      y: Math.ceil(Math.random() * h),
      toX: Math.random() * 10 - 5,
      toY: Math.random() * 5 + 1,
      tamaño: Math.random() * tamaño
    }
  }
}

function nevada() {
  window.requestAnimationFrame(nevada); 
  ctx.clearRect(0, 0, w, h);
  for (var i = 0; i < num; i++) {
    var e = elementos[i];
    ctx.beginPath();
    cristal(e.x, e.y, e.tamaño);
   
    
    ctx.fill();
    ctx.stroke();
    e.x = e.x + e.toX;
    e.y = e.y + e.toY;
    if (e.x > w) { e.x = 0;}
    if (e.x < 0) { e.x = w;}
    if (e.y > h) { e.y = 0;}
  }
  //timer = setTimeout(nevada,10);
}

function cristal(cx, cy, long) {
  ctx.fillStyle = "white";
  ctx.lineWidth = long / 20;
  ctx.arc(cx, cy, long / 15, 0, 2 * Math.PI);
  for (i = 0; i < 6; i++) {
    ctx.strokeStyle = "white";
    ctx.moveTo(cx, cy);
    ctx.lineTo(cx + long / 2 * Math.sin(i * 60 / 180 * Math.PI),
               cy + long / 2 * Math.cos(i * 60 / 180 * Math.PI));
  }
}*/



        </script>
    </body>
</html>
