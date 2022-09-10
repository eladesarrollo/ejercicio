<?php

namespace App\Http\Controllers;

use App\Models\Proyecto;
use Illuminate\Http\Request;

class ProyectoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['proyectos']=Proyecto::paginate(5);
        return view ('proyecto.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view ('proyecto.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        //$datosProyecto= request()->all();
        $campos=[
            'nombre'=>'required|string|max:100',
            'descripcion'=>'required|string|max:256'
        ];
        $mensaje=[
                 'required'=>'El :attribute es requerido',   
                 'descripcion.required'=>'La descripción es requerida'
        ];

        $this->validate($request, $campos,$mensaje );

        $datosProyecto= request()->except('_token');
        Proyecto::insert($datosProyecto);
        //return response()->json($datosProyecto);
        return redirect('proyecto')->with('mensaje','Proyecto agregado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Proyecto  $proyecto
     * @return \Illuminate\Http\Response
     */
    public function show(Proyecto $proyecto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Proyecto  $proyecto
     * @return \Illuminate\Http\Response
     */
    
    public function edit($id)
    {
        //
        $proyecto=Proyecto::findOrFail($id);
        return view ('proyecto.edit',compact('proyecto') );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Proyecto  $cooperante
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $campos=[
            'nombre'=>'required|string|max:100',
            'descripcion'=>'required|string|max:256'
        ];
        $mensaje=[
                 'required'=>'El :attribute es requerido',   
                 'descripcion.required'=>'La descripción es requerida'
        ];

        $this->validate($request, $campos,$mensaje );

        $datosProyecto= request()->except(['_token','_method']);
        Proyecto::where('id','=',$id)->update($datosProyecto);
        
        $proyecto=Proyecto::findOrFail($id);
        //return view ('cooperante.edit',compact('cooperante') );
        return redirect('proyecto')->with('mensaje','Proyecto modificado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Proyecto  $proyecto
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)//Proyecto $proyecto
    {
        //
        Proyecto::destroy($id);
        return redirect('proyecto')->with('mensaje','Proyecto borrado');
        
    }
}
