<?php

use App\Http\Controllers\CooperatorController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('inicio');
});

//Cooperator Route
Route::resource('cooperators', CooperatorController::class);
Route::resource('projects', ProjectController::class);