@extends('layouts.plantilla')

@section('title', 'Cooperante | '.$cooperante->nombre)

@section('content')

    <h1>Consultar Cooperante</h1> 

    <div class="form-group">
        <div class="row">
        <div class="col-12 col-sm-6">
            <label>Nombre</label>
            <label class="form-control">{{ $cooperante->nombre }}</label>  
        </div>          
        </div>
    </div>

    <div class="form-group">
        <div class="row">
        <div class="col-12 col-sm-6">
            <label>Email</label>
            <label class="form-control">{{ $cooperante->email }}</label> 
        </div>          
        </div>
    </div>

    <div class="form-group">
        <div class="row">
        <div class="col-12 col-sm-6">
            <label>Direccion</label>
            <label class="form-control">{{ $cooperante->direccion }}</label> 
        </div>          
        </div>
    </div>

    <div class="form-group">
        <div class="row">
        <div class="col-12 col-sm-6">
            <label>Fecha creación</label>
            <label class="form-control">{{ $cooperante->created_at->format('d/m/Y') }}</label>             
        </div>          
        </div>
    </div>
    <br>
    <a href="{{ route('cooperantes.edit',$cooperante) }}" class="btn btn-primary">Editar</a> 
    <br><br>
    <form action="{{ route('cooperantes.destroy',$cooperante) }}" method="POST">
        @csrf @method('DELETE')

        <button class="btn btn-danger">Eliminar</button>

    </form>
    
@endsection