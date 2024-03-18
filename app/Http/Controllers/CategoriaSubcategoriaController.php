<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoriaSubcategoriaController extends Controller
{
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'nombre_cat' => 'required|string|max:255',
            'nombre_sub_cat' => 'required|string|max:255',
        ]);

        // Obtener los datos del formulario
        $nombreCat = $request->input('nombre_cat');
        $nombreSubCat = $request->input('nombre_sub_cat');

        // Realizar la inserción en la base de datos
        try {
            // Iniciar una transacción
            DB::beginTransaction();

            // Insertar los datos de la categoría
            $idCategoria = DB::table('tbl_categorias')->insertGetId([
                'nombre_cat' => $nombreCat
            ]);

            // Insertar los datos de la subcategoría
            DB::table('tbl_subcategorias')->insert([
                'nombre_sub_cat' => $nombreSubCat,
                'id_categoria' => $idCategoria
            ]);

            // Commit de la transacción
            DB::commit();

            return "Los datos se han guardado correctamente.";
        } catch (\Exception $e) {
            // Rollback de la transacción en caso de error
            DB::rollBack();
            
            return "Error al guardar los datos: " . $e->getMessage();
        }
    }
}
