@extends('layouts.app')

@section('content')
<div class="container">
<h1 class="mt-3"> Productos </h1>
<a href="/store-admin/create/products" class="btn btn-primary">Crear producto</a>
<table class="table table-hover bg-white">
    <thead>
      <tr>
        <th>{{ __("data.name") }}</th>
        <th> description </th>
        <th> precio a </th>
        <th> precio b </th>
        <th> image </th>
        <th> categoria </th>
        <th>Destacado</th>
      </tr>
    </thead>
    <tbody>
      @foreach( $products as $p )
      <tr>
        <td><a href="">{{ $p->name }}</a></td>
        <td>{{ $p->description }}</td>
        <td>{{ $p->price_a }}</td>
        <td>{{ $p->price_b }}</td>
        <td>
            <img onclick="openModalImage('{{ $p->image }}')" data-toggle="modal" data-target="#myModal" src="/{{ $p->image }}" width="50" alt="">
        </td>
        <td>{{ $p->category_name }}</td>
        <td>
          @if( $p->featured == 0 )
            <a href="/store-admin/featured/products/{{ $p->id }}" class="btn btn-success">Destacar</a>
          @else
            <a href="/store-admin/nofeatured/products/{{ $p->id }}" class="btn btn-danger">Quitar de destacados</a>
          @endif
        </td>
        <td>
            <a href="/store-admin/edit/products/{{ $p->id }}" class="btn btn-success">Edit</a>
        </td>
        <td>
        <a href="/store-admin/delete/products/{{ $p->id }}" class="btn btn-danger">Delete</a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
<!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

    <img src="" width="100%" id="image-modal" alt="">

    </div>
  </div>
</div>

<script>
function openModalImage(img){
    $("#image-modal").attr("src","/" + img);
}
</script>
@endsection
