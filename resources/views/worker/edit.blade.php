@extends('layouts.app')

@section('content')

<div class="h2">Cooperantes</div> 

<span class="fw-light">Editar Cooperante</span>
<br><br>

<form action="{{ url('/workers'.'/'.$worker->id) }}" method="POST" role="form">

    @csrf
    @method('PUT')

    <div class="row">
        <div class="col-md-6 col-sm-12">

            <div class="form-group">
                <label for="name">Nombre</label>
                <input type="text" class="form-control" name="name" placeholder="Nombre de Cooperante" value="{{ $worker->name }}" autocomplete="off" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" placeholder="Correo electronico" value="{{ $worker->email }}" autocomplete="off" required>
            </div>
            <div class="form-group">
                <label for="address">Direccion</label>
                <input type="text" class="form-control" name="address" value="{{ $worker->address }}" autocomplete="off">
            </div>
            <div class="form-group">
                <br>
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="active" value="1" {{ $worker->active ? 'checked' : '' }}>
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