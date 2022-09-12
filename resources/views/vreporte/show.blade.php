
@extends('layouts.app')

@section('content')


<div class="container">

    @if(Session::has('mensaje'))
    <div class="alert alert-success alert-dismissible" role="alert">
    {{ Session::get('mensaje') }}
    </div>
    @endif


<h2>Reporte de asignaciones por cooperante</h2>


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

        </tr>
    </thead>

    <tbody>
        @php
            $sum=0.00;
        @endphp
        @foreach( $asignacions as $det)
        
        <tr>
            <td>{{ $det->id }}</td>
            <td>{{ $det->cooperante['nombre'] }}</td>
            <td>{{ $det->proyecto['nombre'] }}</td>
            <td>{{ $det->fecha }}</td>
            <td>{{ $det->monto }}</td>        
            </form>
            </td>         
        </tr>
        @php
            $sum+= $det->monto;
        @endphp
        @endforeach
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>{{ $sum }}</td> 
    </tbody>
</table>

@endsection
</div>