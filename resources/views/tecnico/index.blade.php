<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf_token" content="{{ csrf_token() }}">
    <title>Técnico</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!-- Se ha de añadir el token para poder usarlo en el formdata de AJAX -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{asset('css/style2.css')}}">
</head>
<body>
<div class="container">
    <div class="row">
        <div id="section1">
            <div class="flex">
                <div class="col-lg-12 ml-auto">
                    <form action="" method="post" id="frmbusqueda">
                        <div class="form-group">
                            <input type="text" name="incidencia" id="incidencia" class="buscar" placeholder="Buscar Incidencia...">
                        </div>
                    </form>
                </div>

                <div class="col-lg-12 ml-auto">
                    <form action="" method="post" id="frmbusqueda">
                        <div class="form-group">
                            <input type="text" name="usuario" id="usuario" class="buscar" placeholder="Buscar Usuario...">
                        </div>
                    </form>
                </div>

                <div id="estadosfiltro">
                    <form action="" method="post" id="frmbusqueda">
                        <select name="filtroestado" id="filtroestado" class="buscar">
                        </select>
                    </form>
                </div>
            </div>     
        </div>

        <div>
            <table style="border-radius: 10px">
                <thead>
                    <tr>
                        <th>Incidencia</th>
                        <th>Descripción</th>
                        <th>Fecha</th>
                        <th>Usuario</th>
                        <th>Categoria</th>
                        <th>Estado</th>
                        <th>Técnico</th>
                        <th>Chat</th>
                    </tr>
                </thead>
                <tbody id="incidencias">
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
<script src="{{ asset('/js/scriptJulio.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

</html>
