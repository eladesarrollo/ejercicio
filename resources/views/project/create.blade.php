@extends('layouts.app')

@section('content')

<div class="h2">Proyectos</div> 

<span class="fw-light">Crear proyecto</span>
<br><br>

<form action="{{ url('/projects') }}" method="POST" role="form">

    @csrf

    <div class="row">
        <div class="col-md-6 col-sm-12">

            <div class="form-group">
                <label for="name">Nombre</label>
                <input type="text" class="form-control" name="name" placeholder="Nombre de Proyecto" autocomplete="off" required>
            </div>
            <div class="form-group">
                <label for="description">Descripción</label>
                <input type="text" class="form-control" name="description" placeholder="Descripcion de Proyecto" autocomplete="off">
            </div>
            <div class="form-group">
                <label for="start_date">Fecha de Inicio</label>
                <input type="date" class="form-control" name="start_date" required>
            </div>
            <div class="form-group">
                <label for="end_date">Fecha de Finalización</label>
                <input type="date" class="form-control" name="end_date" required>
            </div>
            <div class="form-group">
                <br>
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="active" value="1">
                        Activo
                    </label>
                </div>
            </div>
        </div>
    </div>
    <br>

    <div class="row">
        <div class="col-sm-3">
            <button type="submit" class="btn btn-primary btn-block">Guardar</button>
        </div>
    </div>
    
</form>
<br>

<div class="col-sm-3">
    <a href="{{ url('projects') }}"><button class="btn btn-outline-primary btn-group">Regresar</button></a>
</div>

@endsection