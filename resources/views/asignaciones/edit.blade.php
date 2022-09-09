@extends('layouts.plantilla')

@section('title','Editar Asignacion')

@section('content')

        <h1>Editar Asignación</h1>

        @include('partials.validation-errors')

        <form action="{{ route('asignaciones.update',$asignacion) }}" method="POST">
            @method('PATCH')
            @csrf

            <label for="">
                Cooperante <br>
                <select class="form-control" id="cooperante_id" name="cooperante_id" required>
                    <option value="">--- Seleccionar el Cooperante ---</option>                    
                    @isset($cooperantes)
                       @foreach($cooperantes as $item){ ?>
                        <option value="{{ $item->id }}" {{ $item->id == $asignacion->cooperante_id ? 'selected' : ''}} >
                            {{ $item->nombre }}
                        </option>
                      @endforeach
                    @endisset
                  </select>
            </label>
            <br>
            <label for="">
                Proyecto <br>
                <select class="form-control" id="proyecto_id" name="proyecto_id" required>
                    <option value="">--- Seleccionar el Proyecto ---</option>
                    @isset($proyectos)
                       @foreach($proyectos as $item){ ?>
                        <option value="{{ $item->id }}" {{ $item->id == $asignacion->proyecto_id ? 'selected' : ''}} >
                            {{ $item->nombre }}
                        </option>
                      @endforeach
                    @endisset
                  </select>
            </label>
            <br>
            <label for="">
                Fecha Asignacion <br>
                <input type="date" name='fechaAsignacion' class="form-control" value="{{ old('fechaAsignacion',$asignacion->fechaAsignacion->format('Y-m-d')) }}">                
            </label>
            <br>    
            <label for="">
                Monto <br>
                <input type="number" name='monto' min="0" step="0.01" class="form-control" value="{{ old('monto',$asignacion->monto) }}">
            </label>
            <br>            
            <br>
            <button type="submit" class="btn btn-primary"> Guardar </button>
           
        </form>
        
@endsection