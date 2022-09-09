@extends('layouts.plantilla')

@section('title','Editar Cooperante')

@section('content')

        <h1>Editar Cooperante</h1>  

        @include('partials.validation-errors')

        <form action="{{ route('cooperantes.update',$cooperante) }}" method="POST">
            @method('PATCH')
            
            @include('cooperantes._form', ['btnText' => 'Actualizar'])
           
        </form>
        
@endsection