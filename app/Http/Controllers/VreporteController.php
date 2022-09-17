<?php

namespace App\Http\Controllers;

use App\Models\asignacion;
use App\Models\Cooperante;
use App\Models\Proyecto;
use Illuminate\Http\Request;

class VreporteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        //
        $datos['cooperantes']=Cooperante::paginate(5);
        return view ('vreporte.index',$datos);
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cooperante  $cooperante
     * @return \Illuminate\Http\Response
     */
    public function show(Cooperante $cooperante)
    {
        //
        return view('vreporte.show')
                ->with('cooperante',$cooperante);
    }
    
}
