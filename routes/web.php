<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LecturaController;
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

Route::get('/',[LecturaController::class, 'index']);


Route::get('/list',[LecturaController::class, 'index']);

Route::get('/lectura',[LecturaController::class, 'recuperar']);
