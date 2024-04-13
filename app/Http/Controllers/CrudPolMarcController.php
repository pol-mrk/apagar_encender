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
                'tbl_users.nombre_user'
            )
            ->join('tbl_users', 'tbl_users.id', '=', 'tbl_incidencias.tecnico')
            ->join('tbl_subcategorias', 'tbl_incidencias.id_subcat', '=', 'tbl_subcategorias.id')
            ->join('tbl_estados', 'tbl_estados.id', '=', 'tbl_incidencias.id_estado');
        if($filtro['resolta'] == 'Ver Resoltas') {
            $incidencias->where('tbl_estados.nombre_estado', '!=', 'Resolta');

        }

          }
       
   
    
      

        // if ($request->input('busqueda')) {
        //     $data = $request->input('busqueda');
        //     ->Where('titulo_inc', 'like', "%$filtro%")
        //     ->Where('desc_inc', 'like', "%$filtro%")
        //     ->Where('fecha_inc', 'like', "%$filtro%")
        //     ->Where('nombre_estado', 'like', "$filtro_estados%");
        // }
           
        // if ($request->input('fecha')) {
        //     $fecha = $request->input('fecha');
        //     $incidencias->orderBy('desc_inc', $fecha);
        // }

        $incidencias = $incidencias->get();

        



        // public function usuarios_listar(Request $request){
        //     $filtro=$request->except('_token');
        //     $consulta1= usuario::Where('id','like','%'.$filtro['buscar_id'].'%')->where('nombre','like','%'.$filtro['buscar_nombre'].'%')
        //     ->where('correo','like','%'.$filtro['buscar_correo'].'%')->where('tipo_usuario',0)->get();
        //    $consulta2= categoria::Where('id','like','%'.$filtro['buscar_id'].'%')->where('nombre_categoria','like','%'.$filtro['buscar_nombre'].'%')->orderByDesc('id')->take(4)->get();
    
    
        //      return response()->json([
        //         'consulta1' => $consulta1,
        //         'consulta2' => $consulta2
        //     ]);
        // }

        


        // Aplicar filtros si se proporciona un término de búsqueda
        // if ($request->input('busqueda')) {
        //     $data = $request->input('busqueda');
        //     if ($request->input('estado')) {

        //         $filtro_estados = $request->input('estado');
        // $incidencias->Where('titulo_inc', 'like', "%$data%");
        //             ->orWhere('desc_inc', 'like', "%$data%")
        //             ->orWhere('fecha_inc', 'like', "%$data%")
        //             ->orWhere('nombre_estado', 'like', "$filtro_estados%");
        //     } elseif ($request->input('fecha')) {
        //         $fecha = $request->input('fecha');
        //     } else {

        //         $incidencias->Where('titulo_inc', 'like', "%$data%")
        //             ->orWhere('desc_inc', 'like', "%$data%");
        //     }
        // } else if ($request->input('estado')) {
        //     $filtro_estados = $request->input('estado');
        //     if ($request->input('busqueda')) {
        //         $data = $request->input('busqueda');
        //         $incidencias = $incidencias->Where('titulo_inc', 'like', "%$data%")
        //             ->orWhere('desc_inc', 'like', "%$data%")
        //             ->orWhere('fecha_inc', 'like', "%$data%")
        //             ->orWhere('nombre_estado', 'like', "$filtro_estados%");
        //     } else {

        //         $incidencias = $incidencias->where('nombre_estado', 'like', "$filtro_estados%");
        //     }
        // }


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
        // if ($orden) {
        //     $parts = explode('_', $orden);
        //     $campo = $parts[0];
        //     $direccion = $parts[1];
        //     $incidencias->orderBy($campo, $direccion);
        // }

        // Obtener los resultados después de aplicar los filtros y el ordenamiento
        // $incidencias = $incidencias->get();

        $estados = tbl_estados::all();

        return response()->json(['incidencias' => $incidencias, 'estados' => $filtro]);
    }

    public function gestor()
    {
        return view('crud_incidencias.index');
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
        return view('crud_incidencias.mostrar',compact('incidencia','tecnicos','prioridades'));
    }

    public function update(Request $request, tbl_incidencias $incidencia){
        $incidencia->tecnico = $request->tecnico;
        $incidencia->id_prioridades = $request->prioridad;
        $incidencia->save();
        return redirect()->route('show',$incidencia->id);
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
