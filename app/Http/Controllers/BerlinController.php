<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BerlinController extends Controller
{
    public function listarUsuariosSede2()
    {
        // Consultar usuarios con id_sede igual a 2
        $users = DB::table('tbl_users')->where('id_sede', 2)->get();

        // Pasar los usuarios a la vista
        return view('cruds.berlin', ['users' => $users]);
    }

    public function buscarUsuariosBerlin(Request $request)
    {
        $nombre = $request->input('nombre') ?? '';
        $apellidos = $request->input('apellidos') ?? '';
        $fecha_inicio = $request->input('fecha_inicio') ?? '';
        $fecha_fin = $request->input('fecha_fin') ?? '';
        $rol = $request->input('rol') ?? '';

        $query = DB::table('tbl_users')->where('id_sede', 2);

        if (!empty($nombre)) {
            $query->where('nombre_user', 'LIKE', "%$nombre%");
        }

        if (!empty($apellidos)) {
            $query->where('apellidos_user', 'LIKE', "%$apellidos%");
        }

        if (!empty($fecha_inicio)) {
            $query->where('fecha_ini_user', '>=', $fecha_inicio);
        }

        if (!empty($fecha_fin)) {
            $query->where('fecha_fin_user', '<=', $fecha_fin);
        }

        if (!empty($rol)) {
            $query->where('id_rol', $rol);
        }

        $users = $query->get();

        // Devolver la vista con los usuarios o los datos JSON dependiendo de tus necesidades
        return view('cruds.berlin', compact('users'));
    }
}



