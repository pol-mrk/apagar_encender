<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tbl_incidencias;
use App\Models\tbl_estados;



use Illuminate\Support\Facades\DB;

class incidenciasController extends Controller
{
    public function index(Request $request)
    {
        $estados = tbl_estados::all();
        if ($request->input('incidencia') || $request->input('usuario')) {
            $data = $request->input('incidencia');
            $query = DB::table('tbl_incidencias')
                ->join('tbl_users as users', 'users.id', '=', 'tbl_incidencias.id_user')
                ->join('tbl_subcategorias as subcat', 'subcat.id', '=', 'tbl_incidencias.id_subcat')
                ->join('tbl_estados as estado', 'estado.id', '=', 'tbl_incidencias.id_estado')
                ->join('tbl_users as tecnico', 'tecnico.id', '=', 'tbl_incidencias.tecnico')
                ->select('tbl_incidencias.*', 'users.nombre_user', 'subcat.nombre_sub_cat', 'estado.nombre_estado', 'tecnico.nombre_user as nombre_tecnico');

            if ($request->input('usuario')) {
                $usuario = $request->input('usuario');
                $query->where('titulo_inc', 'like', "%$data%")->where('users.nombre_user', 'like', "%$usuario%");
            } else {
                $query->where('titulo_inc', 'like', "%$data%");
            }

            $incidencia = $query->get();
        } else {
            $incidencia = DB::table('tbl_incidencias')
                ->join('tbl_users as users', 'users.id', '=', 'tbl_incidencias.id_user')
                ->join('tbl_subcategorias as subcat', 'subcat.id', '=', 'tbl_incidencias.id_subcat')
                ->join('tbl_estados as estado', 'estado.id', '=', 'tbl_incidencias.id_estado')
                ->leftJoin('tbl_users as tecnico', 'tecnico.id', '=', 'tbl_incidencias.tecnico')
                ->select('tbl_incidencias.*', 'users.nombre_user', 'subcat.nombre_sub_cat', 'estado.nombre_estado', 'tecnico.nombre_user as nombre_tecnico')
                ->get();
        }
        return response()->json(['incidencias' => $incidencia, 'estados' => $estados]);
    }


    public function register(Request $request)
    {
        $id = $request->input('idp');
        $estado = $request->input('estado');

        $resultado = tbl_incidencias::find($id);
        $resultado->id_estado = $estado;
        $resultado->save();

        echo "ok";
    }
}
