<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use App\Models\Cooperator;
use App\Models\Project;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AssignmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, Assignment $assignment)
    {
        $cooperator = Cooperator::find($request->cooperator_id);
        $projects = Project::all();

        return view('assignments.create', [
            'cooperator'    =>  $cooperator,
            'projects'      => $projects,
            'assignments'   => $assignment
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Assignment $assignment)
    {
        $request->validate([
            'cooperator'    => 'required',
            'project'       => 'required|nullable',
            'date'          => 'required',
            'amount'        => 'required|numeric'
        ]);

        $date = $request->date;
        $date = Carbon::createFromFormat('m/d/Y', $date);
        $date = $date->format('Y-m-d');

        $assignment->firstOrCreate([
            'cooperator_id' => $request->cooperator,
            'project_id'    => $request->project,
            'date'          => $date,
            'amount'        => $request->amount
        ]);

        $cooperator = Cooperator::where('id', $request->cooperator)->first();
        $assignments = Assignment::where('cooperator_id', $request->cooperator)->get();

        return redirect()->route('cooperators.show', ['cooperator' => $cooperator, 'assigments' => $assignments]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Assignment  $assignment
     * @return \Illuminate\Http\Response
     */
    public function show(Assignment $assignment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Assignment  $assignment
     * @return \Illuminate\Http\Response
     */
    public function edit(Assignment $assignment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Assignment  $assignment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Assignment $assignment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Assignment  $assignment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Assignment $assignment)
    {
        //
    }
}
