@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Crear Banner</h1>
            <form action="/store-admin/update/banners/{{ $banner_id }}" enctype="multipart/form-data" method="post" class="row">
                @csrf
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="url">Link</label>
                        <input value="{{ $banner[0]->url }}" type="text" class="form-control" name="url" id="url">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="banner">Banner</label>
                        <img src="/{{ $banner[0]->image }}" width="100%" alt="">
                        <input type="file" class="form-control" name="banner" id="banner">
                    </div>
                </div>
                <button class="btn btn-primary" type="submit">Actualizar</button>
            </form>
        </div>
    </div>
</div>
@endsection
