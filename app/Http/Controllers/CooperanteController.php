<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCooperanteRequest;
use App\Http\Requests\UpdateCooperanteRequest;
use App\Models\Cooperante;
use function App\helpers\generate_pdf;

class CooperanteController extends Controller
{
    private $elementos_a_validar = [
        'nombre' => 'required',
        'email' => 'required',
        'direccion' => 'required'
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Cooperante::all();
        return view('cooperante.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cooperante.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\StoreCooperanteRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCooperanteRequest $request)
    {
        $request->validate($this->elementos_a_validar);
        $record = new Cooperante;
        $record->fill($request->post())->save();
        return redirect()->route('cooperante.index')->with('success', 'Registro creado extiosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Cooperante $cooperante
     * @return \Illuminate\Http\Response
     */
    public function show(Cooperante $cooperante)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Cooperante $cooperante
     * @return \Illuminate\Http\Response
     */
    public function edit(Cooperante $cooperante)
    {
        return view('cooperante.edit')->with('elemento', $cooperante);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateCooperanteRequest $request
     * @param \App\Models\Cooperante $cooperante
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCooperanteRequest $request, Cooperante $cooperante)
    {
        $request->validate($this->elementos_a_validar);
        $cooperante->fill($request->post())->save();
        return redirect()->route('cooperante.index')->with('message', 'Registro actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Cooperante $cooperante
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cooperante $cooperante)
    {
        $cooperante->forceDelete();
        return redirect()->route('cooperante.index')->with('message', 'Registro eliminado exitosamente');
    }

    public function report()
    {
        return generate_pdf(['data' => Cooperante::all()], 'cooperante.report', 'rpt_cooperante');
    }
}
