@extends('layouts.app')

@section('content')
<div class="container">
<h1 class="mt-3">{{ __("data.stores") }}</h1>
<table class="table table-hover bg-white">
    <thead>
      <tr>
        <th>{{ __("data.photo") }}</th>
        <th> {{ __("data.name") }} </th>
        <th>{{ __("data.email") }}</th>
        <th>{{ __("data.ci") }}</th>
        <th>{{ __("data.last_work") }}</th>
        <th>{{ __("data.last_boss") }}</th>
        <th>{{ __("data.lc") }}</th>
        <th>{{ __("data.cm") }}</th>
        <th>{{ __("data.ap") }}</th>
        <th>{{ __("data.state") }}</th>
      </tr>
    </thead>
    <tbody>
      @foreach( $riders as $rider )
      <tr>
        <td>
            <img onclick="openModalImage('{{ $rider->avatar }}')" data-toggle="modal" data-target="#myModal" src="/{{ $rider->avatar }}" width="50" alt="">
        </td>
        <td>{{ $rider->name }}</td>
        <td>{{ $rider->email }}</td>
        <td>{{ $rider->dni }}</td>
        <td>{{ $rider->last_work }}</td>
        <td>{{ $rider->last_boss }}</td>
        <td>
        <img onclick="openModalImage('{{ $rider->lc }}')" data-toggle="modal" data-target="#myModal" src="/{{ $rider->lc }}" width="50" alt="">
        </td>
        <td>
        <img onclick="openModalImage('{{ $rider->cm }}')" data-toggle="modal" data-target="#myModal" src="/{{ $rider->cm }}" width="50" alt="">
        </td>
        <td>
        <img onclick="openModalImage('{{ $rider->ap }}')" data-toggle="modal" data-target="#myModal" src="/{{ $rider->ap }}" width="50" alt="">
        </td>
        <td>
        @if( $rider->state == 0 )
            <a href="/admin/riders/state/{{ $pagination }}/{{ $rider->id }}/1" class="btn btn-success"> {{ __("data.enable") }} </a>
          @endif
          @if( $rider->state == 1 )
            <a href="/admin/riders/state/{{ $pagination }}/{{ $rider->id }}/0" class="btn btn-danger"> {{ __("data.disable") }} </a>
          @endif
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
