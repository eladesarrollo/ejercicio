@extends('layouts.app')

@section('content')

<h2>Cooperantes</h2>
<br>

<a href="{{ url('workers/create') }}">
    <button class="btn btn-success"><span class="fa fa-plus-circle"></span> Nuevo Cooperante</button>
</a>

<table class="table table-condensed">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Email</th>
            <th>Direccion</th>
            <th>Activo</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($workers as $worker)

        <tr>
            <td>{{ $worker->id }}</td>
            <td>{{ $worker->name }}</td>
            <td>{{ $worker->email }}</td>
            <td>{{ $worker->address }}</td>
            <td>{{ ($worker->active) ? 'Si' : 'No' }}</td>
            <td>
                <a href="{{ url('workers/'.$worker->id.'/edit') }}"><button class="btn btn-primary"><span class="fa fa-pencil"></span></button></a>
                <button class="btn btn-danger" onclick="deleteWorker({{$worker->id}})"><span class="fa fa-trash"></span></button>
            </td>
        </tr>
            
        @endforeach
    </tbody>
</table>

<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <form id="deleteForm" action="" method="POST">
            @csrf
            @method('DELETE')
            <div class="modal-body">¿Desea eliminar el registro seleccionado?</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-danger">Eliminar</button>
            </div>
        </form>
    </div>
  </div>
</div>

<script>

function deleteWorker(id) {

    $('#deleteForm').attr('action', '/workers/' + id);
    $('#deleteModal').modal('show');

}

</script>

@endsection