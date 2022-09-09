@csrf

<label for="">
                Nombre <br>
                <input type="text" name='nombre' class="form-control" value="{{ old('nombre', $cooperante->nombre) }}">
            </label>
            <br>
            <label for="">
                Email <br>
                <input type="email" name='email' class="form-control" value="{{ old('email',$cooperante->email) }}">
            </label>
            <br>
            <label for="">
                Direccion <br>
                <input type="text" name='direccion' class="form-control" value="{{ old('direccion',$cooperante->direccion) }}">
            </label>            
            <br>
            <br>
            <button type="submit" class="btn btn-primary"> {{ $btnText }} </button>