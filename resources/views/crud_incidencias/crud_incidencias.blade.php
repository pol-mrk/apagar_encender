<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gestor de equipo</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  <!-- Se ha de añadir el token para poder usarlo en el formdata de AJAX -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="{{asset('css/style2.css')}}">
</head>
<body>
<div class="container" style="border:1px solid">
  <div class="row">
    <div id="section1">
      <div class="flex">
        <form action="" method="post" id="frmbusqueda">
          <div class="form-group filtros">
            <input type="text" name="buscar" id="buscar" placeholder="Buscar..." class="form-control">
            <div class="filtros">
              <form action="" method="post">
                <select class="form-control status_id" id="status_id" name="status_id">
                  <option value="0">Seleccione Estado... </option> 
                  <option value="1">Sense Assignar</option>
                  <option value="2">Assignada</option>
                  <option value="3">En treball</option>
                  <option value="4">Resolta</option>
                  <option value="5">Tancada</option>
                </select>
              </form>

              <select class="form-control status_id" id="fecha_inc">
                <option value="0">Seleccione Fecha...</option>
                <option value="asc">Fecha ascendente</option>
                <option value="desc">Fecha descendente</option>
              </select>
              <input type="button" name="resolta" id="resolta" value="Quitar Resoltas">
            </div>     
          </div>
        </form>
      </div>
    </div>
      <!-- Segundo una tabla con los datos del CRUD a mostrar -->
      <div>
        <table style="border-radius: 10px">
          <thead>
            <tr>
              <th>Titulo</th>
              <th>Descripción</th>
              <th>Fecha</th>
              <th>Foto</th>
              <th>Subcategoria</th>
              <th>Estado</th>
              <th>Técnico</th>
              <th>Detalles</th>
            </tr>
          </thead>
          <!-- Tras la cabecera de la tabla, definimos el cuerpo de
          la tabla (vacío) que rellenaremos con los datos provenientes
          de la consulta AJAX -->
          <tbody id="resultado">
          </tbody>
        </table>
      </div>
  </div>
</div>
<!-- Fin de row -->
</div>
<!-- Fin de container → ! -->

<!-- Enlazamos con el script de JS que se encargará de hacer las peticiones AJAX -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
   
<!-- <script src="/js/script.js"></script> Modificado por el asset -->
<!-- El archivo JS lo pondremos en public/js con lo que usaremos el helper asset -->
<script src="{{ asset('js/scriptIan.js') }}"></script>

   
</body>
</html>
