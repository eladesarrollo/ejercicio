@extends('layout')
@if(session('status'))
    <div class="alert alert-success mb-1 mt-1">
        {{ session('status') }}
    </div>
@endif
<form class="row g-3" action="{{ route('proyecto.update', $elemento->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <div class="form-group">
            <strong>Proyecto:</strong>
            <input type="text" name="nombre" class="form-control" placeholder="Nombre Cooperante" value="{{$elemento->nombre}}">
            @error('nombre')
            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="mb-3">
        <div class="form-group">
            <strong>Descripcion:</strong>
            <textarea name="descripcion" class="form-control" placeholder="Descripcion">{{$elemento->descripcion}}</textarea>
            @error('descripcion')
            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <button type="submit" class="btn btn-primary ml-3">Actualizar</button>
    </div>
</form>
