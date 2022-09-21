<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAsignacionRequest;
use App\Http\Requests\UpdateAsignacionRequest;
use App\Models\Asignacion;
use App\Models\Cooperante;
use App\Models\Proyecto;
use function App\helpers\generate_pdf;

class AsignacionController extends Controller
{
    private $elementos_a_validar = [
        'proyecto_id' => 'required',
        'cooperante_id' => 'required',
        'fecha' => 'required',
        'monto' => 'required'
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('asignacion.index')->with('data', Asignacion::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('asignacion.create')
            ->with('proyectos', Proyecto::all())
            ->with('cooperantes', Cooperante::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\StoreAsignacionRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAsignacionRequest $request)
    {
        $request->validate($this->elementos_a_validar);
        $record = new Asignacion;
        $record->fill($request->post())->save();
        return redirect()->route('asignacion.index')->with('success', 'Registro creado extiosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Asignacion $asignacion
     * @return \Illuminate\Http\Response
     */
    public function show(Asignacion $asignacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Asignacion $asignacion
     * @return \Illuminate\Http\Response
     */
    public function edit(Asignacion $asignacion)
    {

        return view('asignacion.edit')
            ->with('elemento', $asignacion)
            ->with('proyectos', Proyecto::all())
            ->with('cooperantes', Cooperante::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateAsignacionRequest $request
     * @param \App\Models\Asignacion $asignacion
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAsignacionRequest $request, Asignacion $asignacion)
    {
        $request->validate($this->elementos_a_validar);
        $asignacion->fill($request->post())->save();
        return redirect()->route('asignacion.index')->with('success', 'Registro creado extiosamente');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Asignacion $asignacion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Asignacion $asignacion)
    {
        $asignacion->forceDelete();
        return redirect()->route('asignacion.index')->with('success', 'Registro eliminado extiosamente');
    }

    public function report()
    {
        return generate_pdf(['data' => Asignacion::all()], 'asignacion.report', 'rpt_asignacion');
    }
}
