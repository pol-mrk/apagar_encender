<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuarios; // Asegúrate de importar el modelo User si lo estás utilizando
use Illuminate\Support\Facades\DB;

class SearchUserController extends Controller
{
    public function search(Request $request)
    {
        // Obtener los parámetros de búsqueda
        $nombre = $request->input('nombre') ?? '';
        $apellidos = $request->input('apellidos') ?? '';
        $fecha_inicio = $request->input('fecha_inicio') ?? '';
        $fecha_fin = $request->input('fecha_fin') ?? '';
        $rol = $request->input('rol') ?? '';

        // Construir la consulta SQL con el filtro correspondiente
        $query = DB::table('tbl_users')->where('id_sede', '=', 1);

        if (!empty($nombre)) {
            $query->where('nombre_user', 'like', '%' . $nombre . '%');
        }

        if (!empty($apellidos)) {
            $query->where('apellidos_user', 'like', '%' . $apellidos . '%');
        }

        if (!empty($fecha_inicio)) {
            $query->where('fecha_ini_user', '>=', $fecha_inicio);
        }

        if (!empty($fecha_fin)) {
            $query->where('fecha_fin_user', '<=', $fecha_fin);
        }

        if (!empty($rol)) {
            $query->where('id_rol', '=', $rol);
        }

        $results = $query->get();

        // Generar el HTML de la tabla actualizada
        if ($results->count() > 0) {
            foreach ($results as $row) {
                echo "<tr>
                        <td>{$row->id}</td>
                        <td>{$row->nombre_user}</td>
                        <td>{$row->apellidos_user}</td>
                        <td>{$row->correo_user}</td>
                        <td>{$row->fecha_ini_user}</td>
                        <td>{$row->fecha_fin_user}</td>
                        <td>{$row->id_rol}</td>
                        <td>
                            <a href='editar_usuario.php?id={$row->id}'>Editar</a>
                            <a href='dar_baja_usuario.php?id={$row->id}'>Dar de Baja</a>
                        </td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='7'>No se encontraron usuarios con los filtros seleccionados</td></tr>";
        }
    }
}
