@extends('layouts.plantilla')

@section('title', 'Proyecto | '.$proyecto->nombre)

@section('content')

    <h1>Consultar Proyecto</h1> 
    
    <div class="form-group">
        <div class="row">
        <div class="col-12 col-sm-6">
            <label>Nombre</label>
            <label class="form-control">{{ $proyecto->nombre }}</label> 
        </div>          
        </div>
    </div>

    <div class="form-group">
        <div class="row">
          <div class="col-12 col-sm-6">
            <label>Descripcion</label>
            <label class="form-control">{{ $proyecto->descripcion }}</label>  
          </div>          
        </div>
      </div>

      <div class="form-group">
        <div class="row">
          <div class="col-12 col-sm-6">
            <label>Fecha creación:</label>
            <label class="form-control">{{ $proyecto->created_at->format('d/m/Y') }}</label>
          </div>          
        </div>
      </div>
    <br>
    <a href="{{ route('proyectos.edit',$proyecto) }}" class="btn btn-primary">Editar</a> 
    <br><br>
    <form action="{{ route('proyectos.destroy',$proyecto) }}" method="POST">
        @csrf @method('DELETE')

        <button class="btn btn-danger">Eliminar</button>

    </form>
   
@endsection