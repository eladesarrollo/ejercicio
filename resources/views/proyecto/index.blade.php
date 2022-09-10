Mostrar lista de proyectos

    @if(Session::has('mensaje'))
    <div class="alert alert-success alert-dismissible" role="alert">
    {{ Session::get('mensaje') }}
    </div>
    @endif


<a href="{{ url('proyecto/create') }}" class="btn btn-success" > Registrar nuevo proyecto</a>


<br>
<br>
<table class="table table-light">

    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Acciones</th>
        </tr>
    </thead>

    <tbody>
        @foreach( $proyectos as $proyecto)
        <tr>
            <td>{{ $proyecto->id }}</td>
            <td>{{ $proyecto->nombre }}</td>
            <td>{{ $proyecto->descripcion }}</td>
            <td>

            <a href="{{ url('/proyecto/'.$proyecto->id.'/edit') }}" class="btn btn-warning">
                Editar
            </a>    
                | 
                
            <!---Borrar -->
            <form  action="{{ url('/proyecto/'.$proyecto->id ) }}" class="d-inline" method="post">
                @csrf
                {{ method_field('DELETE') }}
               <input class="btn btn-danger" type="submit" onclick="return confirm('¿Quieres borrar?')" 
                value="Borrar"> 
                
            </form>
            </td>         
        </tr>
        @endforeach
    </tbody>
</table>
{!! $proyectos->links() !!}