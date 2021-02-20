@extends('layouts.app')

@section('content')
<div class="container">
<h1 class="mt-3">{{ __("data.categories") }} 
@if( count( $c ) > 0 )
/ {{ $c[0]->name }}
@else

@endif

</h1>
<a class="btn btn-primary mb-3" href="/admin/create/categories/{{ $category }}">Crear categoria</a>
<table class="table table-hover bg-white">
    <thead>
      <tr>
        <th>{{ __("data.category") }} </th>
        <th> {{ __("data.photo") }} </th>
        <th>Agreagr Subcategoria</th>
        <th>Edit</th>
        <th> Delete</th>
      </tr>
    </thead>
    <tbody>
      @foreach( $categories as $cat )
      <tr>
        <td><a href="/admin/categories/{{$cat->id}}/1">{{ $cat->name }}</a></td>
        <td>
        <img onclick="openModalImage('{{ $cat->image }}')" data-toggle="modal" data-target="#myModal" src="/{{ $cat->image }}" width="50" alt="">
        </td>
        <td>
            <a href="/admin/create/categories/{{ $cat->id }}" class="btn btn-primary">Agregar categoria</a>
        </td>
        <td>
            <a href="/admin/update/categories/{{ $cat->id }}" class="btn btn-success">Edit</a >
        </td>
        <td>
        <a href="/admin/categories/delete/{{$category}}/{{$pagination}}/{{ $cat->id }}" class="btn btn-danger">  Delete</a>
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
