<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf_token" content="{{ csrf_token() }}">
    <title>Técnico</title>
    <link rel="stylesheet" href="{{ asset('/css/incidencias.css') }}">
</head>

<body>
    <div class="container">
        <div class="form">
            <form action="" method="post" id="frmbusqueda">
                <div class="form-group">
                    <label for="incidencia">Incidencia:</label>
                    <input type="text" name="incidencia" id="incidencia" placeholder="Buscar...">
                </div>
            </form>
            <form action="" method="post" id="frmbusqueda">
                <div class="form-group">
                    <label for="usuario">Usuario:</label>
                    <input type="text" name="usuario" id="usuario" placeholder="Buscar...">
                </div>
            </form>

            <div id="estadosfiltro">
                <form action="" method="post" id="frmbusqueda">
                    <label for="estado">Estado:</label><br>
                    <select name="filtroestado" id="filtroestado">
                    </select>
                </form>
            </div>
        </div>
        <hr>
        <div>
            <table>
                <thead>
                    <tr>
                        <th>Incidencia</th>
                        <th>Descripción</th>
                        <th>Fecha</th>
                        <th>Usuario</th>
                        <th>Categoría</th>
                        <th>Estado</th>
                        <th>Técnico</th>
                    </tr>
                </thead>
                <tbody id="incidencias">
                </tbody>
            </table>
        </div>
    </div>
</body>
<script src="{{ asset('/js/scriptJulio.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

</html>
