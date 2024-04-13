<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

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
    return view('sedes');
})->name('sedes');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


///////////////////////////////////////// CREAR UN NUEVO USUARIO /////////////////////////////////////////////////////////////////////////

use App\Http\Controllers\UserController;

Route::get('/crear-usuario', [UserController::class, 'create'])->name('nuevo-usuario');
Route::post('/registro-usuario', [UserController::class, 'store'])->name('registro-usuario');

///////////////////////////////////////// CREAR UN NUEVO USUARIO /////////////////////////////////////////////////////////////////////////


///////////////////////////////////////// BUSCAR USUARIO /////////////////////////////////////////////////////////////////////////
use App\Http\Controllers\SearchUserController;

Route::get('/search.users', [SearchUserController::class, 'search'])->name('search.users');

///////////////////////////////////////// BUSCAR USUARIO /////////////////////////////////////////////////////////////////////////


///////////////////////////////////////// CREAR SUBCATEGORIA /////////////////////////////////////////////////////////////////////////

use App\Http\Controllers\SubcategoriaController;

Route::get('/crear-subcategoria', [SubcategoriaController::class, 'create']);
Route::post('/guardar-subcategoria', [SubcategoriaController::class, 'store'])->name('guardar_subcategoria');

///////////////////////////////////////// CREAR SUBCATEGORIA /////////////////////////////////////////////////////////////////////////


///////////////////////////////////////// CREAR CATEGORIA /////////////////////////////////////////////////////////////////////////

use App\Http\Controllers\CategoriaSubcategoriaController;

Route::get('/crear-categoria-y-subcategoria', [CategoriaSubcategoriaController::class, 'create']);
Route::post('/guardar-categoria', [CategoriaSubcategoriaController::class, 'store'])->name('guardar_categoria');


///////////////////////////////////////// CREAR CATEGORIA /////////////////////////////////////////////////////////////////////////


///////////////////////////////////////// CRUD MONTREAL /////////////////////////////////////////////////////////////////////////

use App\Http\Controllers\MontrealController;

Route::get('/montreal', [MontrealController::class, 'index'])->name('montreal');
Route::get('/buscar-montreal', [MontrealController::class, 'buscarUsuariosMontreal'])->name('montrealsearch.users');

///////////////////////////////////////// CRUD MONTREAL /////////////////////////////////////////////////////////////////////////


///////////////////////////////////////// CRUD BERLIN /////////////////////////////////////////////////////////////////////////

use App\Http\Controllers\BerlinController;

Route::get('/berlin', [BerlinController::class, 'listarUsuariosSede2'])->name('berlin');
Route::get('/buscar-berlin', [BerlinController::class, 'buscarUsuariosBerlin'])->name('berlinsearch.users');

///////////////////////////////////////// CRUD BERLIN /////////////////////////////////////////////////////////////////

use App\Http\Controllers\BarcelonaController;

Route::get('/barcelona', [BarcelonaController::class, 'index'])->name('barcelona');
Route::get('/buscar-barcelona', [BarcelonaController::class, 'buscarUsuariosBarcelona'])->name('barcelonasearch.users');














// _____________________________________________ POL MARK ________________________________________________________

use App\Http\Controllers\CrudPolMarcController;

Route::get('/gestor', [CrudPolMarcController::class, 'mostrar']) ->name('mostrar');

Route::post('/gestor', [CrudPolMarcController::class, 'index']) ->name('index');

Route::get('/gestor/{id}', [CrudPolMarcController::class, 'show'])->name('show');

Route::put('/gestor/{incidencia}', [CrudPolMarcController::class, 'update'])->name('update');
// _____________________________________________ POL MARK ________________________________________________________



// _____________________________________________ JULIO CESAR ________________________________________________________

use App\Http\Controllers\incidenciasController;

route::controller(incidenciasController::class)->group(function () {
    Route::post('/listar', 'index')->name('index');
    Route::post('/estado', 'estado')->name('estado');
    Route::get('/tecnico/{id}', 'chat')->name('tecnico.chat');
    Route::get('/tecnicoIndex', 'tecnicoIndex')->name('tecnico.index');
});
// _____________________________________________ JULIO CESAR ________________________________________________________



// _____________________________________________ IAN ROMERO ________________________________________________________
// TOdas las acciones que hace estan en el controlador de cliente
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\formularioController;
use App\Http\Controllers\CrudController;

Route::get('form_cliente', [formularioController::class, 'mostrarFormulario']);

Route::get('/crud_incidencias', [CrudController::class, 'mostrar']) ->name('mostrar');

Route::post('/crud_incidencias', [CrudController::class, 'incidencia']) ->name('incidencia');

    Route::get('/crud_incidencias/{id}', [CrudController::class, 'ver'])->name('crud_incidencias.ver');
    Route::get('/crud_incidencias/ver', [CrudController::class, 'ver'])->name('crud_incidencias.ver');
 
Route::post('form_cliente', [ClienteController::class, 'store']) -> name('form_cliente.store');

Route::get('form_cliente/create', [ClienteController::class, 'create']);

Route::get('form_cliente/{cliente}', [ClienteController::class, 'show']);
// _____________________________________________ IAN ROMERO ________________________________________________________