@extends('layouts.app')

@section('content')
<div class="container">
<h1 class="mt-3">{{ __("data.stores") }}</h1>
<table class="table table-hover bg-white">
    <thead>
      <tr>
        <th> {{ __("data.store_name") }} </th>
        <th>{{ __("data.store_image") }}</th>
        <th>{{ __("data.store_user") }}</th>
        <th>{{ __("data.store_state") }}</th>
      </tr>
    </thead>
    <tbody>
      @foreach( $stores as $store )
      <tr>
        <td>{{ $store->store_name }}</td>
        <td>
          <img src="/{{ $store->store_image }}" width="50" alt="">
        </td>
        <td>{{ $store->user_name }}</td>
        <td> 
          @if( $store->store_state == 0 )
            <a href="/admin/stores/state/{{ $pagination }}/{{ $store->store_id }}/1" class="btn btn-success"> {{ __("data.enable") }} </a>
          @endif
          @if( $store->store_state == 1 )
            <a href="/admin/stores/state/{{ $pagination }}/{{ $store->store_id }}/0" class="btn btn-danger"> {{ __("data.disable") }} </a>
          @endif
         </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>

@endsection
