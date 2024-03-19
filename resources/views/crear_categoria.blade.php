<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Categoría y Subcategoría</title>
</head>
<body>

    <form name="myForm" action="{{ route('guardar_categoria') }}" method="post" onsubmit="return validarFormulario2()">
        @csrf

        <label for="nombre_cat">Nombre de la categoría:</label>
        <input type="text" name="nombre_cat"><br><br>
    
        <label for="nombre_sub_cat">Nombre de la subcategoría:</label>
        <input type="text" name="nombre_sub_cat"><br><br>

        <input type="submit" value="Guardar">
    </form>

    <script src="{{ asset('js/crear_categoria.js') }}"></script>
</body>
</html>
