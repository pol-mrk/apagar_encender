<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BerlinController extends Controller
{
    public function listarUsuariosSede2()
    {
        // Consultar usuarios con id_sede igual a 2
        $users = DB::table('tbl_users')->where('id_sede', 2)->get();

        // Pasar los usuarios a la vista
        return view('cruds.berlin', ['users' => $users]);
    }
}
