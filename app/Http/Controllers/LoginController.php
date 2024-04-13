<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuarios;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function sedes()
    {
        return view('sedes');
    }

    public function login(Request $request){

    // Validar los datos del formulario
    $request->validate([
        'correo_user' => 'required|email',
        'pwd_user' => 'required',
    ]);

    // Recuperar datos del formulario
    $email = $request->input('correo_user');
    $pwd = $request->input('pwd_user');

    // Recuperar usuario por correo electronico usando Eloquent
    $user = Usuarios::where('correo_user', $email)->first();
 
    if ($user) {
        $pwd_encriptada = $user->pwd_user;
        // Verificar si la contraseña ingresada coincide con la contraseña encriptada en la base de datos
        if (password_verify($pwd, $pwd_encriptada)) {
            // Autenticación exitosa
            Auth::login($user);
            // Redirigir al usuario según su rol
            if ($user->id_rol == 1) {
                return redirect()->route('sedes');
            } elseif ($user->id_rol == 2) {
                return redirect()->route('mostrar');
            } elseif ($user->id_rol == 3) {
                return redirect()->route('tecnico.index');
            } elseif ($user->id_rol == 4) {
                return redirect()->route('mostrar');
            }
        }
    }

    // Autenticación fallida
    return redirect()->route('login')->with('error', 'errorpwd');
}


    public function logout()
    {
        // Cerrar sesión
        Auth::logout();
        return redirect()->route('login');
    }
}
