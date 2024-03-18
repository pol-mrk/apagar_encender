<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf_token" content="{{ csrf_token() }}">
    <title>Tecnico</title>
</head>
<style>
    table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
    }

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

    tbody tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    tbody tr:hover {
        background-color: #ddd;
    }
</style>

<body>
    <div class="col-lg-12 ml-auto" style="border:1px solid">
        <form action="" method="post" id="frmbusqueda">
            <div class="form-group">
                <label for="incidencia">Incidencia:</label>
                <input type="text" name="incidencia" id="incidencia" placeholder="Buscar...">
            </div>
        </form>
    </div>
    <hr>
    <div class="col-lg-12 ml-auto" style="border:1px solid">
        <form action="" method="post" id="frmbusqueda">
            <div class="form-group">
                <label for="usuario">usuario:</label>
                <input type="text" name="usuario" id="usuario" placeholder="Buscar...">
            </div>
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
    <div id="mensajes"></div>
    <form action="" onsubmit()></form>
</body>
<script src="{{ asset('/js/script.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

</html>
