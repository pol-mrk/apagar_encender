<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CRUD php Vanilla</title>
  <!-- Se ha de añadir el token para poder usarlo en el formdata de AJAX -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body>
  <h1>DATOS</h1>
<div class="container">

</div>
{{-- {{dd($incidencias)}} --}}
      <!-- Segundo una tarjeta con los datos del CRUD a mostrar -->
      {{-- <div class="row mt-3" id="resultado2"> --}}
        @foreach ($incidencias as $incidencia)
        <h5> Titulo: {{ $incidencia->titulo_inc }}</h5>
        <p>{{ $incidencia->desc_inc }}</p>
        <p>{{ $incidencia->created_at }}</p>
        <p>{{ $incidencia->nombre_user }}</p>
        <p>{{ $incidencia->nombre_sub_cat }}</p>
        <p>{{ $incidencia->nombre_tecnico }}</p>
        <p> {{ $incidencia->foto_inc }}</p>
    @endforeach
        <a href="/crud_incidencias" class="btn btn-primary">Volver</a>
        <!-- Aquí se llenarán las tarjetas con los datos de incidencias -->
     
    
 

<!-- Enlazamos con el script de JS que se encargará de hacer las peticiones AJAX -->
{{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="{{ asset('js/scriptIan2.js') }}"></script> --}}
</body>
</html>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>DATOS </h1>
</body>
</html>
