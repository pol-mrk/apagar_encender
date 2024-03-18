function validarFormulario() {
    var nombre = document.getElementsByName("nombre_user")[0].value;
    var apellidos = document.getElementsByName("apellidos_user")[0].value;
    var correo = document.getElementsByName("correo_user")[0].value;
    var fechaInicio = document.getElementsByName("fecha_ini_user")[0].value;
    var fechaFin = document.getElementsByName("fecha_fin_user")[0].value;
    var contrasena = document.getElementsByName("contrasena_user")[0].value;
    var rol = document.getElementsByName("id_rol")[0].value;

    if (nombre === "" || apellidos === "" || correo === "" || fechaInicio === "" || fechaFin === "" || contrasena === "") {
      alert("Por favor, complete todos los campos.");
      return false;
    }

    // Validar que en nombre y apellido no se puedan escribir ni números ni signos
    var letrasRegex = /^[A-Za-zÁÉÍÓÚáéíóú]+$/;
    if (!letrasRegex.test(nombre)) {
      alert("El campo Nombre no puede contener números ni signos.");
      return false;
    }
    if (!letrasRegex.test(apellidos)) {
      alert("El campo Apellidos no puede contener números ni signos.");
      return false;
    }

    // Validar formato de correo electrónico
    var emailRegex = /^\S+@\S+\.\S+$/;
    if (!emailRegex.test(correo)) {
      alert("Por favor, ingrese un correo electrónico válido.");
      return false;
    }

    // Validar fecha de inicio no posterior a fecha de fin
    if (fechaInicio > fechaFin) {
      alert("La fecha de inicio no puede ser posterior a la fecha de fin.");
      return false;
    }

    // Validar longitud de contraseña
    if (contrasena.length < 6) {
      alert("La contraseña debe tener al menos 6 caracteres.");
      return false;
    }

    if (rol === '1') {
    // Mostrar SweetAlert y controlar el envío del formulario
    swal({
      title: "¿Estás seguro?",
      text: "Al seleccionar Administrador, se otorgarán permisos de administración.",
      icon: "warning",
      buttons: ["Cancelar", "Sí, estoy seguro"],
    }).then((confirmacion) => {
      if (confirmacion) {
        // Continuar con el envío del formulario
        document.querySelector("form").submit();
      }
    });
    return false; // Evitar el envío automático del formulario
  }

    return true;
}