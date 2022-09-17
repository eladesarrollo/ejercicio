
@extends('layouts.app')
@section('content')
<div class="container">

<form action="{{ url('/cooperante') }}" method="post">
    @csrf   
    @include('cooperante.form',['modo'=> 'Crear']);
   
</form>
</div>
@endsection