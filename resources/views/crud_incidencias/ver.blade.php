<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CRUD php Vanilla</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body>
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card mt-5">
          <div class="card-header">
            DATOS
          </div>
          <div class="card-body">
            @foreach ($incidencias as $incidencia)
            <h5 class="card-title">Titulo: {{ $incidencia->titulo_inc }}</h5>
            <p class="card-text">{{ $incidencia->desc_inc }}</p>
            <p>{{ $incidencia->created_at }}</p>
            <p>{{ $incidencia->nombre_user }}</p>
            <p>{{ $incidencia->nombre_sub_cat }}</p>
            <p>{{ $incidencia->nombre_tecnico }}</p>
            <p>{{ $incidencia->foto_inc }}</p>
            @endforeach
          </div>
          <div class="card-footer">
            <a href="/crud_incidencias" class="btn btn-primary">Volver</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
