@extends('layouts.app')

@section('content')
<style>

.swiper-container {
      width: 100%;
      height: 100%;
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

    /*.swiper-slide:nth-child(2n) {
      width: 60%;
    }

    .swiper-slide:nth-child(3n) {
      width: 40%;
    }*/

    @media (min-width: 576px) {
      .swiper-slide {
            width: 100px ;
        }
     }

@media (min-width: 768px) { 
  
 }

@media (min-width: 992px) {
    .swiper-slide {
        width: 300px ;
    }
 }

@media (min-width: 1200px) {  }

</style>
<!-- Swiper -->
<div class="swiper-container swiper-container-banner">
    <div class="swiper-wrapper">
      @foreach( $banners as $b )
      <div class="swiper-slide">
          <!--<div class="w-100 h-100" style="background-image: url('{{ asset( $b->image ) }}') ;" ></div>-->
          <img src="{{ asset( $b->image ) }}" width="100%" alt="">
      </div>
      @endforeach
    </div>
    
    <!-- Add Arrows -->
    <div class="swiper-button-next text-white"></div>
    <div class="swiper-button-prev text-white"></div>
  </div>
  <!-- Swiper -->
  <!--
  <div class="swiper-container">
    <div class="swiper-wrapper">
      <div class="swiper-slide">Slide 1</div>
      <div class="swiper-slide">Slide 2</div>
      <div class="swiper-slide">Slide 3</div>
      <div class="swiper-slide">Slide 4</div>
      <div class="swiper-slide">Slide 5</div>
      <div class="swiper-slide">Slide 6</div>
      <div class="swiper-slide">Slide 7</div>
      <div class="swiper-slide">Slide 8</div>
      <div class="swiper-slide">Slide 9</div>
      <div class="swiper-slide">Slide 10</div>
    </div>
    <div class="swiper-pagination"></div>
  </div>-->
<div class="container">
    <div class="row">
        <div class="col-12 my-3">
            
        </div>
            <div class="col-12">
                <div class="row mt-2">
                <!-- Swiper -->
                <div class="swiper-container px-3">
                  <div class="swiper-wrapper">
                @foreach( $stores as $store )
                    <div class="swiper-slide slide-pro">
                    <a href="" class="card" style="text-decoration: none ;">
                    <img src="{{ asset( $store['store']->store_image ) }}" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 style="text-decoration: none ;" class="card-title font-weight-bold text-center">{{ $store['store']->store_name }}</h5>
                    </div>
                  </a>
                    </div>
                @endforeach
                </div>
                  <div class="swiper-pagination"></div>
                </div>
                </div>
                <hr>
            </div>
    </div>

    
    <div class="row">
        @foreach( $stores as $store )
        <div class="col-12">
            <h3> {{ $store["store"]->store_name }} </h3>
                <div class="row mt-2">
                <!-- Swiper -->
                <div class="swiper-container px-3">
                  <div class="swiper-wrapper">
                @foreach( $store["product"] as $product )
                    <div class="swiper-slide slide-pro">
                    <a href="" class="card" style="text-decoration: none ;">
                    <img src="{{ asset( $product->image ) }}" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 style="text-decoration: none ;" class="card-title font-weight-bold text-center">{{ $product->name }}</h5>
                    </div>
                  </a>
                    </div>
                @endforeach
                </div>
                  <div class="swiper-pagination"></div>
                </div>
                </div>
                <hr>
            </div>
            @endforeach
    </div>

</div>

<!-- Initialize Swiper -->
  <script>
    var swiper = new Swiper('.swiper-container-banner', {
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
    });


    var swiper = new Swiper('.swiper-container', {
      slidesPerView: 'auto',
      spaceBetween: 30,
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },
    });
  </script>
@endsection
