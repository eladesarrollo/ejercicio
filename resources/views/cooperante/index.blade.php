@extends('layout')
@section('content')
    <div class="pull-right">
        <a class="btn btn-success" href="{{ route('cooperante.create') }}">Nuevo</a>
        <a class="btn btn-success" href="{{ route('cooperante.report') }}" target="_blank">Reporte</a>
    </div>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nombre</th>
            <th scope="col">Email</th>
            <th scope="col">Direccion</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        @foreach($data as $elemento)
        <tr>
            <th scope="row">{{$elemento->id}}</th>
            <td>{{$elemento->nombre}}</td>
            <td>{{$elemento->email}}</td>
            <td>{{$elemento->direccion}}</td>
            @include('general.actions', ['id' => $elemento->id, 'edit_route' => 'cooperante.edit', 'destroy_route' => 'cooperante.destroy'])
        </tr>
        @endforeach
        </tbody>
    </table>
@endsection
