<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Usuarios;

class BarcelonaController extends Controller
{
    public function index()
    {
        // Consultar usuarios con id_sede igual a 1
        $users = DB::table('tbl_users')->where('id_sede', 1)->get();

        return view('cruds.barcelona', ['users' => $users]);
    }

    public function buscarUsuariosBarcelona(Request $request)
    {
            $nombre = $request->input('nombre') ?? '';
            $apellidos = $request->input('apellidos') ?? '';
            $fecha_inicio = $request->input('fecha_inicio') ?? '';
            $fecha_fin = $request->input('fecha_fin') ?? '';
            $rol = $request->input('rol') ?? '';
    
            $query = DB::table('tbl_users')->where('id_sede', 1);
    
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
            return view('cruds.barcelona', compact('users'));
        }

        public function destroy(Usuarios $user){
            $user->delete();

        return redirect()->route('barcelona');
    }
}
