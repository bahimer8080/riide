@extends('layouts.app')

@section('content')
<div class="container">
<h1 class="mt-3"> Banners </h1>
<a href="/store-admin/create/banners" class="btn btn-primary">Crear banner</a>
<table class="table table-hover bg-white">
    <thead>
      <tr>
        <th>url</th>
        <th> img </th>
      </tr>
    </thead>
    <tbody>
      @foreach( $banners as $b )
      <tr>
        <td><a href="">{{ $b->url }}</a></td>
        <td>
            <img onclick="openModalImage('{{ $b->image }}')" data-toggle="modal" data-target="#myModal" src="/{{ $b->image }}" width="50" alt="">
        </td>
        <td>
            <a href="/store-admin/edit/banners/{{ $b->id }}" class="btn btn-success">Edit</a>
        </td>
        <td>
          <a href="/store-admin/delete/banners/{{ $b->id }}" class="btn btn-danger">Delete</a>
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
