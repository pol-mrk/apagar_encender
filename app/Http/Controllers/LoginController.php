<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuarios;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('correo_user', 'pwd_user');

        $usuario = Usuarios::where('correo_user', $credentials['correo_user'])->first();

        if ($usuario && $credentials['pwd_user'] === $usuario->pwd_user) {
            // Inicio de sesión exitoso
            // Redirige dependiendo del ID del usuario
            if ($usuario->id == 1) {
                return redirect()->route('ruta_para_usuario_1');
            } elseif ($usuario->id == 2) {
                return redirect()->route('ruta_para_usuario_2');
            } elseif ($usuario->id == 3) {
                return redirect()->route('ruta_para_usuario_3');
            } else {
                // Si no se especifica una ruta para el ID de usuario dado, redirige a una ruta por defecto
                return redirect()->route('default_route');
            }
        } else {
            // Error en las credenciales de inicio de sesión
            return back()->withInput()->withErrors(['correo_user' => 'Correo electrónico o contraseña incorrectos']);
        }
    }

    public function logout()
    {
        // Código para cerrar sesión
        // Esto puede variar dependiendo del sistema de autenticación que estés utilizando
        // Por ejemplo, si estás utilizando el paquete Laravel Jetstream, puedes usar Auth::logout();
    }
}
