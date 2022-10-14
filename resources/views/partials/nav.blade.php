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

    @if (Route::has('login'))
    <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
        @auth
            <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>

            <a href="{{ route('logout') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log out</a>
        @else
            <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

            @if (Route::has('register'))
                <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
            @endif
        @endauth
    </div>
@endif
</ul>
</nav>