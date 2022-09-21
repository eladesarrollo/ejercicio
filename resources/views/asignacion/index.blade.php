@extends('layout')
@section('content')
    <div class="pull-right">
        <a class="btn btn-success" href="{{ route('asignacion.create') }}">Nuevo</a>
        <a class="btn btn-success" href="{{ route('asignacion.report') }}" target="_blank">Reporte</a>
    </div>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Proyecto</th>
            <th scope="col">Cooperante</th>
            <th scope="col">Fecha</th>
            <th scope="col">Monto</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        @foreach($data as $elemento)
        <tr>
            <th scope="row">{{$elemento->id}}</th>
            <td>{{$elemento->proyecto->nombre}}</td>
            <td>{{$elemento->cooperante->nombre}}</td>
            <td>{{$elemento->fecha}}</td>
            <td>{{$elemento->monto}}</td>
            @include('general.actions', ['id' => $elemento->id, 'edit_route' => 'asignacion.edit', 'destroy_route' => 'asignacion.destroy'])
        </tr>
        @endforeach
        </tbody>
    </table>
@endsection
