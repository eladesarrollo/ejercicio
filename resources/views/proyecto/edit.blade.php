Formulario de edicion de proyecto

<form action="{{ url('/proyecto/'.$proyecto->id)  }}" method="post">
@csrf
{{ method_field('PATCH') }}

@include('proyecto.form',['modo'=> 'Editar']);
</form>
