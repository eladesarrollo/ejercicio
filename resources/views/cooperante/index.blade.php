
@extends('layouts.app')

@section('content')
<div class="container">
    
    @if(Session::has('mensaje'))
    <div class="alert alert-success alert-dismissible" role="alert">
    {{ Session::get('mensaje') }}
    </div>
    @endif


<a href="{{ url('cooperante/create') }}" class="btn btn-success" > Registrar nuevo cooperante</a>


<br>
<br>
<table class="table table-light">

    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>email</th>
            <th>Direccion</th>
            <th>Acciones</th>
        </tr>
    </thead>

    <tbody>
        @foreach( $cooperantes as $cooperante)
        <tr>
            <td>{{ $cooperante->id }}</td>
            <td>{{ $cooperante->nombre }}</td>
            <td>{{ $cooperante->email }}</td>
            <td>{{ $cooperante->direccion }}</td>
            <td>

            <a href="{{ url('/cooperante/'.$cooperante->id.'/edit') }}" class="btn btn-warning">
                Editar
            </a>    
                | 
                
            <!---Borrar -->
            <form  action="{{ url('/cooperante/'.$cooperante->id ) }}" class="d-inline" method="post">
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
{!! $cooperantes->links() !!}
</div>
@endsection
