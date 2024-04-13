<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuarios; 
use Illuminate\Support\Facades\DB;

class MontrealController extends Controller
{
    public function index()
    {
        // Obtener usuarios con id_sede igual a 3
        $users = Usuarios::where('id_sede', 3)->get();

        // Pasar los usuarios a la vista
        return view('cruds.montreal', ['users' => $users]);
    }

    public function buscarUsuariosMontreal(Request $request)
    {
        $nombre = $request->input('nombre') ?? '';
        $apellidos = $request->input('apellidos') ?? '';
        $fecha_inicio = $request->input('fecha_inicio') ?? '';
        $fecha_fin = $request->input('fecha_fin') ?? '';
        $rol = $request->input('rol') ?? '';

        $query = DB::table('tbl_users')->where('id_sede', 3);

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
        return view('cruds.montreal', compact('users'));
    }
    
    public function destroy(Usuarios $user){
        $user->delete();

    return redirect()->route('montreal');
    }
}
