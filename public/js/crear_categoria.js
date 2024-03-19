function validarFormulario2() {
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
