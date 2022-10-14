<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CooperanteController;
use App\Http\Controllers\ProyectoController;
use App\Http\Controllers\AsignacionController;

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
})->name('home');

Route::resource('cooperantes', CooperanteController::class);

Route::resource('proyectos', ProyectoController::class);

Route::get('asignaciones/reporte/{cooperante?}',[AsignacionController::class,'index'])->name('asignaciones.reporte');

Route::get('asignaciones/create',[AsignacionController::class,'create'])->name('asignaciones.create');

Route::post('asignaciones',[AsignacionController::class,'store'])->name('asignaciones.store');

Route::get('asignaciones/obtenerReporte/{cooperante?}',[AsignacionController::class,'obtenerReporte'])->name('asignaciones.obtenerReporte');

Route::get('asignaciones/{asignacion}/edit', [AsignacionController::class,'edit'])->name('asignaciones.edit');

Route::patch('asignaciones/{asignacion}', [AsignacionController::class,'update'])->name('asignaciones.update');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
