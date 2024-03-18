<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>
    <h2>Registro de Nuevo Usuario</h2>

    <form action="{{ route('registro-usuario') }}" method="post" onsubmit="return validarFormulario()">

        <label for="nombre_user">Nombre:</label>
        <input type="text" name="nombre_user"><br>

        <label for="apellidos_user">Apellidos:</label>
        <input type="text" name="apellidos_user"><br>

        <label for="correo_user">Correo Electrónico:</label>
        <input type="email" name="correo_user"><br>

        <label for="fecha_ini_user">Fecha de Inicio:</label>
        <input type="date" name="fecha_ini_user"><br>

        <label for="fecha_fin_user">Fecha de Fin:</label>
        <input type="date" name="fecha_fin_user"><br>

        <label for="contrasena_user">Contraseña:</label>
        <input type="password" name="contrasena_user"><br>
        
        <label for="id_rol" required>Rol:</label>
        <select name="id_rol"><br>
            <option value="1">Administrador</option>
            <option value="2">Cliente</option>
            <option value="3">Gestor de Equipo</option>
            <option value="4">Técnico</option>
        </select><br>

        <label for="id_sede">Sede:</label>
        <select name="id_sede" required><br>
            <option value="1">Barcelona</option>
            <option value="2">Berlín</option>
            <option value="3">Montreal</option>
        </select><br>

        <button type="submit">Registrar Usuario</button>

    </form>

    <script src="{{ asset('js/validaciones_form.user.js') }}"></script>
</body>
</html>