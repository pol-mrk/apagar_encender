<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Usuarios;
use App\Models\Estados;
use App\Models\tbl_estados;
use App\Models\tbl_incidencias;
use App\Models\tbl_subcategorias;

use Illuminate\Http\Request;

class CrudController extends Controller
{
    
    public function incidencia(Request $request)
    {
        $filtro=$request->except('_token');
    
        if ($filtro['estado'] != '0') {
            $incidencias = tbl_incidencias::select(
                'tbl_incidencias.id',
                'tbl_incidencias.titulo_inc AS titulo_inc',
                'tbl_incidencias.desc_inc',
                'tbl_incidencias.fecha_inc',
                'tbl_incidencias.foto_inc',
                'tbl_subcategorias.nombre_sub_cat AS nombre_subcat',
                'tbl_estados.nombre_estado AS nombre_estado',
                'tbl_users.nombre_user'
            )
            ->join('tbl_users', 'tbl_users.id', '=', 'tbl_incidencias.tecnico')
            ->join('tbl_subcategorias', 'tbl_incidencias.id_subcat', '=', 'tbl_subcategorias.id')
            ->join('tbl_estados', 'tbl_estados.id', '=', 'tbl_incidencias.id_estado')
            ->where('tbl_incidencias.id_estado', 'like', '%'.$filtro['estado'].'%');
          

if($filtro['busqueda'] != null){
   $incidencias ->where('tbl_incidencias.titulo_inc', 'like', '%'.$filtro['busqueda'].'%');
}
if($filtro['resolta'] == 'Ver Resoltas') {
    $incidencias->where('tbl_estados.nombre_estado', '!=', 'Resolta');

}       
// Verificar si el filtro de fecha es válido y aplicar la ordenación correspondiente
if (in_array($filtro['fecha'], ['asc', 'desc'])) {
    $incidencias->orderBy('tbl_incidencias.fecha_inc', $filtro['fecha']);
}
          
          } else if(($filtro['busqueda'] != null)){

        $incidencias = tbl_incidencias::select(
            'tbl_incidencias.id',
            'tbl_incidencias.titulo_inc AS titulo_inc',
            'tbl_incidencias.desc_inc',
            'tbl_incidencias.fecha_inc',
            'tbl_incidencias.foto_inc',
            'tbl_subcategorias.nombre_sub_cat AS nombre_subcat',
            'tbl_estados.nombre_estado AS nombre_estado',
            'tbl_users.nombre_user'
        )
        ->join('tbl_users', 'tbl_users.id', '=', 'tbl_incidencias.tecnico')
        ->join('tbl_subcategorias', 'tbl_incidencias.id_subcat', '=', 'tbl_subcategorias.id')
        ->join('tbl_estados', 'tbl_estados.id', '=', 'tbl_incidencias.id_estado')
        ->where('tbl_incidencias.titulo_inc', 'like', '%'.$filtro['busqueda'].'%');
       
        if($filtro['estado']!= '0') {
 $incidencias ->where('tbl_incidencias.id_estado', 'like', '%'.$filtro['estado'].'%');
        }
        if($filtro['resolta'] == 'Ver Resoltas') {
            $incidencias->where('tbl_estados.nombre_estado', '!=', 'Resolta');

        }
        if (in_array($filtro['fecha'], ['asc', 'desc'])) {
            $incidencias->orderBy('tbl_incidencias.fecha_inc', $filtro['fecha']);
        }

    } else if(($filtro['fecha'] != '0')){

    $incidencias = tbl_incidencias::select(
        'tbl_incidencias.id',
        'tbl_incidencias.titulo_inc AS titulo_inc',
        'tbl_incidencias.desc_inc',
        'tbl_incidencias.fecha_inc',
        'tbl_incidencias.foto_inc',
        'tbl_subcategorias.nombre_sub_cat AS nombre_subcat',
        'tbl_estados.nombre_estado AS nombre_estado',
        'tbl_users.nombre_user'
    )
    ->join('tbl_users', 'tbl_users.id', '=', 'tbl_incidencias.tecnico')
    ->join('tbl_subcategorias', 'tbl_incidencias.id_subcat', '=', 'tbl_subcategorias.id')
    ->join('tbl_estados', 'tbl_estados.id', '=', 'tbl_incidencias.id_estado');
    
    if($filtro['busqueda'] != null){
        $incidencias ->where('tbl_incidencias.titulo_inc', 'like', '%'.$filtro['busqueda'].'%');
     }

    if($filtro['estado']!= '0') {
        $incidencias ->where('tbl_incidencias.id_estado', 'like', '%'.$filtro['estado'].'%');
               }
               if($filtro['resolta'] == 'Ver Resoltas') {
                $incidencias->where('tbl_estados.nombre_estado', '!=', 'Resolta');
    
            }
               $incidencias->orderBy('tbl_incidencias.fecha_inc', $filtro['fecha']);
               
          } else {
            $incidencias = tbl_incidencias::select(
                'tbl_incidencias.id',
                'tbl_incidencias.titulo_inc AS titulo_inc',
                'tbl_incidencias.desc_inc',
                'tbl_incidencias.fecha_inc',
                'tbl_incidencias.foto_inc',
                'tbl_subcategorias.nombre_sub_cat AS nombre_subcat',
                'tbl_estados.nombre_estado AS nombre_estado',
                'tbl_users.nombre_user'
            )
            ->join('tbl_users', 'tbl_users.id', '=', 'tbl_incidencias.tecnico')
            ->join('tbl_subcategorias', 'tbl_incidencias.id_subcat', '=', 'tbl_subcategorias.id')
            ->join('tbl_estados', 'tbl_estados.id', '=', 'tbl_incidencias.id_estado');
        if($filtro['resolta'] == 'Ver Resoltas') {
            $incidencias->where('tbl_estados.nombre_estado', '!=', 'Resolta');

        }

          }

        $incidencias = $incidencias->get();


        $estados = tbl_estados::all();

        return response()->json(['incidencias' => $incidencias, 'estados' => $filtro]);
    }

    public function mostrar()
    {
        return view('crud_incidencias.crud_incidencias');
    }

    public function ver($id)
    {
        $incidencias = DB::table('tbl_incidencias')
            ->join('tbl_users as users', 'users.id', '=', 'tbl_incidencias.id_user')
            ->join('tbl_subcategorias as subcat', 'subcat.id', '=', 'tbl_incidencias.id_subcat')
            ->join('tbl_estados as estado', 'estado.id', '=', 'tbl_incidencias.id_estado')
            ->leftJoin('tbl_users as tecnico', 'tecnico.id', '=', 'tbl_incidencias.tecnico')
            ->select('tbl_incidencias.*', 'users.nombre_user', 'subcat.nombre_sub_cat', 'estado.nombre_estado', 'tecnico.nombre_user as nombre_tecnico')
            ->where('tbl_incidencias.id', $id)
            ->get();

        return view('crud_incidencias.ver', compact('incidencias'));
    }
}
