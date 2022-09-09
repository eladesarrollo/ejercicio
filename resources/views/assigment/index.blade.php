@extends('layouts.app')

@section('content')

<h2>Asignaciones</h2>
<br>

<a href="{{ url('assigments/create') }}">
    <button class="btn btn-success"><span class="fa fa-plus-circle"></span> Nueva Asignación</button>
</a>

<table class="table table-condensed">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre Cooperante</th>
            <th>Nombre Proyecto</th>
            <th>Fecha Asignación</th>
            <th>Monto</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($assigments as $assigment)

        <tr>
            <td>{{ $assigment->id }}</td>
            <td>{{ $assigment->worker->name }}</td>
            <td>{{ $assigment->project->name }}</td>
            <td>{{ $assigment->assigment_date }}</td>
            <td>{{ number_format($assigment->amount, 2) }}</td>
            <td>
                <a href="{{ url('assigments/'.$assigment->id.'/edit') }}"><button class="btn btn-primary"><span class="fa fa-pencil"></span></button></a>
                <button class="btn btn-danger" onclick="deleteAssigment({{$assigment->id}})"><span class="fa fa-trash"></span></button>
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

function deleteAssigment(id) {

    $('#deleteForm').attr('action', '/assigments/' + id);
    $('#deleteModal').modal('show');

}

</script>

@endsection