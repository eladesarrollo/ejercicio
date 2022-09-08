<?php

namespace App\Http\Controllers;

use App\Models\Cooperator;
use Illuminate\Http\Request;

class CooperatorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Cooperator::orderBy('id', 'desc')->paginate(10);
        return view('cooperators.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Cooperator $cooperator)
    {
        return view('cooperators.create', ['cooperator' => $cooperator]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Cooperator $cooperator)
    {
        $request->validate([
            'name'      => 'required',
            'email'     => 'required|unique:cooperators,email,' . $cooperator->email,
            'address'   => 'required',
            'phone'     => 'required'
        ]);

        $cooperator->firstOrCreate([
            'name'      => $request->name,
            'email'     => $request->email,
            'address'   => $request->address,
            'phone'     => $request->phone
        ]);

        return redirect()->route('cooperators.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cooperator  $cooperator
     * @return \Illuminate\Http\Response
     */
    public function show(Cooperator $cooperator)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cooperator  $cooperator
     * @return \Illuminate\Http\Response
     */
    public function edit(Cooperator $cooperator)
    {
        return view('cooperators.edit',['cooperator' => $cooperator]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cooperator  $cooperator
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cooperator $cooperator)
    {
        $request->validate([
            'name'      => 'required',
            //'email'     => 'required|unique:cooperators,email,' . $cooperator->email,
            'email'     => 'required',
            'address'   => 'required',
            'phone'     => 'required'
        ]);

        $cooperator->update([
            'name'      => $request->name,
            'email'     => $request->email,
            'address'   => $request->address,
            'phone'     => $request->phone
        ]);

        return redirect()->route('cooperators.edit', $cooperator);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cooperator  $cooperator
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cooperator $cooperator)
    {
        $cooperator->delete();
        return back();
    }
}
