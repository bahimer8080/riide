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
        width: 200px ;
    }

    

 }

@media (min-width: 1200px) {  }

</style>


<div class="swiper-container swiper-banners bnrs">
    <div class="swiper-wrapper">
      @foreach( $banners[0]["banner"] as $b )
        <div class="swiper-slide w-100"> 
          <div class="w-100 h-100" style="background-image: url('{{ asset( $b->image ) }}') ;background-size: cover;background-position: center;" ></div>
          <!--<img src="{{ asset( $b->image ) }}" width="100%" alt="">-->
        </div>
      @endforeach
    </div>
    <div class="swiper-button-next text-white"></div>
    <div class="swiper-button-prev text-white"></div>
</div>



<div class="container">
    <div class="row">
        <div class="col-12 my-3">
        </div>
        
            <div class="col-12">
                <h2>{{ __("data.categories") }}</h2>
                <div class="row mt-2">
                <div class="swiper-container swipper-pro">
                  <div class="swiper-wrapper">
                @foreach(  $category as $cat )
                    <div class="swiper-slide slide-cat" style="background: transparent !important ;">
                        <a href="/mall/{{ $cat->id }}" class="card p-2 w-100" style="border-radius: 20px ;text-decoration: none ;">
                            <img src="{{ asset( $cat->image ) }}" class="card-img-top" alt="...">
                            <div class="card-body py-0 px-0">
                                <h4 class="card-title text-dark text-center pb-0 mb-0" style="color: #757575 !important;">{{ $cat->name }}</h4>
                                <!--<p class="card-text text-center" style="color: #bdbdbd ; font-size: 18px ;">{{ $cat->count }} {{ __('data.stores') }}</p>-->
                            </div>
                        </a>
                    </div>
                @endforeach
                </div>
                    <!--<div class="swiper-button-next text-white"></div>
                    <div class="swiper-button-prev text-white"></div>-->
                    <div class="swiper-pagination"></div>
                </div>
                </div>
                
            </div>
            <div class="col-12 mx-0 px-0">
            <hr>
            </div>
            


            <div class="col-md-12 mb-3">
                @php
                $countBanner = 0;
                $countCategory = 1;
                @endphp
                @foreach( $featured as $f )
                <h2 class="mt-3"> <img src="/img/fire.png" width="30" alt=""> {{ $f["category"] }} </h2>
                <div class="swiper-container swipper-pro" style="height: auto !important ;">
                    <div class="swiper-wrapper" style="height: auto !important ;">
                        
                            @foreach( $f["products"] as $p )
                            <div class="swiper-slide slide-pro" style="background: transparent !important ;">
                                <a href="/mall/{{ $p->product_id }}" class="card p-2 w-100" style="border-radius: 20px ;text-decoration: none ;">
                                    <img src="{{ asset( $p->product_image ) }}" class="card-img-top" alt="...">
                                    <div class="card-body py-0 px-0">
                                        <div class="w-100 d-flex">
                                          <div class="w-100">
                                            <h5 class="text-left text-dark pt-2 m-0">{{ $p->product_name }}</h5>
                                          </div>
                                          <div class="">
                                            @if( $p->product_price_b == null )
                                            <span class="text-dark pt-2 m-0">{{ $p->product_price_a }}</span>
                                            @else
                                            <span class="text-light pt-2 m-0"> <del> {{ $p->product_price_a }}</del></span>
                                            @endif
                                          </div>
                                        </div>
                                        <div class="w-100 d-flex">
                                          <div class="w-100 text-left" style="font-size: 8px ;">{{ $p->store_name }}</div>
                                          <div class="w-100"></div>
                                          <div class="w-100 text-right">
                                          @if( $p->product_price_b != null )
                                            <span class="text-dark pt-2 m-0">{{ $p->product_price_b }}</span>
                                          @endif
                                            
                                          </div>
                                        </div>
                                        <div class="w-100">
                                          <button class="btn btn-primary btn-sm mx-1">-</button>
                                          <input type="number" class="mx-1" style="width: 50px ; height: 28px ;">
                                          <button class="btn btn-primary btn-sm mx-1">+</button>
                                        </div>
                                       
                                    </div>
                                </a>
                            </div>
                            
                            @endforeach
                    </div>
    
                    <div class="swiper-pagination"></div>
                </div>
                <hr>
                @if( $countCategory % 2 == 0 )
                @php
                  $countBanner++;
                @endphp
                <div class="swiper-container swiper-banners bnrs mt-5" style="height: auto ;">
                    <div class="swiper-wrapper">
                        @foreach( $banners[$countBanner]["banner"] as $b )
                            <div class="swiper-slide w-100">
                            <div class="w-100 h-100" style="background-image: url('{{ asset( $b->image ) }}') ;background-size: cover;background-position: center;" ></div>
                                <!--<img src="{{ asset( $b->image ) }}" width="100%" alt="">-->
                            </div>
                        @endforeach
                    </div>
    
                    <div class="swiper-button-next text-white"></div>
                    <div class="swiper-button-prev text-white"></div>
                </div>
                
                @endif
                @php
                    $countCategory++;
                @endphp
                @endforeach
            </div>
    </div>
</div>

  <script>
    var swiper = new Swiper('.swiper-banners', {
      slidesPerView: 'auto',
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
    });

    var swiper2 = new Swiper('.swipper-pro', {
      slidesPerView: "auto",
      spaceBetween: 20,
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },
    });
    /*
    //swiper-banner
    var swiper2 = new Swiper('.swiper-banner', {
      slidesPerView: 'auto',
      spaceBetween: 0,
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
    });

    var swiper3 = new Swiper('.swiper-banner2', {
      spaceBetween: 0,
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
    });*/
  </script>
@endsection
