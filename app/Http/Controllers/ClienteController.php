<?php

namespace App\Http\Controllers;

use App\Models\tbl_incidencias;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
            'file' => 'required|image',
            'id_subcat' => 'required',
            'id_estado' => 'required',
        ]);
        
        if ($request->hasFile('file')) {
        // Guardar la imagen
        $imagenPath = $request->file('file')->store('public/img');
    } else {
        // Manejar el caso en el que no se envió ningún archivo 'file'
        return redirect()->back()->withInput()->withErrors(['file' => 'No se seleccionó ningún archivo.']);
    }
        // Obtener la URL de la imagen
        $url = Storage::url($imagenPath);

        $incidencia = new tbl_incidencias();

        $incidencia->titulo_inc = $request->titulo_inc;
        $incidencia->desc_inc = $request->desc_inc;
        $incidencia->fecha_inc = $request->fecha_inc;
        $incidencia->foto_inc = $url;
        $incidencia->id_subcat = $request->id_subcat;
        $incidencia->id_estado = $request->id_estado;
        $incidencia->id_prioridades = 1;
        $incidencia->tecnico = 1;

        // Obtener el ID del usuario autenticado
        $incidencia->id_user = auth()->id();

        $incidencia->save();

        return view('crud_incidencias');
    }

    public function show($cliente)
    {
        // Forma de pasar una variable
        return view('form_cliente.show', compact('cliente'));
    }
}
