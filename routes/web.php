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

route::controller(incidenciasController::class)->group(function () {
    Route::post('/listar', 'index')->name('index');
    Route::post('/estado', 'estado')->name('estado');
    Route::post('/chat/{id}', 'chat')->name('chat');
    Route::post('/mensaje', 'envmensaje')->name('mensaje');
    route::get('mensaje/{id}', 'mensaje')->name('chat.mensaje');
});

// Route::post('/listar', [incidenciasController::class, 'index'])->name('index');
// Route::post('/estado', [incidenciasController::class, 'estado'])->name('estado');
// Route::post('/chat/{id}', [incidenciasController::class, 'chat'])->name('chat');
// Route::post('/mensaje', [incidenciasController::class, 'envmensaje'])->name('mensaje');