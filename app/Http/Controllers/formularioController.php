<?php

namespace App\Http\Controllers;
use App\Models\tbl_subcategorias;
use Illuminate\Http\Request;

class formularioController extends Controller
{
    public function mostrarFormulario()
    {
        $subcategorias = tbl_subcategorias::all();
        return view('form_cliente', compact('subcategorias'));
    }
}
