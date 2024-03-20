<?php

namespace App\Http\Controllers;

use App\Models\tbl_incidencias;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function index()
    {
        return view('form_cliente.index');
    }

    public function create()
    {
        return view('form_cliente.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo_inc' => 'required|min:3',
            'desc_inc' => ['required', 'min:10'],
            'fecha_inc' => 'required',
            'foto_inc' => 'required',
            'id_subcat' => 'required',
            'id_user' => 'required',
            'id_estado' => 'required',
            'tecnico' => 'required'
        ]);

        $incidencia = new tbl_incidencias();

        $incidencia->titulo_inc = $request->titulo_inc;
        $incidencia->desc_inc = $request->desc_inc;
        $incidencia->fecha_inc = $request->fecha_inc;
        $incidencia->foto_inc = $request->foto_inc;
        $incidencia->id_subcat = $request->id_subcat;
        $incidencia->id_user = $request->id_user;
        $incidencia->id_estado = $request->id_estado;
        $incidencia->tecnico = $request->tecnico;

        $incidencia->save();
    }

    public function show($cliente)
    {
        // Forma de pasar una variable
        return view('form_cliente.show', compact('cliente'));
    }
}
