<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Models\Categorias;

class SubcategoriaController extends Controller
{
    public function create()
    {
        // Obtener todas las categorías para pasarlas a la vista
        $categorias = Categorias::all();
        return view('crear_subcategoria', ['categorias' => $categorias]);
    }

    public function store(Request $request)
    {
        // El método store debe contener la lógica para almacenar la subcategoría, ya que create solo renderiza la vista
        // Realizar la validación de los datos del formulario
        $validator = Validator::make($request->all(), [
            'nombre_sub_cat' => 'required|string|max:255',
            'id_categoria' => 'required|integer'
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        // Obtener los datos del formulario
        $nombreSubCat = $request->input('nombre_sub_cat');
        $idCategoria = $request->input('id_categoria');

        // Realizar la inserción en la base de datos
        try {
            DB::table('tbl_subcategorias')->insert([
                'nombre_sub_cat' => $nombreSubCat,
                'id_categoria' => $idCategoria
            ]);

            return "Subcategoría creada correctamente";
        } catch (\Exception $e) {
            return "Error al crear la subcategoría: " . $e->getMessage();
        }
    }
}
