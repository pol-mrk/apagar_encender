<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lista de Usuarios</title>
</head>
<body>
  <h2>Lista de Usuarios</h2>

  <form id="search-form">
    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" name="nombre">

    <button type="button" onclick="searchUsersByNombre()">Buscar</button>
</form>

<form id="search-form1">
    
    <label for="apellidos">Apellidos:</label>
    <input type="text" id="apellidos" name="apellidos">

    <button type="button" onclick="searchUsersByApellidos()">Buscar</button>
</form>

<form id="search-form2">
    
    <label for="fecha_inicio">Fecha de inicio:</label>
    <input type="date" id="fecha_inicio" name="fecha_inicio">

    <button type="button" onclick="searchUsersByFechaInicio()">Buscar</button>
</form>

<form id="search-form3">
    
    <label for="fecha_fin">Fecha de fin:</label>
    <input type="date" id="fecha_fin" name="fecha_fin">

    <button type="button" onclick="searchUsersByFechaFin()">Buscar</button>
</form>

<form id="search-form4">
    
    <label for="rol">Rol:</label>
    <input type="text" id="rol" name="rol">
    
    <button type="button" onclick="searchUsersByRol()">Buscar</button>
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

    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['nombre_user']}</td>
                    <td>{$row['apellidos_user']}</td>
                    <td>{$row['correo_user']}</td>
                    <td>{$row['fecha_ini_user']}</td>
                    <td>{$row['fecha_fin_user']}</td>
                    <td>{$row['id_rol']}</td>
                    <td>
                        <a href='editar_usuario.php?id={$row['id']}'>Editar</a>
                        <a href='dar_baja_usuario.php?id={$row['id']}'>Dar de Baja</a>
                    </td>
                  </tr>";
        }
    } else {
        echo "<tr><td colspan='7'>No hay usuarios registrados</td></tr>";
    }
    ?>

  </table>

</body>
</html>

<?php
$conn->close();
?>

<script>
function searchUsersByNombre() {
    var nombre = document.getElementById('nombre').value;
    sendSearchRequest('nombre=' + nombre);
}

function searchUsersByApellidos() {
    var apellidos = document.getElementById('apellidos').value;
    sendSearchRequest('apellidos=' + apellidos);
}

function searchUsersByFechaInicio() {
    var fecha_inicio = document.getElementById('fecha_inicio').value;
    sendSearchRequest('fecha_inicio=' + fecha_inicio);
}

function searchUsersByFechaFin() {
    var fecha_fin = document.getElementById('fecha_fin').value;
    sendSearchRequest('fecha_fin=' + fecha_fin);
}

function searchUsersByRol() {
    var rol = document.getElementById('rol').value;
    sendSearchRequest('rol=' + rol);
}

function sendSearchRequest(params) {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'search_users.php?' + params, true);

    xhr.onload = function() {
        if (xhr.status >= 200 && xhr.status < 400) {
            document.getElementById('users-table').innerHTML = xhr.responseText;
        } else {
            console.error('Error al realizar la búsqueda');
        }
    };

    xhr.send();
}
</script>