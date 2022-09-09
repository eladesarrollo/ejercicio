<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Recursos de Controlladores
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\WorkerController;
use App\Http\Controllers\AssigmentController;
use App\Http\Controllers\ReportController;

//Inicio
Route::get('/', function () {
    return view('start');
});

//Controladores
Route::resource('projects', ProjectController::class);
Route::resource('workers', WorkerController::class);
Route::resource('assigments', AssigmentController::class);
Route::resource('reports', ReportController::class);
