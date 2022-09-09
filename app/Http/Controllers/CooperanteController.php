<?php

namespace App\Http\Controllers;

use App\Models\Cooperante;
use Illuminate\Http\Request;
use App\Http\Requests\SaveCooperanteRequest;

class CooperanteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cooperantes=Cooperante::latest('updated_at')->get();

        //var_dump($cooperantes);

        return View('cooperantes.index', [
            'cooperantes' => Cooperante::latest('updated_at')->paginate()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('cooperantes.create',[
            'cooperante' => new Cooperante
        ]);
    }  

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaveCooperanteRequest $request)
    {
        Cooperante::create($request->validated());

        return redirect()->route('cooperantes.index')->with('status', 'El cooperante fue creado con éxito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cooperante  $cooperante
     * @return \Illuminate\Http\Response
     */
    public function show(Cooperante $cooperante)
    {
        return View('cooperantes.show',[            
            'cooperante' => $cooperante
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cooperante  $cooperante
     * @return \Illuminate\Http\Response
     */
    public function edit(Cooperante $cooperante)
    {
        return View('cooperantes.edit',[           
            'cooperante' => $cooperante
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cooperante  $cooperante
     * @return \Illuminate\Http\Response
     */
    public function update(SaveCooperanteRequest $request, Cooperante $cooperante)
    {
        $cooperante->update($request->validated());

        return redirect()->route('cooperantes.index',$cooperante)->with('status', 'El cooperante fue actualizado con éxito.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cooperante  $cooperante
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cooperante $cooperante)
    {
        $cooperante->delete();

        return redirect()->route('cooperantes.index')->with('status', 'El cooperante fue eliminado con éxito.');
    }
}
