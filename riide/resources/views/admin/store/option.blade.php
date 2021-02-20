@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 class="mt-3">{{ $store->name }}</h1>
            <div class="list-group mt-3">
                <a href="" class="list-group-item list-group-item-action">Tienda</a>
                <a href="" class="list-group-item list-group-item-action">Horarios</a>
                <a href="" class="list-group-item list-group-item-action">Productos</a>
                <a href="" class="list-group-item list-group-item-action">Banners</a>
            </div>
        </div>
    </div>
</div>
@endsection
