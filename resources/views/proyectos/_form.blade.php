@csrf

<label for="">
                Nombre <br>
                <input type="text" name='nombre' class="form-control" value="{{ old('nombre', $proyecto->nombre) }}">
            </label>
            <br>
            <label for="">
                Descripcion <br>
                <input type="text" name='descripcion' class="form-control" value="{{ old('descripcion',$proyecto->descripcion) }}">
            </label>
            <br>            
            <br>
            <button type="submit" class="btn btn-primary"> {{ $btnText }} </button>