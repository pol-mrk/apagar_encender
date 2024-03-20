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
    public function index(Request $request)
    {
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
            'tbl_users.nombre_user'
        
        )
        ->join('tbl_users', 'tbl_users.id', '=', 'tbl_incidencias.tecnico')
        ->join('tbl_subcategorias', 'tbl_incidencias.id_subcat', '=', 'tbl_subcategorias.id' )
        ->join('tbl_estados', 'tbl_estados.id', '=', 'tbl_incidencias.id_estado');
        
        
     
    $estados = tbl_estados::select(
        'tbl_estados.id',
        'tbl_estados.nombre_estado'
    )
    ->join('tbl_incidencias', 'tbl_estados.id', '=', 'tbl_incidencias.id_estado')
    ->distinct()
    ->get();
   
    
        // Aplicar filtros si se proporciona un término de búsqueda
        if ($request->input('busqueda')) {
            $data = $request->input('busqueda');
            if ($request->input('estado')) {

                $filtro_estados = $request->input('estado'); 
                    $incidencias     ->Where('titulo_inc', 'like', "%$data%")
                          ->orWhere('desc_inc', 'like', "%$data%")
                          ->orWhere('nombre_estado', 'like', "$filtro_estados%");
                
            } else {
                
                $incidencias->Where('titulo_inc', 'like', "%$data%")
                    ->orWhere('desc_inc', 'like', "%$data%");
            }
            
            
        } else if ($request->input('estado')) {
            $filtro_estados = $request->input('estado');
            if ($request->input('busqueda')) {
                $data = $request->input('busqueda');
                $incidencias = $incidencias->Where('titulo_inc', 'like', "%$data%")
                ->orWhere('desc_inc', 'like', "%$data%")
                ->orWhere('nombre_estado', 'like', "$filtro_estados%");
                
            } else {
               
                $incidencias = $incidencias->where('nombre_estado', 'like', "$filtro_estados%");

            }
        
            // Añadir condición para título y descripción si no se especifica un estado
            
        }
            

    // $estado_seleccionado = $request->input('status_id');
// if ($request -> input('status_id'))
    // Obtener incidencias asociadas al estado seleccionado
    // $estados = tbl_incidencias::whereHas('estado', function($query) use ($estado_seleccionado) {
        // $query->where('nombre_estado', $estado_seleccionado);
    // })->get();
    // $filtro_estados = $request->input('estado');
    // exit();
  
// $filtro_estados = $request->input('estado');
// var_dump($filtro_estados);
// exit();
    // Pasar las incidencias filtradas a la vista para mostrarlas


    //     $orden = $request->select('fecha_inc');
    //     $incidencias = tbl_incidencias::query();

    //     if ($orden == 'asc') {
    //     $incidencias->orderBy('fecha_inc', 'asc');
    // } elseif ($orden == 'desc') {
    //     $incidencias->orderBy('fecha_inc', 'desc');
    // }

      
        


        // Aplicar el ordenamiento según el parámetro recibido
        if ($orden) {
            $parts = explode('_', $orden);
            $campo = $parts[0];
            $direccion = $parts[1];
            $incidencias->orderBy($campo, $direccion);
        }

        // Obtener los resultados después de aplicar los filtros y el ordenamiento
        $incidencias = $incidencias->get();
        $estados = tbl_estados::all();
       
        return response()->json(['incidencias' => $incidencias, 'estados' => $estados]);
        
    }   

    public function mostrar()
    {
        return view('crud_incidencias.index');
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
