@extends('layouts.plantilla')

@section('title','Editar Proyecto')

@section('content')

        <h1>Editar Proyecto</h1>  

        @include('partials.validation-errors')

        <form action="{{ route('proyectos.update',$proyecto) }}" method="POST">
            @method('PATCH')
            
            @include('proyectos._form', ['btnText' => 'Actualizar'])
           
        </form>
        
@endsection