<?php

namespace App\Http\Controllers;

use App\Models\Asignacion;
use App\Models\Proyecto;
use App\Models\Cooperante;
use Illuminate\Http\Request;
use App\Http\Requests\SaveAsignacionRequest;

class AsignacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($cooperante=null)
    {
    
        $cooperantes=Cooperante::all();

        if(isset($cooperante)){
            $asignaciones=Asignacion::where("cooperante_id","=", $cooperante)->orderBy('created_at','ASC')->get();
        }
        else{
            $asignaciones=Asignacion::orderBy('created_at','ASC')->get();
        }

        $data = [            
            'cooperantes' => $cooperantes, 
            'asignaciones' => $asignaciones                 
         ];
        //var_dump($asignaciones);

        return View('asignaciones.index', $data);
    }

    public function obtenerReporte($cooperante=null){
        
        //dd($cooperante);
        
        if(isset($cooperante)){
            $asignaciones=Asignacion::where("cooperante_id","=", $cooperante)->orderBy('created_at','ASC')->get();
        }
        else{
            $asignaciones=Asignacion::orderBy('created_at','DESC')->get();
        }

        //dd($asignaciones);

        $filtro="";
        $total=0;

        foreach($asignaciones as $asignacion){
            $filtro.="<tr>
                <td>".$asignacion->id."</td>
                <td>".$asignacion->cooperante->nombre."</td>
                <td>".$asignacion->proyecto->nombre."</td>
                <td>".$asignacion->fechaAsignacion->format('d/m/Y')."</td>                
                <td>".$asignacion->monto."</td>                    
            </tr>";
            $total+=$asignacion->monto;
        }

        $filtro.="<tr>
            <td></td>
            <td></td>
            <td></td>
            <td>Total</td>                
            <td>".$total."</td>                    
        </tr>";

        return $filtro;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $proyectos=Proyecto::all();

        $cooperantes=Cooperante::all();

        $data = [
            'proyectos' => $proyectos,
            'cooperantes' => $cooperantes,     
            'asignacion' => new Asignacion       
         ];

         //var_dump($data);
         
        return View('asignaciones.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaveAsignacionRequest $request)
    {
        //var_dump($request);

        Asignacion::create($request->validated());

        return redirect()->route('asignaciones.reporte')->with('status', 'La asignacion fue creada con éxito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Asignacion  $asignacion
     * @return \Illuminate\Http\Response
     */
    public function show(Asignacion $asignacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Asignacion  $asignacion
     * @return \Illuminate\Http\Response
     */
    public function edit(Asignacion $asignacion)
    {
        $proyectos=Proyecto::all();

        $cooperantes=Cooperante::all();

        $data = [
            'proyectos' => $proyectos,
            'cooperantes' => $cooperantes,     
            'asignacion' => $asignacion       
         ];        
         
         //dd($asignacion);

        return View('asignaciones.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Asignacion  $asignacion
     * @return \Illuminate\Http\Response
     */
    public function update(SaveAsignacionRequest $request, Asignacion $asignacion)
    {
        $asignacion->update($request->validated());

        return redirect()->route('asignaciones.reporte')->with('status', 'La asignación fue actualizada con éxito.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Asignacion  $asignacion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Asignacion $asignacion)
    {
        //
    }
}
