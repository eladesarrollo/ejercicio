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
});

/*Route::get('/cooperante', function () {
    return view('cooperante.index');
});

Route::get('cooperante/create',[CooperanteController::class,'create']);
*/
Route::Resource('cooperante',CooperanteController::class);
Route::Resource('proyecto',ProyectoController::class);
Route::Resource('asignacion',AsignacionController::class);