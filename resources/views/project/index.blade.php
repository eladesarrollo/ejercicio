@extends('layouts.app')

@section('content')

<h2>Proyectos</h2>
<br>

<a href="{{ url('projects/create') }}">
    <button class="btn btn-success"><span class="fa fa-plus-circle"></span> Nuevo Proyecto</button>
</a>

<table class="table table-condensed">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Inicio</th>
            <th>Final</th>
            <th>Activo</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($projects as $project)

        <tr>
            <td>{{ $project->id }}</td>
            <td>{{ $project->name }}</td>
            <td>{{ $project->description }}</td>
            <td>{{ $project->start_date }}</td>
            <td>{{ $project->end_date }}</td>
            <td>{{ ($project->active) ? 'Si' : 'No' }}</td>
            <td>
                <a href="{{ url('projects/'.$project->id.'/edit') }}"><button class="btn btn-primary"><span class="fa fa-pencil"></span></button></a>
                <button class="btn btn-danger" onclick="deleteProject({{$project->id}})"><span class="fa fa-trash"></span></button>
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

function deleteProject(id) {

    $('#deleteForm').attr('action', '/projects/' + id);
    $('#deleteModal').modal('show');

}

</script>

@endsection