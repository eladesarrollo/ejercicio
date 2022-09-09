<nav>
           
    {{-- {{ dump(request()->routeIs('home')) }} --}}

<ul>
   <li class="">
       <a href="{{ route('home') }}">Inicio</a>
   </li>
   <li class="">
       <a href="{{ route('cooperantes.index') }}">Cooperantes</a>
   </li>
   <li class="">
    <a href="{{ route('proyectos.index') }}">Proyectos</a>
    </li>
    <li class="">
        <a href="{{ route('asignaciones.create') }}">Asignar Proyecto</a>
    </li>
    <li class="">
        <a href="{{ route('asignaciones.reporte') }}">Ver Reporte</a>
    </li>
</ul>
</nav>