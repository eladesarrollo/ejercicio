@extends('layouts.plantilla')

@section('title','Proyectos')

@section('content')

        <h1>Proyectos</h1>

        <a href="{{ route('proyectos.create') }}" class="btn btn-primary">Crear Proyecto</a>  
        
        @if(session('status'))
            <br><br>
            <div class="alert alert-info">
                {{ session('status') }}        
            </div>
        @else
            <br><br>
        @endif
        
        <table id="tableProyectos" class="table table-striped table-bordered">
            <thead> 
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Fecha modificación</th>                    
                    <th>Ver</th>
                </tr>   
            </thead>    
            <tbody> 
                @forelse($proyectos as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td><a href="{{ route('proyectos.show', $item) }}">{{ $item->nombre }}</a></td>                                                      
                        <td>{{ $item->updated_at->format('d/m/Y') }}</td>
                        <td><a href="{{ route('proyectos.show', $item) }}" class="btn btn-primary">VER</a></td>
                    </tr>
                @empty
                    <tr>
                        <td>No hay Proyectos para mostrar</td>
                    </tr>
                @endforelse
            </tbody>             
        </table>
        {{ $proyectos->links() }}
        
@endsection