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


    .pro {
      margin-right: 20px ;
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

    @media (min-width: 576px) { 
    .pro {
        width: 200px !important;
    }
 }


@media (min-width: 768px) {
    .pro {
        width: 200px !important;
    }
  }


@media (min-width: 992px) { 
    .pro {
        width: 250px ;
    }
 }


@media (min-width: 1200px) { }

  </style>


<!-- Swiper -->
<div class="swiper-container banners bnrs">
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
    <div class="row">
        <div class="col-12">
            @php
            $storeCurrent = "";
            @endphp
            @for( $x = 0 ; $x < count( $promotion ) ; $x++ )
                @if( $storeCurrent == "" )
                    @php
                        $storeCurrent = $promotion[0]->store_name;
                    @endphp
                    <h1 style="font-family: 'Roboto', sans-serif;"><img src="/{{ $promotion[$x]->store_image }}" width="50" alt=""> {{ $promotion[$x]->store_name }}</h1>
                    <div class="swiper-container">
                        <div class="swiper-wrapper">
                @endif
                @if( $storeCurrent == $promotion[$x]->store_name )
                    <div class="swiper-slide pro" style="background: transparent !important ;">
                      <a href="/product/{{ $promotion[$x]->product_id }}" class="card p-2 w-100" style="border-radius: 20px ;text-decoration: none ;">
                      <img src="{{ asset( $promotion[$x]->product_image ) }}" class="card-img-top" alt="...">
            <div class="card-body py-0 px-0">
              <div class="w-100 d-flex pb-3">
                <div class="w-100">
                  <h5 class="text-left text-dark pt-2 m-0"> {{ $promotion[$x]->product_name }} </h5>
                </div>
                <div class="w-100">
                  <h5 class="text-dark text-right font-weight-bold pt-2 m-0"> {{ $promotion[$x]->product_price_a }} </h5>                           
                </div>
              </div>
              <div class="w-100 mt-3 d-flex justify-content-center">
                <button class="btn btn-primary btn-sm mx-1">-</button>
                <input type="number" class="mx-1" style="width: 50px ; height: 28px ;">
                <button class="btn btn-primary btn-sm mx-1">+</button>
              </div>                           
            </div>
          </a>
                    </div>
                    
                @else
                        </div>
                        <!-- Add Pagination -->
                        <div class="swiper-pagination"></div>
                    </div>
                    <h1><img src="/{{ $promotion[$x]->store_image }}" width="50" alt="">{{ $promotion[$x]->store_name }}</h1>
                    <div class="swiper-container">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide pro" style="background: transparent !important ;">
                            <a href="/product/{{ $promotion[$x]->product_id }}" class="card p-2 w-100" style="border-radius: 20px ;text-decoration: none ;">
            <img src="{{ asset( $promotion[$x]->product_image ) }}" class="card-img-top" alt="...">
            <div class="card-body py-0 px-0">
              <div class="w-100 d-flex pb-3">
                <div class="w-100">
                  <h5 class="text-left text-dark pt-2 m-0"> {{ $promotion[$x]->product_name }} </h5>
                </div>
                <div class="w-100">
                  <h5 class="text-dark text-right font-weight-bold pt-2 m-0"> {{ $promotion[$x]->product_price_a }} </h5>                           
                </div>
              </div>
              <div class="w-100 mt-3 d-flex justify-content-center">
                <button class="btn btn-primary btn-sm mx-1">-</button>
                <input type="number" class="mx-1" style="width: 50px ; height: 28px ;">
                <button class="btn btn-primary btn-sm mx-1">+</button>
              </div>                           
            </div>
          </a>
                            </div>
                    
                    @php
                        $storeCurrent = $promotion[$x]->store_name;
                    @endphp
                @endif
            @endfor
        </div>
    </div>
</div>
  <!-- Swiper JS -->
  <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

  <!-- Initialize Swiper -->
  <script>

var swiper1 = new Swiper('.swiper-container', {
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
    });

    var swiper = new Swiper('.banners', {
      slidesPerView: 'auto',
      spaceBetween: 30,
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },
    });
  </script>
@endsection
