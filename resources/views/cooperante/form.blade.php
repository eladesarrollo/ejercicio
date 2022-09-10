
    <h1>{{ $modo }} cooperante</h1>

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
    <input type="text" class="form-control" name="nombre" value="{{ isset($cooperante->nombre)?$cooperante->nombre:old('nombre') }}" id="nombre">
    <br>
    </div>

    <div class=form-group">
    <Label for "email"> email  </Label>
    <input type="text" class="form-control" name="email" value="{{ isset($cooperante->email)?$cooperante->email:old('email') }}" id="email">
    <br>
    </div>

    <div class=form-group">
    <Label for "direccion"> Direccion  </Label>
    <input type="text" class="form-control" name="direccion" value="{{ isset($cooperante->direccion)?$cooperante->direccion:old('direccion') }}" id="direccion">
    <br>
    </div>

    <input class="btn btn-success" type="submit" value="{{ $modo }} Datos">

    <a class="btn btn-primary" href="{{ url('cooperante/') }}"> Regresar</a>

    <br>