<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulario de Incidencias</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <style>
    .center-content {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }
    .card {
      max-width: 500px;
      width: 100%;
    }
  </style>
</head>
<body>
  <div class="center-content">
    <div class="card">
      <div class="card-body">
        <h1 class="card-title">FORM | INCIDENCIAS</h1>
        <form action="{{ route('form_cliente.store') }}" method="post" enctype="multipart/form-data">
          @csrf 
          <input type="text" name="titulo_inc" class="form-control mb-3" placeholder="Titulo..." value="{{ old('titulo_inc') }}">
          @error('titulo_inc')
          <span class="text-danger">{{ $message }}</span>
          @enderror
          <input type="text" name="desc_inc" class="form-control mb-3" placeholder="Descripción..." value="{{ old('desc_inc') }}">
          @error('desc_inc')
          <span class="text-danger">{{ $message }}</span>
          @enderror
          <label for="">Fecha:</label>
          <input type="date" name="fecha_inc" class="form-control mb-3" value="{{ old('fecha_inc') }}">
          @error('fecha_inc')
          <span class="text-danger">{{ $message }}</span>
          @enderror
          <label for="">Subcategoria:</label>
          <select name="id_subcat" class="form-control mb-3">
            @foreach($subcategorias as $subcategoria)
                <option value="{{ $subcategoria->id_categoria }}">{{ $subcategoria->nombre_sub_cat }}</option>
            @endforeach
          </select>
          @error('id_subcat')
          <span class="text-danger">{{ $message }}</span>
          @enderror
          <label for="file">Añade una imagen:</label>
          <input type="file" name="foto_inc" id="foto_inc" class="form-control-file mb-3">
          @error('foto_inc')
          <span class="text-danger">{{ $message }}</span>
          @enderror
          <input type="hidden" name="id_estado" id="id_estado" value="1">
          <div class="mb-3">
            <input type="submit" value="Enviar" name="enviar" class="btn btn-primary">
            <a href="/crud_incidencias" class="btn btn-secondary">Volver</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>
</html>
