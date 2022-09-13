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
        /*$cooperantes= Cooperante::all();                       
        $datos['asignacions']=Asignacion::paginate(5);
        return view ('vreporte.index',compact('datos','cooperantes'));*/
        $asignacion = new asignacion();
         
        $cooperantes= Cooperante::all();        

        return view ('vreporte.index', compact('asignacion','cooperantes'));
       
    }

    //asignacion $asignacion
    public function show( $myid )
    {      
        //$cooperante_id=$myid;                  
        $asignacions = Asignacion::all();
        //$asignacions = Asignacion::where('cooperante_id',$myid )->get();
        return view ('vreporte.show', compact('asignacions'));
    }
    
    
    
}
