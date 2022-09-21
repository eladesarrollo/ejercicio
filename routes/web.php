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

Route::get('/', function () {
    return view('inicio');
});
Route::get('/asignacion/reporte', [\App\Http\Controllers\AsignacionController::class, 'report'])->name('asignacion.report');
Route::get('/cooperante/reporte', [\App\Http\Controllers\CooperanteController::class, 'report'])->name('cooperante.report');
Route::get('/proyecto/reporte', [\App\Http\Controllers\ProyectoController::class, 'report'])-> name('proyecto.report');
Route::resource('cooperante', \App\Http\Controllers\CooperanteController::class);
Route::resource('proyecto', \App\Http\Controllers\ProyectoController::class);
Route::resource('asignacion', \App\Http\Controllers\AsignacionController::class);

