@extends('layouts.plantilla')
@section('title', 'Crear usuario')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
@section('content')
    <br><br><br>
    <div id="section1" style="color: white; padding-left: 30px; padding-right: 30px;">
        <h1>Registro de Nuevo Usuario</h1>
        <div class="flex">
            <a href="javascript:history.back()" class="detalles">Volver</a>
        </div>
        <br>
        <form action="{{ route('registro-usuario') }}" method="post" onsubmit="return validarFormulario()">
            @csrf

            <label for="nombre_user">Nombre:</label>
            <input type="text" name="nombre_user" class="label2"><br>

            <label for="apellidos_user">Apellidos:</label>
            <input type="text" name="apellidos_user" class="label2"><br>

            <label for="correo_user">Correo Electrónico:</label>
            <input type="email" name="correo_user" class="label2"><br>

            <label for="fecha_ini_user">Fecha de Inicio:</label>
            <input type="date" name="fecha_ini_user" class="label2"><br>

            <label for="fecha_fin_user">Fecha de Fin:</label>
            <input type="date" name="fecha_fin_user" class="label2"><br>

            <label for="contrasena_user">Contraseña:</label>
            <input type="password" name="contrasena_user" class="label2"><br>
            
            <label for="id_rol" >Rol:</label>
            <select name="id_rol" class="label2" required><br>
                <option value="1">Administrador</option>
                <option value="2">Cliente</option>
                <option value="3">Gestor de Equipo</option>
                <option value="4">Técnico</option>
            </select><br>

            <label for="id_sede">Sede:</label>
            <select name="id_sede" class="label2" required><br>
                <option value="1">Barcelona</option>
                <option value="2">Berlín</option>
                <option value="3">Montreal</option>
            </select>
            <br><br>
            <div class="flex">
                <button type="submit" class="buscar2">Registrar Usuario</button>
            </div>

        </form>

        <script src="{{ asset('js/validaciones_form.user.js') }}"></script>
    </div>
    <link rel="stylesheet" href="{{asset('css/style2.css')}}">
@endsection