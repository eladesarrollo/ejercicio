@extends('layout')
@section('content')
    <div class="pull-right">
        <a class="btn btn-success" href="{{ route('proyecto.create') }}">Nuevo</a>
        <a class="btn btn-success" target="_blank" href="{{ route('proyecto.report') }}">Reporte</a>
    </div>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nombre</th>
            <th scope="col">Descripcion</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        @foreach($data as $elemento)
        <tr>
            <th scope="row">{{$elemento->id}}</th>
            <td>{{$elemento->nombre}}</td>
            <td>{{$elemento->descripcion}}</td>
            @include('general.actions', ['id' => $elemento->id, 'edit_route' => 'proyecto.edit', 'destroy_route' => 'proyecto.destroy'])
        </tr>
        @endforeach
        </tbody>
    </table>
@endsection
