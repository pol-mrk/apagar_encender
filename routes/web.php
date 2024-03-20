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

// Route::get('/', function () {
//     return view('sedes');
// });

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


///////////////////////////////////////// CREAR UN NUEVO USUARIO /////////////////////////////////////////////////////////////////////////

use App\Http\Controllers\UserController;

Route::get('/crear-usuario', [UserController::class, 'create']);
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

///////////////////////////////////////// CRUD MONTREAL /////////////////////////////////////////////////////////////////////////


///////////////////////////////////////// CRUD BERLIN /////////////////////////////////////////////////////////////////////////

use App\Http\Controllers\BerlinController;

Route::get('/berlin', [BerlinController::class, 'listarUsuariosSede2'])->name('berlin');

///////////////////////////////////////// CRUD BERLIN /////////////////////////////////////////////////////////////////

use App\Http\Controllers\BarcelonaController;

Route::get('/barcelona', [BarcelonaController::class, 'index'])->name('barcelona');
Route::get('/buscar-barcelona', [BarcelonaController::class, 'buscarUsuarios']);














// _____________________________________________ POL MARK ________________________________________________________

use App\Http\Controllers\GestorController;


Route::controller(GestorController::class)->group(function(){
    Route::get('/','index')->name('index');
    Route::get('/create','create')->name('create');
    Route::get('/{id}','show')->name('show');
    Route::post('/','store')->name('store');
    Route::get('/{id}/edit','edit')->name('edit');
    Route::put('/{incidencia}','update')->name('update');
});
