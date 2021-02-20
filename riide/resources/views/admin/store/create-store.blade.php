@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Crear Tienda</h1>
            <form action="/admin/post/categories" enctype="multipart/form-data" method="post" class="row">
                @csrf
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="category">Categoria</label>
                        <input type="text" class="form-control" name="name" id="category">
                    </div>
                </div>
                <button class="btn btn-primary" type="submit">Crear</button>
            </form>
        </div>
    </div>
</div>
@endsection
