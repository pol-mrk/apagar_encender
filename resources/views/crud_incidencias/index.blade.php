<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gestor de equipo</title>
  <!-- Se ha de añadir el token para poder usarlo en el formdata de AJAX -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="{{asset('css/style.css')}}">
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
              </div>
            </div>
          </form>
        </div>
      </div>
      <br>
      <br>
        <table>
          <thead>
            <tr>
              <th>Título</th>
              <th>Descripción</th>
              <th>Fecha</th>
              <th>Foto</th>
              <th>Subcategoria</th>
              <th>Estado</th>
              <th>Técnico</th>
              <th>Detalles</th>
            </tr>
          </thead>
          <tbody id="resultado">
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<!-- Fin de row -->
</div>
<!-- Fin de container → ! -->

<!-- Enlazamos con el script de JS que se encargará de hacer las peticiones AJAX -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
   
<script src="{{ asset('js/script.js') }}"></script>

   
</body>
</html>
