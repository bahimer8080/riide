@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <form class="col-md-12" action="/store-admin/store/time/update" enctype="multipart/form-data" method="post">
        @csrf
            <table class="table">
                <thead>
                    <tr>
                        <th>Dia</th>
                        <th>Apertura</th>
                        <th>Cierre</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($time as $t)
                    <tr>
                        <td>{{$t->day}}</td>
                        <td>
                            <input type="time" value="{{ $t->start }}" name="day-{{$t->day}}-start" id="day-{{$t->day}}-start">
                        </td>
                        <td>
                            <input type="time" value="{{ $t->end }}" name="day-{{$t->day}}-end" id="day-{{$t->day}}-end">
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
    </div>
</div>
@endsection
