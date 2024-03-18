<?php

use App\Http\Controllers\GestorController;
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

Route::controller(GestorController::class)->group(function(){
    Route::get('/','index')->name('index');
    Route::get('/create','create')->name('create');
    Route::get('/{id}','show')->name('show');
    Route::post('/','store')->name('store');
    Route::get('/{id}/edit','edit')->name('edit');
    Route::put('/{incidencia}','update')->name('update');
});