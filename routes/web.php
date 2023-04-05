<?php

use App\Http\Controllers\PersonaController;
use App\Http\Controllers\TrabajadorController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\GerenteController;
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
    return view('welcome');
});

Route::resource('personas', PersonaController::class);
Route::resource('trabajadors', TrabajadorController::class);
Route::resource('empleados', EmpleadoController::class);
Route::resource('gerentes', GerenteController::class);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
