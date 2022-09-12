
@extends('layouts.app')

@section('content')
<div class="container">

    @if(Session::has('mensaje'))
    <div class="alert alert-success alert-dismissible" role="alert">
    {{ Session::get('mensaje') }}
    </div>
    @endif


<a href="{{ url('asignacion/create') }}" class="btn btn-success" > Registrar nueva Asignación</a>

<br>
<br>
<table class="table table-light">

    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Cooperante</th>
            <th>Proyecto</th>
            <th>Fecha</th>
            <th>Monto</th>
            <th>Acciones</th>
        </tr>
    </thead>

    <tbody>
        @foreach( $asignacions as $asignacion)
        <tr>
            <td>{{ $asignacion->id }}</td>
            <td>{{ $asignacion->cooperante['nombre'] }}</td>
            <td>{{ $asignacion->proyecto['nombre'] }}</td>
            <td>{{ $asignacion->fecha }}</td>
            <td>{{ $asignacion->monto }}</td>
            <td>

            <a href="{{ url('/asignacion/'.$asignacion->id.'/edit') }}" class="btn btn-warning">
                Editar
            </a>    
                | 
                
            <!---Borrar -->
            <form  action="{{ url('/asignacion/'.$asignacion->id ) }}" class="d-inline" method="post">
                @csrf
                {{ method_field('DELETE') }}
               <input class="btn btn-danger" type="submit" onclick="return confirm('¿Quieres borrar?')" 
                value="Borrar"> 
                
            </form>
            </td>         
        </tr>
        @endforeach
    </tbody>
</table>
{!! $asignacions->links() !!}
@endsection
</div>