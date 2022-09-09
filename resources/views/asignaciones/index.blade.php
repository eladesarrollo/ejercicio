@extends('layouts.plantilla')

@section('title','Asignaciones')

@section('content')

        <h1>Asignaciones</h1>       

        <a href="{{ route('asignaciones.create') }}" class="btn btn-primary">Crear nueva Asignación</a>  

        @if(session('status')) 
            <br><br>           
            <div class="alert alert-info">
                {{ session('status') }}        
            </div>
        @else
            <br><br>
        @endif
  
        <label for="Cooperante: ">
            Seleccionar Cooperante: 
            <select class="form-control" id="cooperante_id" name="cooperante_id" required>
                <option value="">--- Todos ---</option>
                @isset($cooperantes)
                   @foreach($cooperantes as $item){ ?>
                    <option value="{{ $item->id }}">
                        {{ $item->nombre }}
                    </option>
                  @endforeach
                @endisset
              </select>              
        </label>
        <a href="{{ route('asignaciones.reporte') }}" id="linkBusqueda" class="btn btn-primary">Buscar Reporte</a>  
        <br>
        <br>
        <table id="tableAsignaciones" class="table table-striped table-bordered">
            <thead> 
                <tr>
                    <th>N.</th>
                    <th>Cooperante</th>
                    <th>Proyecto</th>
                    <th>Fecha Asignación</th>
                    <th>Monto</th>
                    <th>Editar</th>
                </tr>   
            </thead>    
            <tbody> 
                @forelse($asignaciones as $asignacion)
                    <tr>
                        <td>{{$asignacion->id}}</td>
                        <td>{{$asignacion->cooperante->nombre}}</td>
                        <td>{{$asignacion->proyecto->nombre}}</td>
                        <td>{{$asignacion->fechaAsignacion->format('d/m/Y')}}</td>                
                        <td>@money($asignacion->monto)</td>      
                        <td><a href="{{ route('asignaciones.edit', $asignacion) }}" class="btn btn-primary">EDITAR</a></td>              
                    </tr>
                    
                @empty
                    <li>No hay Proyectos para mostrar</li>            
                @endforelse
        
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td class="fw-bold text-end">Total</td>                
                    <td class="fw-bold">@money($asignaciones->sum('monto'))</td>         
                    <td></td>           
                </tr>
                        
            </tbody>             
        </table>

        <script type="text/javascript">
            $(document).ready(function() {                

                $("#cooperante_id").change(function () {
                    $("#cooperante_id option:selected").each(function () {
                        var id = $("#cooperante_id").val();               
                        //forma 1: actualizar el boton href, para abrir nueva pagina
                        $("#linkBusqueda").attr('href','/asignaciones/reporte/' + id);

                        //forma 2: reeplazar solamente la tabla con la nueva data traida
                        // $.get("/asignaciones/reporte/"+$(this).val(), function(data){
                        //     $("#tableAsignaciones tbody").html(data);
                        // });            
                });
              });
            });
          </script>
        
@endsection