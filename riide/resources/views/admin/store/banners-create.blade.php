@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Crear Banner</h1>
            <form action="/store-admin/post/banners" enctype="multipart/form-data" method="post" class="row">
                @csrf
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="url">Link</label>
                        <input type="text" class="form-control" name="url" id="url">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="banner">Banner</label>
                        <input type="file" class="form-control" name="banner" id="banner">
                    </div>
                </div>
                <button class="btn btn-primary" type="submit">Crear</button>
            </form>
        </div>
    </div>
</div>
@endsection
