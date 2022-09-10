
    <h1>{{ $modo }} asignacion</h1>

    @if(count($errors)>0)

        <div class="alert alert-danger" role="alert">
            <ul>
                @foreach($errors->all() as $error)
                <li>  {{ $error }} </li>
                @endforeach
            </ul>
        </div>
       
    @endif

    <div class=form-group">
    <Label for "cooperantes"> Cooperante  </Label>
    <input type="text" class="form-control" name="cooperante_id" value="{{ isset($asignacion->cooperante_id)?$asignacion->cooperante_id:old('cooperante_id') }}" id="cooperante_id">
    <br>
    </div>

    <div class=form-group">
    <Label for "proyecto"> Proyecto  </Label>
    <input type="text" class="form-control" name="proyecto_id" value="{{ isset($asignacion->proyecto_id)?$asignacion->proyecto_id:old('proyecto_id') }}" id="proyecto_id">
    <br>
    </div>

    <div class=form-group">
    <Label for "fecha"> Fecha  </Label>
    <input type="date" class="form-control" name="fecha" value="{{ isset($asignacion->fecha)?$asignacion->fecha:old('fecha') }}" id="nombre">
    <br>
    </div>

    <div class=form-group">
    <Label for "monto"> Monto  </Label>
    <input type="decimal" class="form-control" name="monto" value="{{ isset($asignacion->monto)?$asignacion->monto:old('monto') }}" id="monto">
    <br>
    </div>

    <input class="btn btn-success" type="submit" value="{{ $modo }} Datos">

    <a class="btn btn-primary" href="{{ url('asignacion/') }}"> Regresar</a>

    <br>