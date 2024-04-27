<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CRUD php Vanilla</title>
  <!-- Se ha de añadir el token para poder usarlo en el formdata de AJAX -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous"> --}}
  <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>
<body>
<div class="container" style="border:1px solid">
  <div class="row">
    

    {{-- <a href="/form_cliente" class="btn_crear_incidencia">Crear Incidencia</a> --}}




    <!-- Zona de la derecha usando 8 de las 12 columnas de Bootstrap -->
    {{-- <div class="col-lg-8" style="border:1px solid"> --}}
      <!-- Primero (zona superior) un DIV con el formulario de búsqueda -->
      {{-- <div class="row">
        <div class="col-lg-12 ml-auto" style="border:1px solid"> --}}
          <div id="section1">
          <form action="" method="post" id="frmbusqueda">
            <div class="form-group">
              <input type="text" name="buscar" id="buscar" placeholder="Buscar..." class="form-control">


             {{-- <div id="estados"></div> --}}
              <div>
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
              {{-- <input type="button" name="resolta" id="resolta" href="/form_cliente" value="Crear Incidencia"> --}}
              <input type="button" onclick="window.location.href='/form_cliente'" name="resolta" id="resolta" value="Crear Incidencia">

                {{-- <select name="id_estado">
                  @foreach($estados as $estado)
                      <option value="{{ $estado->id }}">{{ $estado->nombre_estado }}</option>
                  @endforeach
              </select> --}}

              <div>
                {{-- <label for="ordenar">Ordenar por:</label>
                <select id="ordenar" onchange="ordenarIncidencias()">
                    <option value="titulo_inc_asc">Título ascendente</option>
                    <option value="titulo_inc_desc">Título descendente</option>
                    <option value="fecha_inc_asc">Fecha ascendente</option>
                    <option value="fecha_inc_desc">Fecha descendente</option>
                    <!-- Agrega más opciones según tus necesidades -->
                </select> --}}


                
            </div>
            
            </div>
          </form>
        </div>
        </div>
      </div>
      <br>
      <br>

      <!-- Segundo una tabla con los datos del CRUD a mostrar -->
      {{-- <div class="col-lg-12 ml-auto" style="border:1px solid"> --}}
        <table>
          <thead>
            <tr>
              <th>Titulo</th>
              <th>Descripción</th>
              <th>Fecha</th>
              <th>Foto</th>
              <th>Subcategoria</th>
              <th>Estado</th>
              <th>Tecnico</th>
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
</div>
<!-- Fin de row -->
</div>
<!-- Fin de container → ! -->

<!-- Enlazamos con el script de JS que se encargará de hacer las peticiones AJAX -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
   
<!-- <script src="/js/script.js"></script> Modificado por el asset -->
<!-- El archivo JS lo pondremos en public/js con lo que usaremos el helper asset -->
<script src="{{ asset('js/script.js') }}"></script>

   
</body>
</html>
