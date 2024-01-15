<?php

use Illuminate\Support\Facades\Route;
use App\http\Controllers\PlatoController;
use App\http\Controllers\BebidaController;
use App\http\Controllers\CartaController;
use App\http\Controllers\TipoPlatoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('hola');
});

Route::get('/adios', function () {
    return view('adios');
});

Route::resource('/platos', PlatoController::class);
Route::resource('/bebidas', BebidaController::class);
Route::resource('/carta', CartaController::class);
Route::resource('/tipos_platos', TipoPlatoController::class);
