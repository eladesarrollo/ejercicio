
@extends('layouts.app')
@section('content')
<div class="container">

<form action="{{ url('/asignacion') }}" method="post">
    @csrf   
    @php
        $myid= 0;
    @endphp
   
    

@if(count($errors)>0)

    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach($errors->all() as $error)
            <li>  {{ $error }} </li>
            @endforeach
        </ul>
    </div>
   
@endif


<div class="form-group">
            <label for="">Cooperante</label>
            <select name="cooperante_id" id="inputCooperante_id" class="form-control">
                <option value="">-- Seleccione el cooperante</opcion>
                @foreach($cooperantes as $coo)
                <option value= "{{$coo['id'] }}">{{ $coo['nombre'] }} </option>                          
                @endforeach
            </select>
    </div>
    <br>
    <a href="{{ url('/vreporte/show') }}" class="btn btn-warning">
                Generar Reporte
            </a> 

<br>
</form>
</div>
@endsection


