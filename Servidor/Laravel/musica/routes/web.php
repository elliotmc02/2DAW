<?php

use App\Http\Controllers\ArtistaController;
use App\Http\Controllers\CancionController;
use Illuminate\Support\Facades\Route;

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

Route::resource('/canciones', CancionController::class);

Route::post('canciones/{cancion}', 'App\Http\Controllers\CancionController@update')->name('canciones.update');
Route::get('canciones/{cancion}', 'App\Http\Controllers\CancionController@show')->name('canciones.show');
Route::delete('canciones/{cancion}', 'App\Http\Controllers\CancionController@destroy')->name('canciones.destroy');
Route::get('canciones/{cancion}/edit', 'App\Http\Controllers\CancionController@edit')->name('canciones.edit');

Route::resource('/artistas', ArtistaController::class);

