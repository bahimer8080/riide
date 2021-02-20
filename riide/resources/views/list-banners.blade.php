@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 mt-3">
            @if( $category == "featured" )
            <a href="/admin/store/create/slider/{{$category}}" class="btn btn-primary">Crear Slider</a>
            @endif
        </div>
        <div class="col-md-12">
            <div class="list-group mt-3">
                @foreach( $sliders as $slider )
                <a href="/admin/store/{{ $slider->id }}/{{$category}}" class="list-group-item list-group-item-action">{{ $slider->name }} </a>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
