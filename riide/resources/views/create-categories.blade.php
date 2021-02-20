@extends('layouts.app')

@section('content')
<div class="container">

<h1>Crear categoria</h1>
    <form action="/admin/post/categories" enctype="multipart/form-data" method="post" class="row">
        @csrf
        <input type="hidden" name="id" value="{{ $id }}">
        <div class="col-md-6">
            <div class="form-group">
                <label for="category">Categoria</label>
                <input type="text" class="form-control" name="name" id="category">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="image">Imagen</label>
                <input type="file" class="form-control-file border" name="image" id="image">
            </div>
        </div>
        <button class="btn btn-primary" type="submit">Crear</button>
    </form>
</div>
@endsection
