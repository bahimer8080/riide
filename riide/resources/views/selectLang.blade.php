@extends('layouts.app')

@section('content')
<style>
@media (min-width: 576px) { 
    .btn-lang {
        width: 100% ;
    }
 }


@media (min-width: 768px) {
    .swiper-slide {
        width: 200px !important;
    }
  }


@media (min-width: 992px) { 
    .btn-lang {
        width: 250px ;
    }
 }
</style>
<div class="position-fixed w-100 h-100 bg-light fixed-top d-flex flex-column justify-content-start align-items-center px-5">
    <img src="{{ asset('img/logo_cuadrado.png') }}" width="150" class="my-5 " alt="">

    
        <div class="row w-100">
            <div class="col-md-6 col-sm-12 justify-content-center d-flex">
                <a href="/es/bienvenido" style="font-size: 25px ; width: 300px ; " class="btn btn-primary btn-block mt-3">Español</a>
            </div>
            <div class="col-md-6 col-sm-12 justify-content-center d-flex">
                <a href="/en/bienvenido" style="font-size: 25px ; width: 300px ; " class="btn btn-primary btn-block mt-3">English</a>
            </div>
        </div>
        
        
    

    
    
</div>
@endsection
