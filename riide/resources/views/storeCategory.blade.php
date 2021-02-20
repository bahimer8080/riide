@extends('layouts.app')

@section('content')
<div class="container m-0 p-0">
    <div class="row m-0 p-0">
        <div class="col-12 m-0 p-0">
        <div class="header-store w-100 d-flex align-items-end" style="bottom: 0px ; background-image: url('/{{ $store[0]->bg_image }}') ; ">
                <div class="position-md-absolute w-100 d-flex" style="bottom: 0px ; background-image: url('{{ $store[0]->bg_image }}') ; ">
                    <div class="p-3">
                        <img src="/img/banner1.png" class="pb-0" width="50" height="50" style="" alt="">
                    </div>
                    <div class="w-100">
                        <p class="text-white text-weight-bold pt-3 pb-0" style="font-weight: bold ;">fgfdgfhfh
                        <br> <span>
                            <i class="fa fa-star"></i> fgfdhfdhdfh
                        </span>
                        </p>
                        
                    </div>
                    <div class="d-flex justify-content-center align-items-center">
                    <span class="badge badge-light text-black mx-2"> sdfgfdh </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
