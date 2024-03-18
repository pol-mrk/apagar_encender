<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuarios; // Asegúrate de importar el modelo User si lo estás utilizando

class MontrealController extends Controller
{
    public function index()
    {
        // Obtener usuarios con id_sede igual a 3
        $users = Usuarios::where('id_sede', 3)->get();

        // Pasar los usuarios a la vista
        return view('cruds.montreal', ['users' => $users]);
    }
}
