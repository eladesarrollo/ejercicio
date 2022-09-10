<?php

namespace App\Http\Controllers;

use App\Models\Cooperante;
use Illuminate\Http\Request;

class CooperanteController extends Controller
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
        return view ('cooperante.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view ('cooperante.create');
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
        //$datosCooperante= request()->all();
        $campos=[
            'nombre'=>'required|string|max:100',
            'email'=>'required|email',
            'direccion'=>'required|string|max:256'
        ];
        $mensaje=[
                 'required'=>'El :attribute es requerido',   
                 'direccion.required'=>'La dirección es requerida'
        ];

        $this->validate($request, $campos,$mensaje );

        $datosCooperante= request()->except('_token');
        Cooperante::insert($datosCooperante);
        //return response()->json($datosCooperante);
        return redirect('cooperante')->with('mensaje','Cooperante agregado con exito');
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cooperante  $cooperante
     * @return \Illuminate\Http\Response
     */
    
    public function edit($id)
    {
        //
        $cooperante=Cooperante::findOrFail($id);
        return view ('cooperante.edit',compact('cooperante') );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cooperante  $cooperante
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $campos=[
            'nombre'=>'required|string|max:100',
            'email'=>'required|email',
            'direccion'=>'required|string|max:256'
        ];
        $mensaje=[
                 'required'=>'El :attribute es requerido',   
                 'direccion.required'=>'La dirección es requerida'
        ];

        $this->validate($request, $campos,$mensaje );

        $datosCooperante= request()->except(['_token','_method']);
        Cooperante::where('id','=',$id)->update($datosCooperante);
        
        $cooperante=Cooperante::findOrFail($id);
        //return view ('cooperante.edit',compact('cooperante') );
        return redirect('cooperante')->with('mensaje','Cooperante modificado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cooperante  $cooperante
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)//Cooperante $cooperante
    {
        //
        Cooperante::destroy($id);
        return redirect('cooperante')->with('mensaje','Cooperante borrado');
        
    }
}
