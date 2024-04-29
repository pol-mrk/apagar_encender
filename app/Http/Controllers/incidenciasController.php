<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tbl_incidencias;
use App\Models\tbl_estados;
use App\Models\tbl_chats;


use Illuminate\Support\Facades\DB;

class incidenciasController extends Controller
{
    public function tecnicoIndex()
    {
        return view('tecnico.index');
    }

    public function index(Request $request)
    {
        $id_user = session('id_user');
        $id_sede = session('id_sede');
        $estados = tbl_estados::all();
        $connsulta = DB::table('tbl_incidencias')
            ->join('tbl_users as users', 'users.id', '=', 'tbl_incidencias.id_user')
            ->join('tbl_subcategorias as subcat', 'subcat.id', '=', 'tbl_incidencias.id_subcat')
            ->join('tbl_estados as estado', 'estado.id', '=', 'tbl_incidencias.id_estado')
            ->join('tbl_users as tecnico', 'tecnico.id', '=', 'tbl_incidencias.tecnico')
            ->join('tbl_prioridades', 'tbl_prioridades.id', '=', 'tbl_incidencias.id_prioridades')
            ->select('tbl_incidencias.*', 'users.nombre_user', 'subcat.nombre_sub_cat', 'estado.nombre_estado', 'tecnico.nombre_user as nombre_tecnico','tecnico.id_sede as sede')
            ->where('tecnico.id_sede', $id_sede)           //Id de la sesion
            ->where('tecnico.id', $id_user)
            ->where('tecnico', 1)
            ->where('estado.id', '>', 1)
            ->orderBy('tbl_incidencias.id_prioridades', 'desc');

        if ($request->input('usuario')) {
            $usuario = $request->input('usuario');
            $connsulta->where('users.nombre_user', 'like', "%$usuario%");
        }

        if ($request->input('incidencia')) {
            $incidencia = $request->input('incidencia');
            $connsulta->where('tbl_incidencias.titulo_inc', 'like', "%$incidencia%");
        }

        if ($request->input('estado')) {
            if ($request->input('estado') != "[object KeyboardEvent]") {
                $estado = $request->input('estado');
                $connsulta->where('tbl_incidencias.id_estado', $estado);
            }
        }

        $incidencias = $connsulta->get();
        return response()->json(['incidencias' => $incidencias, 'estados' => $estados]);
    }


    public function estado(Request $request)
    {
        $id = $request->input('idp');
        $estado = $request->input('estado');

        $resultado = tbl_incidencias::find($id);
        $resultado->id_estado = $estado;
        $resultado->save();
        echo "ok";
    }

    public function chat($id)
    {
        $estados = tbl_estados::all();
        $incidencias = DB::table('tbl_incidencias')
            ->join('tbl_users as users', 'users.id', '=', 'tbl_incidencias.id_user')
            ->join('tbl_subcategorias as subcat', 'subcat.id', '=', 'tbl_incidencias.id_subcat')
            ->join('tbl_estados as estado', 'estado.id', '=', 'tbl_incidencias.id_estado')
            ->leftJoin('tbl_users as tecnico', 'tecnico.id', '=', 'tbl_incidencias.tecnico')
            ->select('tbl_incidencias.*', 'users.nombre_user', 'subcat.nombre_sub_cat', 'estado.nombre_estado', 'tecnico.nombre_user as nombre_tecnico')
            ->where('tbl_incidencias.id', $id)
            ->get();

        $incidencia = $incidencias[0];
        $id_user = $incidencia->id_user;

        $mensajes = tbl_chats::select("*")
            ->where('incidencia', $id)
            ->where('emisor', $id_user)
            ->where('receptor', 1)
            ->orwhere('emisor', 1)
            ->where('receptor', $id_user)
            ->get();
        return view('tecnico.chat', compact('incidencias', 'estados', 'mensajes'));
    }
















    public function envmensaje(Request $request)
    {
        +$idmensaje = $request->input('idincidencia');
        $iduser = $request->input('iduser');
        $mensaje = $request->input('msj');

        $resultado = new tbl_chats();
        $resultado->incidencia = $idmensaje;
        if ($iduser != 1) {
            $resultado->receptor = $iduser;
            $resultado->emisor = 1;
        } else {
            $resultado->receptor = 1;
            $resultado->emisor = $iduser;
        }
        $resultado->mensaje = $mensaje;
        $resultado->save();
        echo "ok";
    }
}
