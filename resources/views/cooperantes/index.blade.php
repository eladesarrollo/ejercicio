@extends('layouts.plantilla')

@section('title','Cooperantes')

@section('content')

        <h1>Cooperantes</h1>

        <a href="{{ route('cooperantes.create') }}" class="btn btn-primary">Crear Cooperante</a>  
        
        @if(session('status'))
            <br><br>
            <div class="alert alert-info">
                {{ session('status') }}        
            </div>
        @else
            <br><br>
        @endif

        <table id="tableCooperantes" class="table table-striped table-bordered">
            <thead> 
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Fecha modificación</th>                    
                    <th>Ver</th>
                </tr>   
            </thead>    
            <tbody> 
                @forelse($cooperantes as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td><a href="{{ route('cooperantes.show', $item) }}">{{ $item->nombre }}</a></td>                    
                        <td>{{ $item->email }}</td>                    
                        <td>{{ $item->updated_at->format('d/m/Y') }}</td>       
                        <td><a href="{{ route('cooperantes.show', $item) }}" class="btn btn-primary">VER</a></td>
                    </tr>         
                @empty
                    <tr>
                        <td>No hay Cooperantes para mostrar</td>
                    </tr>            
                @endforelse
            </tbody>             
        </table>        
        {{ $cooperantes->links() }}
        
@endsection