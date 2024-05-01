<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lista de Usuarios</title>
  <link rel="stylesheet" href="{{ asset('css/style3.css') }}">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
  <div class="container" style="border:1px solid;">
    <div class="row">
      <a href="{{ route('sedes') }}" class="button">Ir a Sedes</a>
      <div id="section1">
        <div class="flex" style="color: white">
          <h2>Lista de Usuarios Barcelona</h2>
          <a href="{{ route('nuevo-usuario') }}" class="custom-btn">Dar de alta nuevo empleado</a>
          <a href="{{ route('crear-categoria-y-subcategoria') }}" class="custom-btn">Crear nueva categoria</a>
          <a href="{{ route('crear-subcategoria') }}" class="custom-btn">Crear nueva subcategoria</a>
          <div class="form-group filtros">

            <form id="search-form" action="{{ route('search.users') }}" method="GET">
                <label for="nombre">Nombre:</label>
                <input id="buscar" type="text" id="nombre" name="nombre">

                <button type="submit" class="submits"><i class="bi bi-search"></i></button>
            </form>

            <form id="search-form1" action="{{ route('search.users') }}" method="GET">
                <label for="apellidos">Apellidos:</label>
                <input id="buscar" type="text" id="apellidos" name="apellidos">

                <button type="submit" class="submits"><i class="bi bi-search"></i></button>
            </form>

            <form id="search-form2" action="{{ route('search.users') }}" method="GET">
                <label for="fecha_inicio">Fecha de inicio:</label>
                <input id="buscar" type="date" id="fecha_inicio" name="fecha_inicio">

                <button type="submit" class="submits"><i class="bi bi-search"></i></button>
            </form>

            <form id="search-form3" action="{{ route('search.users') }}" method="GET">
                <label for="fecha_fin">Fecha de fin:</label>
                <input id="buscar" type="date" id="fecha_fin" name="fecha_fin">

                <button type="submit" class="submits"><i class="bi bi-search"></i></button>
            </form>

            <form id="search-form4" action="{{ route('search.users') }}" method="GET">
                <label for="rol">Rol:</label>
                <input id="buscar" type="text" id="rol" name="rol">

                <button type="submit" class="submits"><i class="bi bi-search"></i></button>
            </form>
          </div>
        </div>
      </div>

      <table id="users-table" style="border-radius: 10px;">
        <thead>
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
        </thead>
        @forelse ($users as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->nombre_user }}</td>
            <td>{{ $user->apellidos_user }}</td>
            <td>{{ $user->correo_user }}</td>
            <td>{{ $user->fecha_ini_user }}</td>
            <td>{{ $user->fecha_fin_user }}</td>
            <td>{{ $user->id_rol }}</td>
            <td class="flex">
              <a class="detalles" href='editar_usuario/{{ $user->id }}'>Editar</a>
              <form action="{{ route('usuariobarcelona.destroy', $user->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm detalles2" onclick="return confirm('¿Estás seguro de que quieres eliminar esta usuario?')">Dar de Baja</button>
              </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="8">No hay usuarios registrados</td>
        </tr>
        @endforelse

      </table>
    </div>
  </div>
</body>
</html>
