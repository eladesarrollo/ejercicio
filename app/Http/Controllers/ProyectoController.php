<?php

namespace App\Http\Controllers;

use App\Models\Proyecto;
use Illuminate\Http\Request;
use App\Http\Requests\SaveProyectoRequest;

class ProyectoController extends Controller
{
    public function __construct(){
        $this->middleware('auth',['except' => ['index','show']]);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proyectos=Proyecto::latest('updated_at')->get();

        //var_dump($proyectos);

        return View('proyectos.index', [
            'proyectos' => Proyecto::latest('updated_at')->paginate()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('proyectos.create',[
            'proyecto' => new Proyecto
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaveProyectoRequest $request)
    {
        Proyecto::create($request->validated());

        session()->flash('status', 'El proyecto fue creado con éxito.');

        return redirect()->route('proyectos.index');

        //return redirect()->route('proyectos.index')->with('status', 'El proyecto fue creado con éxito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Proyecto  $proyecto
     * @return \Illuminate\Http\Response
     */
    public function show(Proyecto $proyecto)
    {
        return View('proyectos.show',[            
            'proyecto' => $proyecto
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Proyecto  $proyecto
     * @return \Illuminate\Http\Response
     */
    public function edit(Proyecto $proyecto)
    {
        return View('proyectos.edit',[            
            'proyecto' => $proyecto
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Proyecto  $proyecto
     * @return \Illuminate\Http\Response
     */
    public function update(SaveProyectoRequest $request, Proyecto $proyecto)
    {
        $proyecto->update($request->validated());

        return redirect()->route('proyectos.index',$proyecto)->with('status', 'El proyecto fue actualizado con éxito.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Proyecto  $proyecto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Proyecto $proyecto)
    {
        $proyecto->delete();

        return redirect()->route('proyectos.index')->with('status', 'El proyecto fue eliminado con éxito.');
    }
}
