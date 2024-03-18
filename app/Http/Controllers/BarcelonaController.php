<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BarcelonaController extends Controller
{
    public function index()
    {
        // Consultar usuarios con id_sede igual a 1
        $users = DB::table('tbl_users')->where('id_sede', 1)->get();

        return view('crud.barcelona', ['users' => $users]);
    }

    public function buscarUsuarios(Request $request)
    {
        $nombre = $request->input('nombre');
        $apellidos = $request->input('apellidos');
        $fecha_inicio = $request->input('fecha_inicio');
        $fecha_fin = $request->input('fecha_fin');
        $rol = $request->input('rol');

        $query = DB::table('tbl_users')->where('id_sede', 1);

        if ($nombre) {
            $query->where('nombre_user', 'LIKE', "%$nombre%");
        }

        if ($apellidos) {
            $query->where('apellidos_user', 'LIKE', "%$apellidos%");
        }

        if ($fecha_inicio) {
            $query->where('fecha_ini_user', '>=', $fecha_inicio);
        }

        if ($fecha_fin) {
            $query->where('fecha_fin_user', '<=', $fecha_fin);
        }

        if ($rol) {
            $query->where('id_rol', $rol);
        }

        $users = $query->get();

        return view('usuarios.lista', ['users' => $users]);
    }
}
