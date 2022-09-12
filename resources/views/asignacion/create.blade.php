
@extends('layouts.app')
@section('content')
<div class="container">

<form action="{{ url('/asignacion') }}" method="post">
    @csrf   
    @include('asignacion.form',['modo'=> 'Crear']);
   
</form>
</div>
@endsection