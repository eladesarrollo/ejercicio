@extends('layout')
@if(session('status'))
    <div class="alert alert-success mb-1 mt-1">
        {{ session('status') }}
    </div>
@endif
<div class="row">
    <div class="col-2"></div>
    <div class="col-8">
        <form class="row g-3" action="{{ route('asignacion.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <div class="form-group">
                    <strong>Proyecto:</strong>
                    <select class="form-select" aria-label="Default select example" name="proyecto_id">
                        <option selected>--seleccione uno--</option>
                        @foreach($proyectos as $proyecto)
                            <option value="{{$proyecto->id}}">{{$proyecto->nombre}}</option>
                        @endforeach
                    </select>
                    @error('proyecto_id')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="mb-3">
                <div class="form-group">
                    <strong>Cooperante:</strong>
                    <select class="form-select" aria-label="Default select example" name="cooperante_id">
                        <option selected>--seleccione uno--</option>
                        @foreach($cooperantes as $cooperante)
                            <option value="{{$cooperante->id}}">{{$cooperante->nombre}}</option>
                        @endforeach
                    </select>
                    @error('cooperante_id')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="mb-3">
                <div class="form-group">
                    <strong>Fecha:</strong>
                    <input type="date" name="fecha" class="form-control" placeholder="fecha">
                    @error('fecha')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="mb-3">
                <div class="form-group">
                    <strong>Monto:</strong>
                    <input type="number" name="monto" class="form-control" placeholder="Monto">
                    @error('monto')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <button type="submit" class="btn btn-primary ml-3">Guardar</button>
        </form>
    </div>
    <div class="col-2"></div>
</div>
