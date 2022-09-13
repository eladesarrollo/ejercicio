
@extends('layouts.app')
@section('content')
<div class="container">

<form action="{{ url('/vreporte/show') }}" method="post">
    @csrf   
    @php
        $myid= 2;
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
<script>
function validar() {
            
            var cooper=document.getElementById('coope');
            if(cooper.value==0||cooper.value=="")
            { 
                alert('Selecciona un cooperante');
                cooper.focus();
                return 0;
            }
                else 
                //confirm(cooper.value);
                return $myid = cooper.value;
        }
</script> 

<div class="form-group">
            <label for="">Cooperante</label>
            <select name="coope" id="coope" class="form-control">
                <option value="">-- Seleccione el cooperante</opcion>
                @foreach($cooperantes as $coo)
                <option value= "{{$coo['id'] }}">{{ $coo['nombre'] }} </option>                          
                @endforeach
            </select>
    </div>
    <br>

    <form action="{{ url('/vreporte/show'.$myid) }}" method="post">
    <input  class="btn btn-danger" type="submit" onClick="validar();" value="GENERAR">
    @csrf
    {{ method_field('GET') }}

    <!--- <a href="{{ url('/vreporte/show'.$myid) }}" class="btn btn-warning">
                Generar Reporte
            </a>  --->

    <!--- <form  action="{{ url('/vreporte/show'.$myid ) }}" class="d-inline" method="post">
        @csrf
        {{ method_field('GET') }}
        <input class="btn btn-danger" type="submit" 
        value="GENERAR">--->

<br>
</form>
</div>
@endsection


