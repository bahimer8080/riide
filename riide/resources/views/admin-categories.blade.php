@extends('layouts.app')

@section('content')
<div class="container">
<h1 class="mt-3">{{ __("data.categories") }}</h1>
<table class="table table-hover bg-white">
    <thead>
      <tr>
        <th>{{ __("data.name") }}</th>
        <th> {{ __("data.photo") }} </th>
        <th>Edit</th>
        <th>Delete</th>
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
            <button class="btn btn-success">Edit</button>
        </td>
        <td>
        <button class="btn btn-danger">Delete</button>
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
