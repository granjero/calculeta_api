<?php

use App\Http\Controllers\ControladorPiletas;
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

Route::get('/', [ControladorPiletas::class, 'index']);

Route::get('/inicio', [ControladorPiletas::class, 'inicio']);

Route::get('/acerca', [ControladorPiletas::class, 'acerca']);

Route::get('/como', [ControladorPiletas::class, 'como']);

Route::get('/ultima', [ControladorPiletas::class, 'ultima']);

Route::get('/pileta/{id}', [ControladorPiletas::class, 'pileta']);




Route::get('/delay', [ControladorPiletas::class, 'delay']);
