@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
        <h1>Crear Tienda</h1>
            <form action="/store-admin/post/products" enctype="multipart/form-data" method="post" class="row">
                @csrf
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <input type="text" class="form-control" name="name" id="name">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" id="description" class="form-control" id="" cols="30" rows="10"></textarea>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">Precio A</label>
                        <input type="number" class="form-control" name="price_a" id="price_a">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">Precio B</label>
                        <input type="number" class="form-control" name="price_b" id="price_b">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">Categoria</label>
                        <select class="form-control" name="category_id" id="category_id">
                            @foreach( $categories as $c )
                                <option value="{{ $c->id }}"> {{ $c->name }} </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">Image</label>
                        <input type="file" class="form-control" name="image" id="image">
                    </div>
                </div>
                <button class="btn btn-primary" type="submit">Crear</button>
            </form>
        </div>
    </div>
</div>
@endsection
