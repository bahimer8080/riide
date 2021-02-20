@extends('layouts.app')

@section('content')
<div class="container">
<h1>Crear categoria</h1>
    <form action="/admin/put/categories" enctype="multipart/form-data" method="post" class="row">
        @csrf
        <input type="hidden" name="id" value="{{ $id }}">
        <div class="col-md-6">
            <div class="form-group">
                <label for="category">Categoria</label>
                <input type="text" value="{{ $category->name }}" class="form-control" name="name" id="category">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="image">Imagen</label>
                <img src="/{{ $category->image }}" width="100%" alt="">
                <input type="file" class="form-control-file border" name="image" id="image">
            </div>
        </div>
        <button class="btn btn-primary" type="submit">Crear</button>
    </form>
</div>
@endsection
