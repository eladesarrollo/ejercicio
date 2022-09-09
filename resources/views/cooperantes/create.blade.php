@extends('layouts.plantilla')

@section('title','Crear Cooperante')

@section('content')

        <h1>Crear nuevo Cooperante</h1>

        @include('partials.validation-errors')

        <form action="{{ route('cooperantes.store') }}" method="POST">

            @include('cooperantes._form', ['btnText' => 'Guardar'])
           
        </form>
        
@endsection