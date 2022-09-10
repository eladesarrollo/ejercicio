<?php

namespace App\Http\Controllers;

use App\Models\asignacion;
use App\Models\Cooperante;
use App\Models\Proyecto;
use Illuminate\Http\Request;

class AsignacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['asignacions']=Asignacion::paginate(5);
        return view ('asignacion.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $asignacion = new asignacion();
         
        $cooperantes= Cooperante::pluck('nombre','id');

        return view ('asignacion.create', compact('asignacion','cooperantes'));
 
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
        $campos=[
            'fecha'=>'required|date',
            'monto'=>'required|numeric|regex:/^[\d]{0,11}(\.[\d]{1,2})?$/'
        ];
        $mensaje=[
                 'required'=>'El :attribute es requerido',   
                 'fecha.required'=>'La fecha es requerida'
        ];

        $this->validate($request, $campos,$mensaje );

        $datosAsignacion= request()->except('_token');
        Asignacion::insert($datosAsignacion);
        //return response()->json($datosAsignacion);
        return redirect('asignacion')->with('mensaje','Asignación agregada con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\asignacion  $asignacion
     * @return \Illuminate\Http\Response
     */
    public function show(asignacion $asignacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\asignacion  $asignacion
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $asignacion=Asignacion::findOrFail($id);
        return view ('asignacion.edit',compact('asignacion') );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\asignacion  $asignacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $campos=[
            'fecha'=>'required|date',
            'monto'=>'required|numeric|regex:/^[\d]{0,11}(\.[\d]{1,2})?$/'
        ];
        $mensaje=[
                 'required'=>'El :attribute es requerido',   
                 'fecha.required'=>'La fecha es requerida'
        ];

        $this->validate($request, $campos,$mensaje );

        $datosAsignacion= request()->except(['_token','_method']);
        Asignacion::where('id','=',$id)->update($datosAsignacion);
        
        $asignacion=Asignacion::findOrFail($id);
        //return view ('cooperante.edit',compact('cooperante') );
        return redirect('asignacion')->with('mensaje','Asignación modificada');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\asignacion  $asignacion
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Asignacion::destroy($id);
        return redirect('asignacion')->with('mensaje','Asignación borrada');
    }
}
