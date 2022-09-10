Formulario de creacion de asignaciones

<form action="{{ url('/asignacion') }}" method="post">
    @csrf   
    @include('asignacion.form',['modo'=> 'Crear']);
   
</form>