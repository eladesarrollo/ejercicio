<td>
    <form action="{{ route($destroy_route,$id) }}" method="Post">
        <a class="btn btn-sm btn-primary" href="{{ route($edit_route,$id) }}">Editar</a>
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
    </form>
</td>
