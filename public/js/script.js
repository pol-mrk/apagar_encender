// ----------------------
// ESCUCHAR EVENTO ACTUALIZAR FORMULARIO DEL FILTRO
// ----------------------

const incidencia = document.getElementById('incidencia');
const usuario = document.getElementById('usuario');
incidencia.addEventListener("keyup", actualizarFiltro);
usuario.addEventListener("keyup", actualizarFiltro);

let estadosFiltro = '';

function actualizarFiltro(estadosFiltro = null) {
    const nombre_incidencia = incidencia.value;
    const usuario_incidencia = usuario.value;
    // console.log('asdasd' + estadosFiltro);
    listarincidencias(nombre_incidencia, usuario_incidencia, estadosFiltro, 2);
}

document.addEventListener('DOMContentLoaded', function () {
    // Event listener para cambios en el select de incidencias
    document.getElementById('estadosfiltro').addEventListener('change', function (event) {
        const valorSeleccionado = event.target.value;
        estadosFiltro = valorSeleccionado;
        // console.log('El valor seleccionado es: ' + valorSeleccionado);
        actualizarFiltro(estadosFiltro);
    });
});

// ----------------------
// LISTAR PRODUCTOS
// ----------------------

listarincidencias('', '', '');

function listarincidencias(nombre_incidencia, usuario_incidencia, estadosFiltro, filtro = 1) {

    var resultado = document.getElementById('incidencias');
    var formdata = new FormData();
    var csrfToken = document.querySelector('meta[name="csrf_token"]').getAttribute('content');
    formdata.append('_token', csrfToken);
    formdata.append('incidencia', nombre_incidencia);
    formdata.append('usuario', usuario_incidencia);
    formdata.append('estado', estadosFiltro);
    var ajax = new XMLHttpRequest();
    ajax.open('POST', '/listar');
    ajax.onload = function () {
        if (ajax.status === 200) {
            var json = JSON.parse(ajax.responseText);
            var incidencias = json.incidencias;
            var estados = json.estados;
            var tabla = '';
            if (filtro == 1) {
                var estadosfiltro = document.getElementById('filtroestado');
                var tabla2 = '';
                tabla2 += '<option value="">Todo</option>';
                estados.forEach(function (estado) {
                    if (estado.id !== 1) {
                        tabla2 += '<option value="' + estado.id + '"> ' + estado.nombre_estado + '</option>';
                    }
                });
                estadosfiltro.innerHTML = tabla2;
            }
            
            incidencias.forEach(function (item) {
                var str = "<tr><td>" + item.titulo_inc + "</td>";
                str += "<td>" + item.desc_inc + "</td>";
                str += "<td>" + item.created_at + "</td>";
                str += "<td>" + item.nombre_user + "</td>";
                str += "<td>" + item.nombre_sub_cat + "</td>";
                str += "<td><form action='' method='post' id='frm'>";
                str += "<input type='hidden' name='idp' id='idp' value='" + item.id + "'>";
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
                str += "</form></td>";
                str += "<td>" + (item.nombre_tecnico || 'Sin asignar') + "</td>";
                // str += "<td><button type='button' class='btn btn-success' onclick='chat(" + item.id_user + ")'>Chat</button></td></tr>";
                str += "<td><a href='tecnico/" + item.id + "'>chat</a></td></tr>";
                tabla += str;
            });
            resultado.innerHTML = tabla;
        } else {
            resultado.innerText = 'Error';
        }
    }
    ajax.send(formdata);
}

// Mira si el select cambia

document.addEventListener('DOMContentLoaded', function () {
    // Event listener para cambios en el select de incidencias
    document.getElementById('incidencias').addEventListener('change', function (event) {
        // if (event.target && event.target.nodeName === 'SELECT') {
        enviarFormulario(event.target.form);
        // }
    });
});

// Envia el formulario
function enviarFormulario(form) {
    var formdata = new FormData(form);
    // console.log(formdata.get('idp'));
    // console.log(formdata.get('estado'));
    var estadoSelect = form.querySelector('#estado'); // Obtener el elemento <select> del formulario

    var estadoSelectedIndex = estadoSelect.selectedIndex; // Obtener el índice de la opción seleccionada
    console.log(estadoSelectedIndex);
    var estadoSelectedText = estadoSelect.options[estadoSelectedIndex].text; // Obtener el texto de la opción seleccionada
    // console.log(estadoSelectedText);

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
                listarincidencias('', '', '');
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
