
    <h1>{{ $modo }} proyecto</h1>

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
    <Label for "nombre"> Nombre  </Label>
    <input type="text" class="form-control" name="nombre" value="{{ isset($proyecto->nombre)?$proyecto->nombre:old('nombre') }}" id="nombre">
    <br>
    </div>

    <div class=form-group">
    <Label for "descripcion"> Descripción  </Label>
    <input type="text" class="form-control" name="descripcion" value="{{ isset($proyecto->descripcion)?$proyecto->descripcion:old('descripcion') }}" id="descripcion">
    <br>
    </div>

    <input class="btn btn-success" type="submit" value="{{ $modo }} Datos">

    <a class="btn btn-primary" href="{{ url('proyecto/') }}"> Regresar</a>

    <br>