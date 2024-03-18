<?php

namespace App\Http\Controllers;

use App\Models\tbl_incidencias;
use App\Models\tbl_subcategorias;
use Illuminate\Http\Request;

class CrudController extends Controller
{
    public function index(Request $request){
        // Obtener el parámetro de orden desde la solicitud
        $orden = $request->input('orden');

        // Obtener todas las incidencias
        // $subcategorias = tbl_subcategorias::all();
        $incidencias = tbl_incidencias::select(
            'tbl_incidencias.id',
            'tbl_incidencias.titulo_inc AS titulo_inc',
            'tbl_incidencias.desc_inc',
            'tbl_incidencias.fecha_inc',
            'tbl_incidencias.foto_inc',
            'tbl_subcategorias.nombre_sub_cat AS nombre_subcat',
            'tbl_estados.nombre_estado AS id_estado',
            'tbl_users.nombre_user AS id_user' // Quité la coma al final de esta línea
        
        )
        ->join('tbl_users', 'tbl_users.id', '=', 'tbl_incidencias.id_user')
        ->join('tbl_subcategorias', 'tbl_incidencias.id_subcat', '=', 'tbl_subcategorias.id' )
        ->join('tbl_estados', 'tbl_estados.id', '=', 'tbl_incidencias.id_estado')
        ->first();
        
    
    
        // Aplicar filtros si se proporciona un término de búsqueda
        if ($request->input('busqueda')) {
            $data = $request->input('busqueda');
            $incidencias->where('id', 'like', "%$data%")
                ->orWhere('titulo_inc', 'like', "%$data%")
                ->orWhere('desc_inc', 'like', "%$data%");
        }


        // Aplicar el ordenamiento según el parámetro recibido
        if ($orden) {
            $parts = explode('_', $orden);
            $campo = $parts[0];
            $direccion = $parts[1];
            $incidencias->orderBy($campo, $direccion);
        }

        // Obtener los resultados después de aplicar los filtros y el ordenamiento
        $incidencias = $incidencias->get();

        // Devolver los resultados en formato JSON
        return response()->json($incidencias);
    }

    public function mostrar()
    {
        return view('crud_incidencias.index');
    }

    public function ver() {
        return view('crud_incidencias.ver');
    }
}
