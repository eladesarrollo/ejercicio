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
        $cooperantes= Cooperante::all();        
       // $asignacions = Asignacion::all();
        
        $datos['asignacions']=Asignacion::paginate(5);
        return view ('vreporte.index',compact('datos','cooperantes'));

        //return view ('vreporte.index', compact('asignacions','cooperantes'));
    }

    public function show(asignacion $asignacion)
    {                        
        $asignacions = Asignacion::all();
        return view ('vreporte.show', compact('asignacions'));
    }
    
    
    
}
