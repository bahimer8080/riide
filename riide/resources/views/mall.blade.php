@extends('layouts.app')

@section('content')
<style>
    html,
    body {
      position: relative;
      height: 100%;
    }

    body {
      background: #eee;
      font-family: Helvetica Neue, Helvetica, Arial, sans-serif;
      font-size: 14px;
      color: #000;
      margin: 0;
      padding: 0;
    }

    .swiper-container {
      width: 100%;
    }

    .swiper-slide {
      text-align: center;
      font-size: 18px;
      background: #fff;

      /* Center slide text vertically */
      display: -webkit-box;
      display: -ms-flexbox;
      display: -webkit-flex;
      display: flex;
      -webkit-box-pack: center;
      -ms-flex-pack: center;
      -webkit-justify-content: center;
      justify-content: center;
      -webkit-box-align: center;
      -ms-flex-align: center;
      -webkit-align-items: center;
      align-items: center;
    }

    @media (max-width: 576px) { 
    .content-card {
        width: 33% !important;
    }

    

    .card-title {
      font-size: 14px ;
    }

    .card-text {
      font-size: 12px !important ;
    }

    
 }


  </style>
   <!-- Swiper -->
   <div class="swiper-container bnrs">
    <div class="swiper-wrapper">
      @foreach( $banners as $b )
      <a href="http://{{ $b->url }}" target="_blank" class="swiper-slide">
          <div class="w-100 h-100" style="background-image: url('{{ asset( $b->image ) }}') ;background-size: cover;background-position: center;" ></div>
          <!--<img src="{{ asset( $b->image ) }}" width="100%" alt="">-->
      </a>
      @endforeach
    </div>
    
    <!-- Add Arrows -->
    <div class="swiper-button-next text-white"></div>
    <div class="swiper-button-prev text-white"></div>
  </div>
  
<div class="container">
<h2 class="text-left text-grey pt-4" style="color: #757575;">{{ __('data.categories') }}</h2>
    <div class="row pt-2">
        
        @foreach( $categories as $cat )
        <div class="col-sm-4 mb-2 content-card">
            <a href="/mall/{{ $cat->id }}" class="card p-1 rounded" style="text-decoration: none ;">
                <img src="{{ asset( $cat->image ) }}" class="card-img-top rounded" alt="...">
                <div class="card-body pt-2 px-0 pb-0">
                    <h2 class="card-title text-dark text-center pb-0" style="color: #757575 !important;margin-bottom: 0px !important ;">{{ $cat->name }}</h2>
                    
                </div>
            </a>
            <p class="card-text text-right" style="color: #bdbdbd ; font-size: 18px ;">{{ $cat->count }} {{ __('data.stores') }}</p>
        </div>
        @endforeach
    </div>
</div>
  <!-- Initialize Swiper -->
  <script>
    var swiper = new Swiper('.swiper-container', {
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
    });
  </script>
@endsection
