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

   
Route::get('form_cliente', [formularioController::class, 'mostrarFormulario']);

Route::get('/crud_incidencias', [CrudController::class, 'mostrar']) ->name('mostrar');

Route::post('/crud_incidencias', [CrudController::class, 'index']) ->name('index');
// Route::get('form_cliente', [ClienteController::class, 'index']);
    // return "Aqui es donde se creara el cliente";

<<<<<<< HEAD
    Route::get('/crud_incidencias/{id}', [CrudController::class, 'ver'])->name('crud_incidencias.ver');
=======
    Route::get('/crud_incidencias/ver', [CrudController::class, 'ver'])->name('crud_incidencias.ver');
>>>>>>> 54c2d97886214823dcd9a56ab1f65c1445f2bc02


    // Route::post('/crud_incidencias', [CrudController::class, 'crear']) ->name('crear');  
Route::post('form_cliente', [ClienteController::class, 'store']) -> name('form_cliente.store');


Route::get('form_cliente/create', [ClienteController::class, 'create']);
    // return "Aqui es donde se creara el cliente";

Route::get('form_cliente/{cliente}', [ClienteController::class, 'show']);
 



 
