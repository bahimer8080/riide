@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="list-group mt-3">
                <a href="/admin/store/list/sliders/category" class="list-group-item list-group-item-action">Categorias</a>
                <a href="/admin/store/list/sliders/subcategory" class="list-group-item list-group-item-action">Subcategorias</a>
                <a href="/admin/store/list/sliders/featured" class="list-group-item list-group-item-action">Lo mas hot</a>
                <a href="/admin/store/list/sliders/promotion" class="list-group-item list-group-item-action">Promociones</a>
            </div>
        </div>
    </div>
</div>
@endsection
