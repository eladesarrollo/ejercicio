<?php

namespace App\Http\Controllers;

use App\Models\Worker;
use Illuminate\Http\Request;

class WorkerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get all workers
        $workers = Worker::all();

        //return view
        return view('worker.index')->with('workers', $workers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //return view
        return view('worker.create');
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
        $worker = new Worker();
        $worker->name = $request->get('name');
        $worker->email = $request->get('email');
        $worker->address = $request->get('address');
        $worker->active = $request->get('active') ?? 0;

        //save in DB
        $worker->save();

        //redirect to index
        return redirect('/workers');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Worker  $worker
     * @return \Illuminate\Http\Response
     */
    public function show(Worker $worker)
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
        //find worker by id
        $worker = Worker::findOrFail($id);

        //return view
        return view('worker.edit')->with('worker', $worker);
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
        //find worker by id
        $worker = Worker::findOrFail($id);

        //set model instance to save in DB
        $worker->name = $request->get('name');
        $worker->email = $request->get('email');
        $worker->address = $request->get('address');
        $worker->active = $request->get('active') ?? 0;

        //save in DB
        $worker->save();

        //redirect to index
        return redirect('/workers');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //find worker by id
        $worker = Worker::findOrFail($id);

        //delete worker
        $worker->delete();

        //redirect to index
        return redirect('/workers');
    }
}
