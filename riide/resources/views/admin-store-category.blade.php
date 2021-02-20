@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">
        
            @foreach( $sliders[0]["banners"] as $banner )
            <div class="card mt-2">
                <img src="/{{ $banner->banner_image }}" class="card-img-top" alt="...">
                <div class="card-body">
                <h5 class="card-title"> {{ $banner->store_name }}</h5>
                    <a href="/admin/store/{{$category}}/delete/{{$slider_id}}/{{$banner->banner_id}}" class="btn btn-danger">Quitar</a>
                </div>
            </div>
            @endforeach
        </div>
        <div class="col-md-6">
            @foreach( $banners as $b )
                @php
                    $bool = true;
                @endphp
                
                @foreach( $sliders[0]["banners"] as $banner )
                    @if( $banner->banner_id == $b->banner_id )
                        @php
                            $bool = false;
                        @endphp
                    @endif
                @endforeach
                @if( $bool == true )
                    <div class="card mt-2">
                        <img src="/{{ $b->banner_image }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $b->store_name }}</h5>
                            <a href="/admin/store/{{$category}}/assign/{{$slider_id}}/{{$b->banner_id}}" class="btn btn-primary">Agregar</a>
                        </div>
                    </div>
                @endif
            @endforeach
            
        </div>
    </div>
</div>
@endsection
