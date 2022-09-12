
@extends('layouts.app')
@section('content')
<div class="container">

<form action="{{ url('/proyecto') }}" method="post">
    @csrf   
    @include('proyecto.form',['modo'=> 'Crear']);
   
</form>
</div>
@endsection