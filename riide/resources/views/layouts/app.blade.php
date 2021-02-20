<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
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
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.css" />
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

    <script src="https://unpkg.com/swiper/swiper-bundle.js"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <!--<script src="/js/rain.js"></script>
    <script src="/js/rd.js"></script>
    <script src="/js/rds.js"></script>-->



    <style>

    

@media (max-width: 575px) { 

    .bnrs {
        height: 200px !important;
    }

    .hidde-sm {
        display: none !important ;
    }
    .footer_navigation_bar {
        display: block ;
    }
 }
@media (min-width: 576px) { 
    .bnrs {
        height: 300px !important;
    }
    .hidde-sm {
        display: none ;
    }
    .footer_navigation_bar {
        display: block ;
    }
 }


@media (min-width: 768px) {

    .bnrs {
        height: 350px !important;
    }

    .footer_navigation_bar {
        display: none ;
    }
  }


@media (min-width: 992px) { 
    .bnrs {
        height: 400px !important;
    }
 }


@media (min-width: 1200px) { 
    
}


    /*#pan {
        top: 0px ;
        position: fixed ;
        width: 100% ;
        height: 100% ;
        background: red ;
        display: block ;
    }*/

    .left_container{
    background-color: #ffffff;
    width: 100%;
    height: 100px;
    border-radius: 0px 0px 0px 0px;
    box-shadow: 22px 8px 22px 8px rgb(0 0 0 / 20%), 0 6px 20px 0 rgb(0 0 0 / 19%);
}
.col_nopadding{
    padding: 0;
    z-index: 2;
}
.left_column{
    padding: 0;
    text-align: -webkit-right;
    width: 50%;
}
.right_column{
    padding: 0;
    text-align: -webkit-left;
    width: 50%;
}
.right_container{
    background-color: #ffffff;
    width: 100%;
    height: 100px;
    border-radius: 0px 0px 0px 0px;
    box-shadow: -19px 8px 16px 9px rgb(0 0 0 / 20%), 0 6px 20px 0 rgb(0 0 0 / 19%);
}
.round{
width: 100%;
}
.responsive_columns p{
    font-size: 10px;
}
.btn_circle_home{
    background: #17c0d5;
    color: white;
    width: 100px;
    height: 100px;
    position: relative;
    border-radius: 200px;
    margin-left: auto;
    margin-right: auto;
    bottom: 160px;
    z-index: 100;
    transition: 0.2s;
    text-align: center;
    padding-top: 33px;
    box-shadow: 0 2px 18px 0 rgb(0 0 0 / 9%), 0 7px 26px 0 rgb(0 0 0 / 19%);
}
.btn_circle_home:hover{
    background: #fcfcfc;
    border: inset #17c0d5;
    color: #17c0d5;
    border-style: solid;
    border-width: 2px;
    padding-top: 30px;
    transition: 0.2s;
}
.footer_navigation_bar{
    position: fixed;
    bottom: 0px;
    width: 100%;
    max-height: 100px;
    margin-left: auto;
    margin-right: auto;
}
.align_content{
    display: inline-flex;
    width: 100%;

}
.no_margins{
    color: #949598;
    transition: 0.2s;
    margin-top: 30px;
    text-align: center;
}
.no_margins:hover{
    transition: 0.2s;
    color: #17c0d5;
}
.left_container .fas {
    font-size: 20px;
}
.right_container .fas {
    font-size: 20px;
}
.btn_home_icon{
    font-size: 30px
}

@media only screen and (max-width: 768px) {
    footer_navigation_bar {
        display: block ;
    }
/* Create By: LexSank */
    .btn_circle_home{
        bottom: 155px;
        width: 80px;
        height: 80px;
        padding-top: 24px;
    }
    .btn_circle_home:hover{
        padding-top: 22px;
    }
    .footernav_center_svg{
        width: 160px;
        height: 120px;
    }
    .right_container{
        margin-top: 20px;
    }
    .left_container{
        margin-top: 20px;

    }
    .row-mobile_left{
        margin-left: auto;
        margin-right: auto;
    }
    .row-mobile_right{
        margin-left: auto;
        margin-right: auto;
    }
    .responsive_columns {
        width: 45%;
        text-align: center;
    }
  }

  @media only screen and (max-width: 588px) {
    /* Create By: LexSank */
    .btn_circle_home{
        bottom: 155px;
        width: 70px;
        height: 70px;
        padding-top: 24px;
    }
    .btn_circle_home:hover{
        padding-top: 21px;
    }
    .no_margins {
        margin-top: 15%;
    }
    .footernav_center_svg{
        width: 154px;
        height: 129px;
    }
    .right_container{
        margin-top: 26px;
    }
    .left_container{
        margin-top: 26px;
    }
    .left_container .fas {
        font-size: 15px;
    }
    .right_container .fas {
        font-size: 15px;
    }
    .btn_home_icon{
        font-size: 25px
    }
    .row-mobile_left{
        position: relative;
        left: 10px;
    }
    .row-mobile_right{
        position: relative;
        right: 5px;
    }

  }


    </style>
</head>
<body>
    <div id="app">
        
        
        <!--if( !Route::is('login') && !Route::is('register') && !Route::is('admin') && !Route::is("admin/stores"))-->
        @if( !Route::is('login') && !Route::is('register'))
        <nav class="navbar navbar-light bg-primary p-0">
            <div class="w-100 d-flex">
                <a href="/mall" class="hidde-sm px-5 py-3 d-sm-none d-md-flex">
                    <img src="/img/logo_white.png" width="50" alt="">
                </a>
                <div class="d-sm-flex d-md-none text-center flex-column align-items-center justify-content-end px-3 pt-3">
                @guest
                    <img src="/img/person.png" width="30" alt="">
                    <p class="p-0 m-0 pb-2 text.white font-weight-bold text-white text-center w-100" style="font-family: 'Roboto', sans-serif;">{{ __("data.register") }}</p>
                    @else
                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                        <img src="/{{ \Auth::user()->avatar }}" width="30" alt="">
                        <p class="p-0 m-0 pb-2 text.white font-weight-bold text-white text-center w-100" style="font-family: 'Roboto', sans-serif;">{{ \Auth::user()->name }}</p>
                    </a>
                    @endguest
                </div>
                <div class="w-100 d-flex flex-column">
                    <div class="w-100 h-100">
                        <div class="form-group has-search mb-0 pt-2 mt-sm-2">
                            <span class="fa fa-search form-control-feedback"></span>
                            <input onkeyup="key(event)" id="search" type="text" class="form-control" placeholder="Search">
                        </div>
                    </div>
                    <div class="hidde-sm w-100 h-100 d-sm-none d-md-flex">
                        <a href="/mall" class="w-100 h-100 d-flex justifiy-content-center align-items-center text-white font-weight-bold" style="font-family: 'Roboto', sans-serif;">{{ __("data.categories") }}</a>
                        <a href="/promotion" class="w-100 h-100 d-flex justifiy-content-center align-items-center text-white font-weight-bold" style="font-family: 'Roboto', sans-serif;">{{ __("data.promotions") }}</a>
                        <a href="mall/1" class="w-100 h-100 d-flex justifiy-content-center align-items-center text-white font-weight-bold" style="font-family: 'Roboto', sans-serif;">{{ __("data.stores") }}</a>
                        <!--<a class="w-100 h-100 d-flex justifiy-content-center align-items-center text-white font-weight-bold" style="font-family: 'Roboto', sans-serif;">{{ __("data.want_rider") }}</a>-->
                        <a class="w-100 h-100 d-flex justifiy-content-center align-items-center text-white font-weight-bold" style="font-family: 'Roboto', sans-serif;">{{ __("data.us") }}</a>
                        <a class="w-100 h-100 d-flex justifiy-content-center align-items-center text-white font-weight-bold" style="font-family: 'Roboto', sans-serif;">{{ __("data.used_guide") }}</a>
                    </div>
                </div>
                <div class="d-flex">
                <div class="w-100 d-flex text-center flex-column align-items-end justify-content-end px-3 pt-3">
                    <img src="/img/wallet.png" width="30" alt="">
                    <p class="p-0 m-0 pb-2 text.white font-weight-bold text-white text-center w-100" style="font-family: 'Roboto', sans-serif;">$80</p>
                </div>
                <div class="w-100 d-flex text-center flex-column align-items-end justify-content-end px-3 pt-3">
                    <img src="/img/cart.png" width="30" alt="">
                    <p class="p-0 m-0 pb-2 text.white font-weight-bold text-white text-center w-100" style="font-family: 'Roboto', sans-serif;">$80</p>
                    <span class="badge badge-light position-absolute" style="top: 10px ;">10</span>
                </div>


                <div class="w-100 hidde-sm d-md-flex text-center flex-column align-items-center justify-content-end px-3 pt-3">
                    
                    @guest
                    <a href="/select-type-user">
                        <img src="/img/person.png" width="30" alt="">
                        <p class="p-0 m-0 pb-2 text.white font-weight-bold text-white text-center w-100" style="font-family: 'Roboto', sans-serif;">{{ __("data.register") }}</p>
                    </a>
                    
                    @else
                    
                                    

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                    <img src="/{{ \Auth::user()->avatar }}" width="30" alt="">
                    <p class="p-0 m-0 pb-2 text.white font-weight-bold text-white text-center w-100" style="font-family: 'Roboto', sans-serif;">{{ \Auth::user()->name }}</p>
                                   
                    
                    @endguest
                    
                    
                </div>


                <div class="w-100 hidde-sm d-md-flex text-center flex-column align-items-center justify-content-center px-3 pt-3">
                    <img src="/img/plus.png" width="30" alt="">
                    <p class="p-0 m-0 pb-2 text.white font-weight-bold text-white text-center w-100" style="font-family: 'Roboto', sans-serif;"> </p>
                </div>
                </div>
            </div>
        </nav>
        @endif
        <!--<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <ul class="navbar-nav ml-auto">
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">-- @lang('auth.name') -- {{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>-->
        <!--endif
        if( Route::is("admin") || Route::is("admin/stores") )-->

        @guest
        @else
        @if( Auth::user()->rol_id == 4 )
        <nav class="navbar navbar-expand-sm bg-white">
            <!-- Brand -->
            <a class="navbar-brand" href="#">
                <img src="/img/mcdonalds.png" width="50" alt="">
                <span>User</span>
            </a>

            <!-- Links -->
            <ul class="navbar-nav">
                

                <!-- Dropdown -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                        opciones
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="/admin/stores/1">Stores</a>
                        <a class="dropdown-item" href="/admin/riders/1">Riders</a>
                        <a class="dropdown-item" href="/admin/store">Banners</a>
                        <a class="dropdown-item" href="/admin/categories/0/1">Categorias</a>
                    </div>
                </li>
            </ul>
        </nav>
        @endif

        @if( Auth::user()->rol_id == 2 )
        <nav class="navbar navbar-expand-sm bg-white">
            <!-- Brand -->
            <a class="navbar-brand" href="#">
                <img src="/img/mcdonalds.png" width="50" alt="">
                <span>User</span>
            </a>

            <!-- Links -->
            <ul class="navbar-nav">
                

                <!-- Dropdown -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                        opciones
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="/store-admin/store/option">Stores</a>
                        <a class="dropdown-item" href="/store-admin/products/1">Products</a>
                        <a class="dropdown-item" href="/store-admin/banners/1">Banners</a>
                    </div>
                </li>
            </ul>
        </nav>
        @endif
        @endguest

        
        <!--endif-->
        <main class="pb-4">
            @yield('content')
        </main>
    </div>
    @if( !Route::is('login') && !Route::is('register') && !Route::is('/presentation/es') && !Route::is('/presentation/es') && !Route::is('/') )
    <!--<div class="fixed-bottom">
        <nav class="navbar navbar-light bg-white p-0 d-flex justify-content-around">
            <div class="py-2 d-flex flex-column justify-content-center align-items-center">
                <i class="fas fa-fire-alt" style="font-size: 20px ;"></i>
                <span>Lo mas hot</span>
            </div>
            <div class="py-2 d-flex flex-column justify-content-center align-items-center">
                <i class="fas fa-ticket-alt" style="font-size: 20px ;"></i>
                <span>Promociones</span>
            </div>
            <div class="py-2 d-flex flex-column justify-content-center align-items-center">
                <div class="bg-primary"></div>
                <i class="fas fa-home text-primary" style="font-size: 33px ;"></i>
                
                
            </div>
            <div class="py-2 d-flex flex-column justify-content-center align-items-center">
                <i class="fas fa-store" style="font-size: 20px ;"></i>
                <span>Tienda</span>
            </div>
            <div class="py-2 d-flex flex-column justify-content-center align-items-center">
                <i class="fas fa-indent" style="font-size: 20px ;"></i>
                <span>Lo mas hot</span>
            </div>
        </nav>
    </div>-->
    @endif
    @if( !Route::is('login') && !Route::is('register') && !Route::is('lang') && !Route::is('wel')  )
    <div class="footer_navigation_bar" style="z-index: 10000;">

        <div class="align_content">
                <div class="left_column">
                    <div class="left_container">
                        <div class="row row-mobile_left">
                            <a href="/mall" class="col-sm responsive_columns no_margins">
                                

                                <i class="fas fa-th-large"></i>
                                <p>Item</p>
                            </a>
                            <a href="/promotion" class="col-sm responsive_columns no_margins">
                                

                                <i class="fas fa-percent"></i>
                                <p>Item</p>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col_nopadding footernav_center">
                    <svg class="footernav_center_svg" version="1.1" id="Color_Fill_1_1_" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                        y="0px" width="200px" height="100px" viewBox="0 0 48 24" enable-background="new 0 0 48 24" xml:space="preserve">
                        <g id="Color_Fill_1">
                            <g>
                                <path fill="#FEFEFE" d="M42.562,0C35.374,0,39.669,14.342,24,14.342C8.484,14.342,12.844,0,5.655,0C3.188,0,0,0,0,0v24h48V0
                                    C48,0,44.967,0,42.562,0z"/>
                            </g>
                        </g>
                    </svg>

                    <div class="btn_circle_home">
                        <i class="fas fa-home btn_home_icon"></i>
                    </div>
                </div>

                <div class="right_column">
                    <div class="right_container">
                        <div class="row row-mobile_right">
                            <a href="/mall/1" class="col-sm responsive_columns no_margins">
                                
                                <i class="fas fa-store-alt"></i>
                                <p>Item</p>
                            </a>
                            <a class="col-sm responsive_columns no_margins">
                                <i class="fas fa-bars"></i>
                                <p>Item</p>
                            </a>
                        </div>
                    </div>
                </div>
              </div>
          </div>
          @endif
    <div id="pan"></div>
</body>
</html>
<script>
window.addEventListener("load",function(){
    //document.getElementById("pan").style.display = "none";
},false);

function key(event){
    if(event.keyCode === 13){
        console.log( $("#search").val() );
        window.location.href = "/search/" + $("#search").val().split(" ").join("-")
    }
}


</script>