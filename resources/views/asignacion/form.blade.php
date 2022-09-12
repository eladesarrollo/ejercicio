
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

    
    <div class="form-group">
            <label for="">Cooperante</label>
            <select name="cooperante_id" id="inputCooperante_id" class="form-control">
                <option value="">-- Seleccione el cooperante</opcion>
                @foreach($cooperantes as $coo)
                <option value= "{{$coo['id'] }}">{{ $coo['nombre'] }} </option>                          
                @endforeach
            </select>
    </div>
   
    <div class="form-group">
            <label for="proyecto">Proyecto</label>
            <select name="proyecto_id" id="inputCProyecto_id" class="form-control">
                <option value="">-- Seleccione el proyecto</opcion>
                @foreach($proyectos as $pro)
                <option value= "{{$pro['id'] }}">{{ $pro['nombre'] }} </option>                          
                @endforeach
            </select>
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