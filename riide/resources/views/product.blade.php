@extends('layouts.app')

@section('content')
  <!-- Demo styles -->
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

    
@media (min-width: 576px) { 
    .swiper-slide {
        width: 200px !important;
    }
 }


@media (min-width: 768px) {
    .swiper-slide {
        width: 200px !important;
    }
  }


@media (min-width: 992px) { 
    .swiper-slide {
        width: 250px ;
    }
 }


@media (min-width: 1200px) { }
  </style>
<div class="container">
    <div class="row mt-4">
        <div class="col-md-6">
            <img src="/{{$product[0]->product_image}}" width="100%" alt="">
        </div>
        <div class="col-md-6 mt-sm-3">
            <div class="w-100 d-flex">
                <div class="">
                    <img src="/{{$product[0]->store_image}}" width="50" alt="">
                </div>
                <div class="w-100">
                    <h3 class="mt-2 pl-3"> {{ $product[0]->product_name }} </h3>
                </div>
                <div>
                    @if( $product[0]->product_price_b == null )
                      <h2 class="mt-2"> ${{ $product[0]->product_price_a }} </h2>
                    @else
                    <h2 class="mt-2 text-grey"> <strike>${{ $product[0]->product_price_a }}</strike>  </h2>
                    <h2 class="mt-2"> ${{ $product[0]->product_price_b }} </h2>
                    @endif
                    
                </div>
            </div>
            <div class="w-100 mt-3">
                <h2>Descripcion</h2>
                <p class="text-grey"> {{ $product[0]->product_description }} </p>
            </div>
            <div class="w-100 d-flex justify-content-end" >
                <button class="btn btn-primary btn-sm mx-1">-</button>
                <input type="number" class="mx-1" style="width: 50px ; height: 28px ;">
                <button class="btn btn-primary btn-sm mx-1">+</button>
            </div>
            <div class="w-100 d-flex justify-content-center mt-3">
                <div class="bg-white p-3 d-flex justify-content-center text-center shadow-sm" style="border-radius: 10px ;">
                    <h3>Sub Total<br>
                    @if( $product[0]->product_price_b == null )
                      ${{ $product[0]->product_price_a }}
                    @else
                    
                    ${{ $product[0]->product_price_b }}
                    @endif
                    </h3> 
                </div>
            </div>
            <div class="w-100">
                <h5>Detalles del pedido</h5>
                <textarea class="w-100" name="" id="" cols="30" rows="10"></textarea>
                <div class="w-100 d-flex mt-4">
                  <button class="btn btn-primary w-100 mx-1 p-2">Agregar <i class="fas fa-plus"></i> </button>
                  <button class="btn btn-primary w-100 mx-1 p-2">Ir al carrito <i class="fas fa-cart-plus"></i> </button>
                </div>
                
            </div>
        </div>
        <div class="col-12 mt-5">
              <!-- Swiper -->
        <h2>Productos relacionados</h2>
  <div class="swiper-container">
    <div class="swiper-wrapper">
        @foreach($related as $r)
      <div class="swiper-slide" style="background: transparent !important ;">
      <a href="/product/{{ $r->id }}" class="card p-2 w-100" style="border-radius: 20px ;text-decoration: none ;">
            <img src="{{ asset( $r->image ) }}" class="card-img-top" alt="...">
            <div class="card-body py-0 px-0">
              <div class="w-100 d-flex pb-3">
                <div class="w-100">
                  <h5 class="text-left text-dark pt-2 m-0"> {{ $r->name }} </h5>
                </div>
                <div class="w-100">
                  <h5 class="text-dark text-right font-weight-bold pt-2 m-0"> {{ $r->price_a }} </h5>                           
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
      @endforeach
    </div>
    <!-- Add Pagination -->
    <div class="swiper-pagination"></div>
  </div>
        </div>
    </div>
</div>
  <!-- Initialize Swiper -->
  <script>
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
