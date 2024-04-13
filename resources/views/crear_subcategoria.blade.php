<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Subcategoría</title>
</head>
<body>
    <form action="{{ route('guardar_subcategoria') }}" method="post">
        @csrf

        <label for="id_categoria">Categoría:</label>
        <select name="id_categoria">
            {{-- Aquí deberías obtener las opciones de categoría desde el controlador y pasarlas a la vista --}}
            @foreach ($categorias as $categoria)
                <option value="{{ $categoria->id }}">{{ $categoria->nombre_cat }}</option>
            @endforeach
        </select><br><br>
    
        <label for="nombre_sub_cat">Nombre de la subcategoría:</label>
        <input type="text" name="nombre_sub_cat"><br><br>
    
        <input type="submit" value="Guardar">
    </form>
</body>
</html>
