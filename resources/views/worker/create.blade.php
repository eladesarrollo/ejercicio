@extends('layouts.app')

@section('content')

<div class="h2">Cooperantes</div> 

<span class="fw-light">Crear Cooperante</span>
<br><br>

<form action="{{ url('/workers') }}" method="POST" role="form">

    @csrf

    <div class="row">
        <div class="col-md-6 col-sm-12">

            <div class="form-group">
                <label for="name">Nombre</label>
                <input type="text" class="form-control" name="name" placeholder="Nombre de Cooperante" autocomplete="off" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" placeholder="Correo electronico" autocomplete="off" required>
            </div>
            <div class="form-group">
                <label for="address">Dirección</label>
                <input type="text" class="form-control" name="address" autocomplete="off">
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
    <a href="{{ url('workers') }}"><button class="btn btn-outline-primary btn-group">Regresar</button></a>
</div>

@endsection