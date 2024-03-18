// ----------------------
// ESCUCHAR EVENTO ACTUALIZAR FORMULARIO DEL FILTRO
// ----------------------

const incidencia = document.getElementById('incidencia');
const usuario = document.getElementById('usuario');

incidencia.addEventListener("keyup", () => {
    const nombre_incidencia = incidencia.value;
    ListarProductos(nombre_incidencia, '');
    const usuario_incidencia = usuario.value;
    ListarProductos(nombre_incidencia, usuario_incidencia);
});

usuario.addEventListener("keyup", () => {
    const usuario_incidencia = usuario.value;
    ListarProductos('', usuario_incidencia);
    const nombre_incidencia = incidencia.value;
    ListarProductos(nombre_incidencia, usuario_incidencia);
});

// ----------------------
// LISTAR PRODUCTOS
// ----------------------

ListarProductos('', '');

function ListarProductos(nombre_incidencia, usuario_incidencia) {
    var resultado = document.getElementById('incidencias');
    var formdata = new FormData();
    var csrfToken = document.querySelector('meta[name="csrf_token"]').getAttribute('content');
    formdata.append('_token', csrfToken);
    formdata.append('incidencia', nombre_incidencia);
    formdata.append('usuario', usuario_incidencia);
    console.log(nombre_incidencia)
    console.log(usuario_incidencia)
    var ajax = new XMLHttpRequest();
    ajax.open('POST', '/listar');
    ajax.onload = function () {
        if (ajax.status === 200) {
            var json = JSON.parse(ajax.responseText);
            var incidencias = json.incidencias;
            var estados = json.estados;
            var tabla = '';

            incidencias.forEach(function (item) {
                var str = "<tr><td>" + item.titulo_inc + "</td>";
                str += "<td>" + item.desc_inc + "</td>";
                str += "<td>" + item.created_at + "</td>";
                str += "<td>" + item.nombre_user + "</td>";
                str += "<td>" + item.nombre_sub_cat + "</td>";
                str += "<td><form action='' method='post' id='frm'>";
                str += "<select name='estado' id='estado' class='estado'>";
                estados.forEach(function (estado) {
                    if (estado.id !== 1) {
                        str += "<option value='" + estado.id + "'";
                    }
                    if (estado.nombre_estado === item.nombre_estado) {
                        str += " selected";
                    }
                    str += ">" + estado.nombre_estado + "</option>";
                });
                str += "</select>";
                str += "<input type='hidden' name='idp' id='idp' value='" + item.id + "'>";
                str += "</form></td>";
                str += "<td>" + (item.nombre_tecnico || 'Sin asignar') + "</td>";
                str += "<td><button type='button' class='btn btn-success' onclick='chat(" + item.id_user + ", \"" + item.nombre_user + "\")'>Chat</button></td></tr>";
                tabla += str;
            });
            resultado.innerHTML = tabla;
        } else {
            resultado.innerText = 'Error';
        }
    }
    ajax.send(formdata);
}

// Chat
chat(3, 'Ian');
function chat(id_user, nombre_user) {
    let mensajesDiv = document.getElementById('mensajes'); // Cambié el nombre de la variable a mensajesDiv
    var formdata = new FormData();

    var csrfToken = document.querySelector('meta[name="csrf_token"]').getAttribute('content');
    formdata.append('_token', csrfToken);
    formdata.append('id', id_user);
    var ajax = new XMLHttpRequest();
    ajax.open('POST', '/chat/' + id_user);

    ajax.onload = function () {
        if (ajax.status === 200) {
            var json = JSON.parse(ajax.responseText);
            // console.log(json);
            var incidenciasJSON = json.incidencias;
            var mensajesJSON = json.mensajes;
            var estados = json.estados;
            console.log(mensajesJSON);
            // Contenedor de columnas
            let msjchat = "<div style='display: flex;'>";
            // Columna de incidencias
            msjchat += "<div style='flex: 1; background-color: #f5f5f5; padding: 10px; border-radius: 8px;'>";
            incidenciasJSON.forEach(function (incidencia) {
                msjchat += "<h2 style='color: #333;'>" + incidencia.titulo_inc + "</h2>";
                msjchat += "<p style='color: black; margin: 5px 0;'>Descripcion: </p>";
                msjchat += "<p style='color: red; margin: 5px 0;'>" + incidencia.desc_inc + "</p>";
                msjchat += "<p style='color: black; margin: 5px 0;'>Usuario: </p>";
                msjchat += "<p style='color: red; margin: 5px 0;'>" + incidencia.nombre_user + "</p>";
                msjchat += "<p style='color: black; margin: 5px 0;'>Categoria: </p>";
                msjchat += "<p style='color: red; margin: 5px 0;'>" + incidencia.nombre_sub_cat + "</p>";
                msjchat += "<p style='color: black; margin: 5px 0;'>Estado: </p>";
                msjchat += "<td><form action='' method='post' id='frm'>";
                msjchat += "<select name='estado' id='estado' class='estado'>";
                estados.forEach(function (estado) {
                    if (estado.id !== 1) {
                        msjchat += "<option value='" + estado.id + "'";
                    }
                    if (estado.nombre_estado === incidencia.nombre_estado) {
                        msjchat += " selected";
                    }
                    msjchat += ">" + estado.nombre_estado + "</option>";
                });
                msjchat += "</select>";
                msjchat += "<input type='hidden' name='idp' id='idp' value='" + incidencia.id + "'>";
                msjchat += "</form></td>";
                msjchat += "<p style='color: black; margin: 5px 0;'>Tecnico: </p>";
                msjchat += "<p style='color: red; margin: 5px 0;'>" + incidencia.nombre_tecnico + "</p>";

                msjchat += "</div>"; // Cerrar columna de incidencias

                // Columna de mensajes
                msjchat += "<div style='flex: 1; background-color: #f5f5f5; padding: 10px; border-radius: 8px; margin-right: 10px;'>";
                msjchat += "<h2 style='color: #333;'>Conversación con: " + nombre_user + "</h2>";
                if (mensajesJSON === null || mensajesJSON.length === 0) {
                    msjchat += "<p style='text-align: left; color: #333; margin: 5px 0;'>Empieza la conversación</p>";
                } else {
                    mensajesJSON.forEach(function (item) {
                        if (item.emisor == id_user) {
                            msjchat += "<p style='text-align: left; color: #333; margin: 5px 0;'>" + incidencia.nombre_user + ": " + item.mensaje + "</p>";
                        } else {
                            msjchat += "<p style='text-align: right; color: blue; margin: 5px 0;'>" + item.mensaje + " :" + incidencia.nombre_tecnico + " </p>";
                        }
                    });
                    msjchat += "<form action='' method='post' id='frm' onsubmit(enviarMensaje)>";
                    msjchat += "<input type='hidden' id='idp' value='" + incidencia.id_user + "'>";
                    msjchat += "<input type='text' id='msj' style='width: 70%; padding: 5px;' placeholder='Mensaje de 100 caracteres'>";
                    msjchat += " <button type='button' style='background-color: #3498db; color: #fff; padding: 5px 10px; border: none; border-radius: 4px;'>Enviar</button>";
                    msjchat += "<p id='mensajeError' style='color: red; font-size: 12px;'></p>"; // Nuevo span para mensajes de error
                    msjchat += "</form>";
                }
                msjchat += "</div>"; // Cerrar columna de mensajes

                msjchat += "</div>"; // Cerrar contenedor de columnas
            });
            mensajesDiv.innerHTML = msjchat;
        } else {
            mensajesDiv.innerText = 'Error en la solicitud AJAX';
        }
    };
    ajax.send(formdata);
}

// Enviar mensaje

function enviarMensaje(id_user) {
    var formDataChat = new FormData();
    formDataChat.append('idp', id_user); // 'id' changed to 'idp' to match PHP variable name
    formDataChat.append('estado', document.getElementById('msj').value); // Assuming 'msj' is the ID of your message input field

    var csrfToken = document.querySelector('meta[name="csrf_token"]').getAttribute('content');
    formDataChat.append('_token', csrfToken); // Changed to 'formDataChat' for consistency

    var ajax = new XMLHttpRequest();
    ajax.open('POST', '{{ route("tecnico.mensaje") }}');

    ajax.onload = function () {
        if (ajax.status === 200) {
            if (ajax.responseText === "ok") {
            } else {
                Swal.fire({
                    icon: 'warning',
                    title: 'Error al enviar el mensaje, Vuelve a intentarlo más tarde',
                    showConfirmButton: false,
                    timer: 1500
                }).then(() => {
                });
            }
        }
    };
    ajax.send(formDataChat); // Sending formDataChat instead of formdata
}

// Mira si el select cambia

document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('incidencias').addEventListener('change', function (event) {
        if (event.target && event.target.nodeName === 'SELECT') {
            enviarFormulario(event.target.form);
        }
    });
    document.getElementById('mensajes').addEventListener('change', function (event) {
        if (event.target && event.target.nodeName === 'SELECT') {
            enviarFormulario(event.target.form);
        }
    });
});

// Envia el formulario
function enviarFormulario(form) {
    var formdata = new FormData(form);
    console.log(formdata.get('idp'));
    console.log(formdata.get('estado'));
    var estadoSelect = form.querySelector('#estado'); // Obtener el elemento <select> del formulario
    var estadoSelectedIndex = estadoSelect.selectedIndex; // Obtener el índice de la opción seleccionada
    var estadoSelectedText = estadoSelect.options[estadoSelectedIndex].text; // Obtener el texto de la opción seleccionada
    console.log(estadoSelectedText);

    var csrfToken = document.querySelector('meta[name="csrf_token"]').getAttribute('content');
    formdata.append('_token', csrfToken);
    var ajax = new XMLHttpRequest();
    ajax.open('POST', '/estado');
    ajax.onload = function () {
        if (ajax.status === 200) {
            if (ajax.responseText === "ok") {
                Swal.fire({
                    icon: 'success',
                    title: estadoSelectedText,
                    showConfirmButton: false,
                    timer: 1500
                });
                ListarProductos('', '');
            }
        } else {
            Swal.fire({
                icon: 'error',
                title: 'No se puedo cambiar al estado ' + estadoSelectedText
            });
        }
    }
    ajax.send(formdata);
}
