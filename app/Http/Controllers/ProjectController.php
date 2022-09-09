<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get projects
        $projects = Project::all();

        //return view
        return view('project.index')->with('projects', $projects);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //return view
        return view('project.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Set model instance to save in DB
        $project = new Project();
        $project->name = $request->get('name');
        $project->description = $request->get('description');
        $project->start_date = $request->get('start_date');
        $project->end_date = $request->get('end_date');
        $project->active = $request->get('active') ?? 0;

        //validate dates
        if ($project->start_date > $project->end_date) 
        {
            //redirect with error
            return redirect()->back()->withInput()
                ->withErrors(['La fecha de inicio no puede ser mayor a la final']);
        }

        //Save in DB
        $project->save();

        //redirect to index
        return redirect('/projects');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
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
        //get project by id
        $project = Project::findOrFail($id);
        
        //return view
        return view('project.edit')->with('project', $project);
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
        //get project by id
        $project = Project::findOrFail($id);

        //set model to save in DB
        $project->name = $request->get('name');
        $project->description = $request->get('description');
        $project->start_date = $request->get('start_date');
        $project->end_date = $request->get('end_date');
        $project->active = $request->get('active') ?? 0;

        //validate dates
        if ($project->start_date > $project->end_date) 
        {
            //redirect with error
            return redirect()->back()->withInput()
                ->withErrors(['La fecha de inicio no puede ser mayor a la final']);
        }

        //save in DB
        $project->save();

        //redirect to index
        return redirect('/projects');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //get project by id
        $project = Project::findOrFail($id);

        //delete project
        $project->delete();

        //redirect to index
        return redirect('/projects');
    }
}
