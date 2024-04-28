<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Usuarios;
use App\Models\Estados;
use App\Models\tbl_estados;
use App\Models\tbl_incidencias;
use App\Models\tbl_subcategorias;
use App\Models\Prioridades;

use Illuminate\Http\Request;

class CrudPolMarcController extends Controller
{
    
    public function index(Request $request)
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
                'tbl_prioridades.nombre_prioridad AS nombre_prioridad',
                'tbl_users.nombre_user'
            )
            ->join('tbl_users', 'tbl_users.id', '=', 'tbl_incidencias.tecnico')
            ->join('tbl_subcategorias', 'tbl_incidencias.id_subcat', '=', 'tbl_subcategorias.id')
            ->join('tbl_estados', 'tbl_estados.id', '=', 'tbl_incidencias.id_estado')
            ->join('tbl_prioridades', 'tbl_prioridades.id', '=', 'tbl_incidencias.id_prioridades')
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
                // ->orderBy('tbl_incidencias.fecha_inc', $filtro['fecha']);
          
          } else if(($filtro['busqueda'] != null)){
            // Obtener el parámetro de orden desde la solicitud
        // $orden = $request->input('orden');
           
        // Obtener todas las incidencias
        // $subcategorias = tbl_subcategorias::all();
        $incidencias = tbl_incidencias::select(
            'tbl_incidencias.id',
            'tbl_incidencias.titulo_inc AS titulo_inc',
            'tbl_incidencias.desc_inc',
            'tbl_incidencias.fecha_inc',
            'tbl_incidencias.foto_inc',
            'tbl_subcategorias.nombre_sub_cat AS nombre_subcat',
            'tbl_prioridades.nombre_prioridad AS nombre_prioridad',
            'tbl_estados.nombre_estado AS nombre_estado',
            'tbl_users.nombre_user'
        )
        ->join('tbl_users', 'tbl_users.id', '=', 'tbl_incidencias.tecnico')
        ->join('tbl_subcategorias', 'tbl_incidencias.id_subcat', '=', 'tbl_subcategorias.id')
        ->join('tbl_estados', 'tbl_estados.id', '=', 'tbl_incidencias.id_estado')
        ->join('tbl_prioridades', 'tbl_prioridades.id', '=', 'tbl_incidencias.id_prioridades')
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
        // Obtener el parámetro de orden desde la solicitud
    // $orden = $request->input('orden');
       
    // Obtener todas las incidencias
    // $subcategorias = tbl_subcategorias::all();
    $incidencias = tbl_incidencias::select(
        'tbl_incidencias.id',
        'tbl_incidencias.titulo_inc AS titulo_inc',
        'tbl_incidencias.desc_inc',
        'tbl_incidencias.fecha_inc',
        'tbl_incidencias.foto_inc',
        'tbl_subcategorias.nombre_sub_cat AS nombre_subcat',
        'tbl_estados.nombre_estado AS nombre_estado',
        'tbl_prioridades.nombre_prioridad AS nombre_prioridad',
        'tbl_users.nombre_user'
    )
    ->join('tbl_users', 'tbl_users.id', '=', 'tbl_incidencias.tecnico')
    ->join('tbl_subcategorias', 'tbl_incidencias.id_subcat', '=', 'tbl_subcategorias.id')
    ->join('tbl_estados', 'tbl_estados.id', '=', 'tbl_incidencias.id_estado')
    ->join('tbl_prioridades', 'tbl_prioridades.id', '=', 'tbl_incidencias.id_prioridades')
    ;
    
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
               
    // ->orderBy('tbl_incidencias.fecha_inc', $filtro['fecha']);
    // if (in_array($filtro['fecha'], ['asc', 'desc'])) {
    //     $incidencias->orderBy('tbl_incidencias.fecha_inc', $filtro['fecha']);
    // }
          } else {
            $incidencias = tbl_incidencias::select(
                'tbl_incidencias.id',
                'tbl_incidencias.titulo_inc AS titulo_inc',
                'tbl_incidencias.desc_inc',
                'tbl_incidencias.fecha_inc',
                'tbl_incidencias.foto_inc',
                'tbl_subcategorias.nombre_sub_cat AS nombre_subcat',
                'tbl_estados.nombre_estado AS nombre_estado',
                'tbl_prioridades.nombre_prioridad AS nombre_prioridad',
                'tbl_users.nombre_user'
            )
            ->join('tbl_users', 'tbl_users.id', '=', 'tbl_incidencias.tecnico')
            ->join('tbl_subcategorias', 'tbl_incidencias.id_subcat', '=', 'tbl_subcategorias.id')
            ->join('tbl_estados', 'tbl_estados.id', '=', 'tbl_incidencias.id_estado')
            ->join('tbl_prioridades', 'tbl_prioridades.id', '=', 'tbl_incidencias.id_prioridades');
        if($filtro['resolta'] == 'Ver Resoltas') {
            $incidencias->where('tbl_estados.nombre_estado', '!=', 'Resolta');

        }

          }

        $incidencias = $incidencias->get();

        $estados = tbl_estados::all();

        return response()->json(['incidencias' => $incidencias, 'estados' => $filtro]);
    }

    public function gestor()
    {
        return view('crud_incidenciaspolmark.indexpolmark');
    }

    // Funciones gestor
    public function show($id){
        $incidencia = tbl_incidencias::select(
            'tbl_incidencias.*', // Selecciona todas las columnas de la tabla incidencias
            'usuario.nombre_user AS nombre_usuario', // Selecciona el nombre de usuario de la tabla usuarios
            'subcategoria.nombre_sub_cat AS nombre_subcategoria',
            'tecnico.nombre_user AS nombre_tecnico',
            'prioridades.nombre_prioridad AS nombre_prioridad',
            'estados.nombre_estado AS nombre_estado'
        )
        ->join('tbl_users AS usuario', 'tbl_incidencias.id_user', '=', 'usuario.id')
        ->join('tbl_users AS tecnico', 'tbl_incidencias.tecnico', '=', 'tecnico.id')
        ->join('tbl_prioridades AS prioridades', 'tbl_incidencias.id_prioridades', '=', 'prioridades.id')
        ->join('tbl_estados AS estados', 'tbl_incidencias.id_estado', '=', 'estados.id')
        ->join('tbl_subcategorias AS subcategoria', 'tbl_incidencias.id_subcat', '=', 'subcategoria.id')
        ->where('tbl_incidencias.id', $id) // Filtra por el ID de la incidencia
        ->first();

        $tecnicos = Usuarios::all();
        $prioridades = Prioridades::all();
        return view('crud_incidenciaspolmark.mostrarpolmarc',compact('incidencia','tecnicos','prioridades'));
    }

    public function update(Request $request, tbl_incidencias $incidencia){
        $incidencia->tecnico = $request->tecnico;
        $incidencia->id_prioridades = $request->prioridad;
        $incidencia->save();
        return redirect()->route('gestor',$incidencia->id);
    }

    //////////////////////////////////////////////////////////////////////////////////////////

    // public function ver($id)
    // {
    //     $incidencias = DB::table('tbl_incidencias')
    //         ->join('tbl_users as users', 'users.id', '=', 'tbl_incidencias.id_user')
    //         ->join('tbl_subcategorias as subcat', 'subcat.id', '=', 'tbl_incidencias.id_subcat')
    //         ->join('tbl_estados as estado', 'estado.id', '=', 'tbl_incidencias.id_estado')
    //         ->leftJoin('tbl_users as tecnico', 'tecnico.id', '=', 'tbl_incidencias.tecnico')
    //         ->select('tbl_incidencias.*', 'users.nombre_user', 'subcat.nombre_sub_cat', 'estado.nombre_estado', 'tecnico.nombre_user as nombre_tecnico')
    //         ->where('tbl_incidencias.id', $id)
    //         ->get();

    //     return view('crud_incidencias.ver', compact('incidencias'));
    // }
}
