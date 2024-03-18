<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Usuarios;

class UserController extends Controller
{
    public function store(Request $request)
    {
        // Validación de datos del formulario (puedes añadir más validaciones según tus necesidades)
        $request->validate([
            'nombre_user' => 'required|string',
            'apellidos_user' => 'required|string',
            'correo_user' => 'required|email|unique:users',
            'contrasena_user' => 'required|string',
            'fecha_ini_user' => 'required|date',
            'fecha_fin_user' => 'required|date',
            'id_rol' => 'required|integer',
            'id_sede' => 'required|integer',
        ]);

        // Crear un nuevo usuario en la base de datos
        $user = new Usuarios();
        $user->nombre_user = $request->nombre_user;
        $user->apellidos_user = $request->apellidos_user;
        $user->correo_user = $request->correo_user;
        $user->pwd_user = Hash::make($request->contrasena_user);
        $user->fecha_ini_user = $request->fecha_ini_user;
        $user->fecha_fin_user = $request->fecha_fin_user;
        $user->id_rol = $request->id_rol;
        $user->id_sede = $request->id_sede;
        $user->save();

        return response()->json(['message' => 'Usuario registrado correctamente'], 201);
    }
}
