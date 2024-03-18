<?php

namespace App\Http\Controllers;

use App\Models\Incidencias;
use Illuminate\Http\Request;

class GestorController extends Controller
{
    public function index() {
        $incidencias = Incidencias::select(
            'tbl_incidencias.id',
            'tbl_incidencias.titulo_inc',
            'tbl_users.nombre_user AS nombre_usuario',
            'tbl_subcategorias.nombre_sub_cat AS nombre_subcategoria',
            'tbl_incidencias.id_estado'
        )
        ->join('tbl_users', 'tbl_users.id', '=', 'tbl_incidencias.id_user')
        ->paginate(20);
        return view('index',compact('incidencias'));
    }

    public function show($id){
        $incidencia = Incidencias::select(
            'tbl_incidencias.*', // Selecciona todas las columnas de la tabla incidencias
            'usuario.nombre_user AS nombre_usuario', // Selecciona el nombre de usuario de la tabla usuarios
            'subcategoria.nombre_sub_cat AS nombre_subcategoria',
            'tecnico.nombre_user AS nombre_tecnico'
        )
        ->join('tbl_users AS usuario', 'tbl_incidencias.id_user', '=', 'usuario.id')
        ->join('tbl_users AS tecnico', 'tbl_incidencias.tecnico', '=', 'tecnico.id')
        ->join('tbl_subcategorias as subcategoria', 'tbl_incidencias.id_subcat', '=', 'subcategoria.id')
        ->where('tbl_incidencias.id', $id) // Filtra por el ID de la incidencia
        ->first();
        return view('show',compact('incidencia'));
    }

    public function create(){
        return view('create');
    }

    public function store(Request $request){
        $incidencia=new Incidencias;
        $incidencia->titulo = $request->titulo_inc;
        $incidencia->genero = $request->descripcion_inc;
        $incidencia->coleccions = $request->fecha_inc;
        // return ($incidencia);
        $incidencia->save();
        return redirect()->route('show',$incidencia->id);
    }

    public function edit($id) {
        $incidencia = Incidencias::find($id);
        return view('edit',compact('incidencia'));
    }

    public function update(Request $request, Incidencias $incidencia){
        $incidencia->titulo_inc = $request->titulo_inc;
        $incidencia->descripcion_inc = $request->descripcion_inc;
        $incidencia->fecha_inc = $request->fecha_inc;
        $incidencia->save();
        return redirect()->route('show',$incidencia->id);
    }

}
