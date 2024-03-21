<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tbl_incidencias;
use App\Models\tbl_estados;
use App\Models\tbl_chats;


use Illuminate\Support\Facades\DB;

class incidenciasController extends Controller
{
    public function index(Request $request)
    {
        $estados = tbl_estados::all();
        if ($request->input('incidencia') || $request->input('usuario') || $request->input('estado')) {
            $incidencia = $request->input('incidencia');
            $query = DB::table('tbl_incidencias')
                ->join('tbl_users as users', 'users.id', '=', 'tbl_incidencias.id_user')
                ->join('tbl_subcategorias as subcat', 'subcat.id', '=', 'tbl_incidencias.id_subcat')
                ->join('tbl_estados as estado', 'estado.id', '=', 'tbl_incidencias.id_estado')
                ->join('tbl_users as tecnico', 'tecnico.id', '=', 'tbl_incidencias.tecnico')
                ->select('tbl_incidencias.*', 'users.nombre_user', 'subcat.nombre_sub_cat', 'estado.nombre_estado', 'tecnico.nombre_user as nombre_tecnico');
            if ($request->input('usuario')) {
                $usuario = $request->input('usuario');
                if ($request->input('estado')) {
                    $estado = $request->input('estado');
                    $query->where('titulo_inc', 'like', "%$incidencia%")->where('users.nombre_user', 'like', "%$usuario%")->where('tbl_incidencias.id_estado', 'like', "%$estado%");
                } else {
                    $query->where('titulo_inc', 'like', "%$incidencia%")->where('users.nombre_user', 'like', "%$usuario%");
                }
            } elseif ($request->input('estado')) {
                $estado = $request->input('estado');
                $query->where('tbl_incidencias.id_estado', 'like', "%$estado%");
            } else {
                $query->where('titulo_inc', 'like', "%$incidencia%");
            }

            $incidencia = $query->get();
        } else {
            $incidencia = DB::table('tbl_incidencias')
                ->join('tbl_users as users', 'users.id', '=', 'tbl_incidencias.id_user')
                ->join('tbl_subcategorias as subcat', 'subcat.id', '=', 'tbl_incidencias.id_subcat')
                ->join('tbl_estados as estado', 'estado.id', '=', 'tbl_incidencias.id_estado')
                ->leftJoin('tbl_users as tecnico', 'tecnico.id', '=', 'tbl_incidencias.tecnico')
                ->select('tbl_incidencias.*', 'users.nombre_user', 'subcat.nombre_sub_cat', 'estado.nombre_estado', 'tecnico.nombre_user as nombre_tecnico')
                ->orderBy('tbl_incidencias.id', 'asc')
                ->get();
        }
        return response()->json(['incidencias' => $incidencia, 'estados' => $estados]);
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

        $mensaje = tbl_chats::select("*")->where('incidencia', $id)->where('emisor', $id_user)->where('receptor', 1)->orwhere('incidencia', $id)
            ->where('emisor', 1)
            ->where('receptor', $id_user)

            // $mensajes = tbl_chats::where(function ($query) use ($id, $id_user) {
            //     $query->where('incidencia', $id)
            //         ->where('emisor', $id_user)
            //         ->where('receptor', 1);
            // })
            // ->orWhere(function ($query) use ($id, $id_user) {
            //     $query->where('incidencia', $id)
            //         ->where('emisor', 1)
            //         ->where('receptor', $id_user);
            // })
            ->get();
        return view('tecnico.chat', compact('incidencias', 'estados', 'mensajes'));
    }

    public function envmensaje(Request $request)
    {
        $idmensaje = $request->input('idincidencia');
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
