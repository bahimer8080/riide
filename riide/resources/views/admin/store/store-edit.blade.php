@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <form action="/store-admin/store/post" enctype="multipart/form-data" method="post" class="row">
                @csrf
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" value="{{ $store[0]->name }}" class="form-control" name="name" id="name">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="image">Image</label>
                        <img src="/{{ $store[0]->image }}" width="100%" alt="">
                        <input type="file" class="form-control" name="image" id="image">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="bg_image">Background Image</label>
                        <img src="/{{ $store[0]->bg_image }}" width="100%" alt="">
                        <input type="file" class="form-control" name="bg_image" id="bg_image">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="name">Tiempo de entrega ( En minutos)</label>
                        <input type="number" value="{{ $store[0]->time_delivery }}" class="form-control" name="time_delivery" id="time_delivery">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="">Categorias</label>
                        <select class="form-control" name="categories[]" id="categories" multiple>
                            @foreach( $categories as $c )
                                <option value="{{ $c->id }}">{{ $c->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <button class="btn btn-primary" type="submit">Actualizar</button>
            </form>
        </div>
    </div>
</div>
@endsection
