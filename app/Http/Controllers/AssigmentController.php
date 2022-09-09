<?php

namespace App\Http\Controllers;

use App\Models\Assigment;
use App\Models\Project;
use App\Models\Worker;

use Illuminate\Http\Request;

class AssigmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get asigments
        $assigments = Assigment::with(['worker', 'project'])->get();

        //return view
        return view('assigment.index')->with('assigments', $assigments);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //get projects and workers actives fron DB
        $projects = Project::where('active', '=', 1)->get();
        $workers = Worker::where('active', '=', 1)->get();

        //return view
        return view('assigment.create')->with('projects', $projects)->with('workers', $workers);       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //set model instance to save in DB
        $assigment = new Assigment();
        $assigment->worker_id = $request->get('worker_id');
        $assigment->project_id = $request->get('project_id');
        $assigment->assigment_date = $request->get('assigment_date');
        $assigment->amount = $request->get('amount');

        //verifiy if exist assigment
        $exist = Assigment::where('worker_id', $assigment->worker_id)
            ->where('project_id', $assigment->project_id)->first();
        if ($exist != null)
        {
            //redirect with error
            return redirect()->back()->withInput()
                ->withErrors(['La asignación de proyecto y cooperante ya existe']);
        }

        //save in DB
        $assigment->save();

        //redirect to index
        return redirect('/assigments');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Assigment  $assigment
     * @return \Illuminate\Http\Response
     */
    public function show(Assigment $assigment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //get assigment by id
        $assigment = Assigment::findOrFail($id);

        //get projects and workers actives fron DB
        $projects = Project::where('active', '=', 1)->get();
        $workers = Worker::where('active', '=', 1)->get();

        //return view
        return view('assigment.edit')->with('assigment', $assigment)
            ->with('projects', $projects)
            ->with('workers', $workers);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //get assigment by id
        $assigment = Assigment::findOrFail($id);

        //set model instance to save in DB
        $assigment->worker_id = $request->get('worker_id');
        $assigment->project_id = $request->get('project_id');
        $assigment->assigment_date = $request->get('assigment_date');
        $assigment->amount = $request->get('amount');

        //verifiy if exist assigment
        $exist = Assigment::where('worker_id', $assigment->worker_id)
            ->where('project_id', $assigment->project_id)
            ->where('id', '<>', $id)->first();  
        if ($exist != null)
        {
            //redirect with error
            return redirect()->back()->withInput()
                ->withErrors(['La asignación de proyecto y cooperante ya existe']);
        }

        //save in DB
        $assigment->save();

        //redirect to index
        return redirect('/assigments');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //get assigment by id
        $assigment = Assigment::findOrFail($id);

        //delete assigment
        $assigment->delete();

        //redirect to index
        return redirect('/assigments');
    }
}
