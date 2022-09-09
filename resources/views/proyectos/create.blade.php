@extends('layouts.plantilla')

@section('title','Crear Proyecto')

@section('content')

        <h1>Crear nuevo Proyecto</h1>

        @include('partials.validation-errors')

        <form action="{{ route('proyectos.store') }}" method="POST">

            @include('proyectos._form', ['btnText' => 'Guardar'])
           
        </form>
        
@endsection