<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\incidenciasController;

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
    return view('tecnico.index');
});

Route::post('/listar', [incidenciasController::class, 'index'])->name('tecnico.index');
Route::post('/editar', [incidenciasController::class, 'editar'])->name('editar');
Route::post('/estado', [incidenciasController::class, 'estado'])->name('estado');
Route::match(['get', 'post'], '/chat/{id}', [incidenciasController::class, 'chat'])->name('tecnico.chat');

