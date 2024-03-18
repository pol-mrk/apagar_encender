<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Categoría y Subcategoría</title>
</head>
<body>
    <script>
        function validarFormulario() {
            var nombreCat = document.forms["myForm"]["nombre_cat"].value;
            var nombreSubCat = document.forms["myForm"]["nombre_sub_cat"].value;
            var formatoValido = /^[A-Za-z\s]+$/;
                
            if (nombreCat == "" || nombreSubCat == "") {
                alert("Los campos Nombre de la categoría y Nombre de la subcategoría son obligatorios");
                return false;
            }

            if (!nombreCat.match(formatoValido) || !nombreSubCat.match(formatoValido)) {
                alert("Los campos Nombre de la categoría y Nombre de la subcategoría solo deben contener letras y espacios");
                return false;
            }
        }
    </script>

    <form name="myForm" action="{{ route('guardar_categoria') }}" method="post" onsubmit="return validarFormulario()">
        @csrf

        <label for="nombre_cat">Nombre de la categoría:</label>
        <input type="text" name="nombre_cat"><br><br>
    
        <label for="nombre_sub_cat">Nombre de la subcategoría:</label>
        <input type="text" name="nombre_sub_cat"><br><br>

        <input type="submit" value="Guardar">
    </form>
</body>
</html>
