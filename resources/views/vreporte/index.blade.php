
@extends('layouts.app')

@section('content')
<div class="container">
    
    @if(Session::has('mensaje'))
    <div class="alert alert-success alert-dismissible" role="alert">
    {{ Session::get('mensaje') }}
    </div>
    @endif


<br>
 <h4>Favor presione clic en [Reporte] del cooperante deseado </h4> 
<br>
<table class="table table-light">

    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>email</th>
            <th>Dirección</th>
            <th>Acción</th>
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

            <a href="{{ route('vreporte.show',['cooperante'=> $cooperante->id ]) }}" class="btn btn-warning">
                Reporte
            </a>                
                
            </form>
            </td>         
        </tr>
        @endforeach
    </tbody>
</table>
{!! $cooperantes->links() !!}
</div>
@endsection
