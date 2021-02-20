@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
        <h1>Crear Tienda</h1>
            <form action="/store-admin/update/products/{{ $product[0]->id }}" enctype="multipart/form-data" method="post" class="row">
                @csrf
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <input value="{{ $product[0]->name }}" type="text" class="form-control" name="name" id="name">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" id="description" class="form-control" id="" cols="30" rows="10">{{ $product[0]->description }}</textarea>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">Precio A</label>
                        <input value="{{ $product[0]->price_a }}" type="number" class="form-control" name="price_a" id="price_a">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">Precio B</label>
                        <input value="{{ $product[0]->price_b }}" type="number" class="form-control" name="price_b" id="price_b">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">Categoria</label>
                        <select class="form-control" name="category_id" id="category_id">
                            @foreach( $categories as $c )

                                @if( $c->id == $product[0]->category_id )
                                <option value="{{ $c->id }}" selected>{{ $c->name }} </option>
                                @else
                                <option value="{{ $c->id }}"> {{ $c->name }} </option>
                                @endif
                                
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">Image</label>
                        <img src="/{{ $product[0]->image }}" alt="">
                        <input type="file" class="form-control" name="image" id="image">
                    </div>
                </div>
                <button class="btn btn-primary" type="submit">Actualizar</button>
            </form>
        </div>
    </div>
</div>
@endsection
