<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lista de Usuarios</title>
</head>
<body>
  <h2>Lista de Usuarios Barcelona</h2>

  <form id="search-form" action="{{ route('barcelonasearch.users') }}" method="GET">
    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" name="nombre">

    <button type="submit">Buscar</button>
</form>

<form id="search-form1" action="{{ route('barcelonasearch.users') }}" method="GET">
    <label for="apellidos">Apellidos:</label>
    <input type="text" id="apellidos" name="apellidos">

    <button type="submit">Buscar</button>
</form>

<form id="search-form2" action="{{ route('barcelonasearch.users') }}" method="GET">
    <label for="fecha_inicio">Fecha de inicio:</label>
    <input type="date" id="fecha_inicio" name="fecha_inicio">

    <button type="submit">Buscar</button>
</form>

<form id="search-form3" action="{{ route('barcelonasearch.users') }}" method="GET">
    <label for="fecha_fin">Fecha de fin:</label>
    <input type="date" id="fecha_fin" name="fecha_fin">

    <button type="submit">Buscar</button>
</form>

<form id="search-form4" action="{{ route('barcelonasearch.users') }}" method="GET">
    <label for="rol">Rol:</label>
    <input type="text" id="rol" name="rol">

    <button type="submit">Buscar</button>
</form>


  <table id="users-table" border="1">
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
    <tr>
        <td colspan="8">No hay usuarios registrados</td>
    </tr>
    @endforelse

  </table>

  <form action="{{ route('nuevo-usuario') }}" method="GET">
    <button type="submit">Agregar nuevo empleado</button>
</form>

<a href="{{ route('sedes') }}">Volver</a>
</body>
</html>
