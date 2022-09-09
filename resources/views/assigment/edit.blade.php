@extends('layouts.app')

@section('content')

<div class="h2">Asignaciones</div> 

<span class="fw-light">Editar Asignación</span>
<br><br>

@if($errors->any())
    @foreach ($errors->all() as $error)
        <p class="text-danger">{{ $error }}</p>
    @endforeach
@endif

<form action="{{ url('/assigments'.'/'.$assigment->id) }}" method="POST" role="form">

    @csrf
    @method('PUT')

    <div class="row">
        <div class="col-md-6 col-sm-12">

            <div class="form-group">
                <label for="worker_id">Cooperante</label>
                <select name="worker_id" class="form-select" required>
                    @foreach ($workers as $worker)
                    <option value="{{ $worker->id }}" {{ ($worker->id == (old('worker_id') ?? $assigment->worker_id)) ? 'selected' : '' }}>
                        {{ $worker->name }}
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="project_id">Proyecto</label>
                <select name="project_id" class="form-select" required>
                    @foreach ($projects as $project)
                    <option value="{{ $project->id }}" {{ ($project->id == (old('project_id') ?? $assigment->project_id)) ? 'selected': '' }}>
                        {{ $project->name }}
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="assigment_date">Fecha de Asignación</label>
                <input type="date" class="form-control" name="assigment_date" value="{{ old('assigment_date') ?? $assigment->assigment_date }}" required>
            </div>
            <div class="form-group">
                <label for="amount">Monto</label>
                <input type="number" class="form-control" name="amount" min="0" step="0.01" value="{{ old('amount') ?? $assigment->amount }}" required>
            </div>

        </div>
    </div>
    <br>

    <div class="row">
        <div class="col-sm-3">
            <button type="submit" class="btn btn-primary btn-block">Guardar</button>
        </div>
    </div>
    
</form>
<br>

<div class="col-sm-3">
    <a href="{{ url('assigments') }}"><button class="btn btn-outline-primary btn-group">Regresar</button></a>
</div>

@endsection