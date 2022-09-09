@extends('layouts.app')

@section('content')

<h2>Reporte Asignaciones</h2>
<br>

<p>Seleccione un Cooperante para ver sus asignaciones</p>

<div class="row">

    <div class="col-4"> 
        <div class="form-group">
            <label for="worker_id">Cooperante</label>
            <select id="worker_id" class="form-select" required>
                @foreach ($workers as $worker)
                <option value="{{ $worker->id }}">{{ $worker->name }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="col-4">
        <br>
        <button class="btn btn-success" onclick="searchAssigments()"><span class="fa fa-search"></span> Buscar</button>
    </div>

</div>

<br>

<div id="report"></div>

<script>

function searchAssigments() {
    $('#report').html('<span class="fa fa-5x fa-spinner fa-spin"></span>');
    var worker = $('#worker_id').val();
    $.ajax({
        url: '/reports/' + worker,
        type: 'GET',
        dataType: 'html',
        success: function(data) {
            $('#report').html(data);
        },
        error: function(xhr, status) {
            console.log(xhr);
            console.log(status);
            $('#report').html('Error. ' + status);
        }
    });
}

</script>

@endsection