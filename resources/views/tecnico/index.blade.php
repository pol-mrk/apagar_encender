<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf_token" content="{{ csrf_token() }}">
    <title>Tecnico</title>
</head>
<style>
    /* Estilos generales */
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
}

.container {
    width: 80%;
    margin: 0 auto;
}

/* Estilos para formularios */
form {
    margin-bottom: 20px;
}

.form-group {
    margin-bottom: 15px;
}

label {
    display: block;
    font-weight: bold;
}

input[type="text"],
select {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
}

/* Estilos para tablas */
table {
    width: 100%;
    border-collapse: collapse;
}

table,
th,
td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
}

th {
    background-color: #f2f2f2;
    font-weight: bold;
}

/* Estilos para encabezado */
header {
    background-color: #333;
    color: #fff;
    padding: 10px 0;
    text-align: center;
}

/* Estilos para separadores */
hr {
    border: none;
    border-top: 1px solid #ccc;
    margin: 20px 0;
}

/* Estilos específicos para la página */
#estadosfiltro {
    margin-bottom: 20px;
}

#estadosfiltro select {
    width: 200px;
}

/* Estilos específicos para la tabla de incidencias */
#incidencias td {
    vertical-align: top;
}

</style>

<body>
    <div class="col-lg-12 ml-auto">
        <form action="" method="post" id="frmbusqueda">
            <div class="form-group">
                <label for="incidencia">Incidencia:</label>
                <input type="text" name="incidencia" id="incidencia" placeholder="Buscar...">
            </div>
        </form>
    </div>
    <hr>

    <div class="col-lg-12 ml-auto">
        <form action="" method="post" id="frmbusqueda">
            <div class="form-group">
                <label for="usuario">Usuario:</label>
                <input type="text" name="usuario" id="usuario" placeholder="Buscar...">
            </div>
        </form>
    </div>
    <hr>
    <div id="estadosfiltro">
        <form action="" method="post" id="frmbusqueda">
            <label for="estado">Estado:</label><br>
            <select name="filtroestado" id="filtroestado">
                
            </select>
        </form>
    </div>

    <hr>
    <div>

        <table>
            <thead>
                <td>Incidencia</td>
                <td>Descripcion</td>
                <td>Fecha</td>
                <td>Usuario</td>
                <td>Categoria</td>
                <td>Estado</td>
                <td>Tecnico</td>
                {{-- <a href="{{route('tecnico.chat',1)}}">asd</a> --}}
            </thead>
            <tbody id="incidencias">
            </tbody>
        </table>
    </div>
</body>
<script src="{{ asset('/js/script.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

</html>
