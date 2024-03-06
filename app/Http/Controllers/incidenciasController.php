<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tbl_incidencias;
use Illuminate\Support\Facades\DB;

class incidenciasController extends Controller
{
    public function index(Request $request)
    {
        if ($request->input('busqueda')) { // o $request->input('busqueda')
            $data = $request->input('busqueda');
            $incidencias = DB::table('tbl_incidencias')
                ->join('tbl_users as users', 'users.id', '=', 'tbl_incidencias.id_user')
                ->join('tbl_subcategorias as subcat', 'subcat.id', '=', 'tbl_incidencias.id_subcat')
                ->join('tbl_estados as estado', 'estado.id', '=', 'tbl_incidencias.id_estado')
                ->join('tbl_users as tecnico', 'tecnico.id', '=', 'tbl_incidencias.tecnico')
                ->select('tbl_incidencias.*', 'users.nombre_user', 'subcat.nombre_sub_cat', 'estado.nombre_estado', 'tecnico.nombre_user as tecnico')
                ->where('titulo_inc', 'like', "%$data%")
                ->get();
        } else {
            $incidencias = DB::table('tbl_incidencias')
                ->join('tbl_users as users', 'users.id', '=', 'tbl_incidencias.id_user')
                ->join('tbl_subcategorias as subcat', 'subcat.id', '=', 'tbl_incidencias.id_subcat')
                ->join('tbl_estados as estado', 'estado.id', '=', 'tbl_incidencias.id_estado')
                ->join('tbl_users as tecnico', 'tecnico.id', '=', 'tbl_incidencias.tecnico')
                ->select('tbl_incidencias.*', 'users.nombre_user', 'subcat.nombre_sub_cat', 'estado.nombre_estado', 'tecnico.nombre_user as tecnico')
                ->get();
        }

        return response()->json($incidencias);
    }
}
