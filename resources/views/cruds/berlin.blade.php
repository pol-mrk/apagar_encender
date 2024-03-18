<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lista de Usuarios</title>
</head>
<body>
  <h2>Lista de Usuarios</h2>

  <table border="1">
    <tr>
      <th>ID</th>
      <th>Nombre</th>
      <th>Apellidos</th>
      <th>Correo Electrónico</th>
      <th>Fecha de inicio</th>
      <th>Fecha de fin</th>
      <th>Rol</th>
      <th>Acciones</th>
    </tr>

    @forelse ($users as $user)
    <tr>
        <td>{{ $user->id }}</td>
        <td>{{ $user->nombre_user }}</td>
        <td>{{ $user->apellidos_user }}</td>
        <td>{{ $user->correo_user }}</td>
        <td>{{ $user->fecha_ini_user }}</td>
        <td>{{ $user->fecha_fin_user }}</td>
        <td>{{ $user->id_rol }}</td>
        <td>
            <a href='editar_usuario/{{ $user->id }}'>Editar</a>
            <a href='dar_baja_usuario/{{ $user->id }}'>Dar de Baja</a>
        </td>
    </tr>
    @empty
    <tr><td colspan="8">No hay usuarios registrados</td></tr>
    @endforelse

  </table>

</body>
</html>
