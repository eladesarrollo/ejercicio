Formulario de creacion de proyecto

<form action="{{ url('/proyecto') }}" method="post">
    @csrf   
    @include('proyecto.form',['modo'=> 'Crear']);
   
</form>