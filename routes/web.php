<?php
use Illuminate\Support\Facades\Route;
// TOdas las acciones que hace estan en el controlador de cliente
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\formularioController;
use App\Http\Controllers\CrudController;
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
    return view('welcome');
});

Route::get('/gestor', [CrudController::class, 'mostrar']) ->name('mostrar');

Route::post('/gestor', [CrudController::class, 'index']) ->name('index');

Route::get('/gestor/{id}', [CrudController::class, 'show'])->name('show');

Route::put('/gestor/{incidencia}', [CrudController::class, 'update'])->name('update');
