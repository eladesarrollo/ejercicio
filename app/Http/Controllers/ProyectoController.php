<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProyectoRequest;
use App\Http\Requests\UpdateProyectoRequest;
use App\Models\Proyecto;
use function App\helpers\generate_pdf;

class ProyectoController extends Controller
{
    private $elemento_a_validar = [
        'nombre' => 'required',
        'descripcion' => 'required'
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('proyecto.index')->with('data', Proyecto::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('proyecto.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\StoreProyectoRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProyectoRequest $request)
    {
        $request->validate($this->elemento_a_validar);
        $record = new Proyecto;
        $record->fill($request->post())->save();
        return redirect()->route('proyecto.index')->with('success', 'Registro creado extiosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Proyecto $proyecto
     * @return \Illuminate\Http\Response
     */
    public function show(Proyecto $proyecto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Proyecto $proyecto
     * @return \Illuminate\Http\Response
     */
    public function edit(Proyecto $proyecto)
    {
        return view('proyecto.edit')->with('elemento', $proyecto);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateProyectoRequest $request
     * @param \App\Models\Proyecto $proyecto
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProyectoRequest $request, Proyecto $proyecto)
    {
        $request->validate($this->elemento_a_validar);
        $proyecto->fill($request->post())->save();
        return redirect()->route('proyecto.index')->with('message', 'Registro actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Proyecto $proyecto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Proyecto $proyecto)
    {
        $proyecto->forceDelete();
        return redirect()->route('proyecto.index')->with('message', 'Registro eliminado existosamente');
    }

    public function report()
    {
        return generate_pdf(['data' => Proyecto::all()],  'proyecto.report', 'rpt_proyecto');
    }
}

