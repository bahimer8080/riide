@extends('layouts.app')

@section('content')
<div class="position-fixed w-100 h-100 bg-light fixed-top d-flex flex-column justify-content-start align-items-center px-5">
<div id="carouselExampleIndicators" class="carousel slide w-100 h-100">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner h-100">
    <div class="carousel-item h-100 active">
        <div class="position-absolute w-100 h-100 text-center">
            <img src="{{ asset('img/Find food you love vector.png') }}" class="my-5" width="200" alt="">
            <h3>{{ __('data.slider_pres_1_title') }}</h3>
            <p style="font-size: 18px ;">{{ __('data.slider_pres_1_description') }}</p>
            <div class="row">
              <div class="col-md-4 offset-md-4 col-sm-12 offset-sm-0">
                <a class="btn btn-primary btn-block mt-2 mb-3" href="#carouselExampleIndicators" role="button" data-slide="next">{{ __('data.next') }}</a>
                <a class="mt-5" href="/login" role="button" data-slide="next">{{ __('data.skip') }}</a>
              </div>
            </div>
        </div>
    </div>
    <div class="carousel-item">
        <div class="position-absolute w-100 h-100 text-center">
            <img src="{{ asset('img/Delivery vector.png') }}" class="my-5" width="200" alt="">
            <h3>{{ __('data.slider_pres_2_title') }}</h3>
            <p style="font-size: 18px ;">{{ __('data.slider_pres_2_description') }}</p>
            <div class="row">
              <div class="col-md-4 offset-md-4 col-sm-12 offset-sm-0">
                <a class="btn btn-primary btn-block mt-2 mb-3" href="#carouselExampleIndicators" role="button" data-slide="next">{{ __('data.next') }}</a>
                <a class="mt-5" href="/login" role="button" data-slide="next">{{ __('data.skip') }}</a>
              </div>
            </div>
         </div>
    </div>
    <div class="carousel-item">
        <div class="position-absolute w-100 h-100 text-center">
            <img src="{{ asset('img/Live tracking vector.png') }}" class="my-5" width="200" alt="">
            <h3>{{ __('data.slider_pres_3_title') }}</h3>
            <p style="font-size: 18px ;">{{ __('data.slider_pres_3_description') }}</p>
            <div class="row">
              <div class="col-md-4 offset-md-4 col-sm-12 offset-sm-0">
                <a class="btn btn-primary btn-block mt-2 mb-3" href="/login" role="button" data-slide="next">{{ __('data.next') }}</a>
              </div>
            </div>
        </div>
    </div>
  </div>
  <!--<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>-->
</div>
</div>
@endsection
