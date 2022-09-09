<?php

namespace App\Http\Controllers;

use App\Models\Assigment;
use App\Models\Project;
use App\Models\Worker;

use Illuminate\Http\Request;

class ReportController extends Controller
{
    //

    public function index()
    {
        $workers = Worker::where('active', '=', 1)->get();

        return view('report.index')->with('workers', $workers);
    }
    

    public function show($id)
    {
        $assigments = Assigment::where('worker_id', '=', $id)
            ->with('project')->get();

        return view('report.report')->with('assigments', $assigments);
    }
}
