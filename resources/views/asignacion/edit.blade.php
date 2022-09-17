
@extends('layouts.app')
@section('content')
<form action="{{ url('/asignacion/'.$asignacion->id)  }}" method="post">
@csrf
{{ method_field('PATCH') }}

@include('asignacion.form',['modo'=> 'Editar']);
</form>
</div>
@endsection