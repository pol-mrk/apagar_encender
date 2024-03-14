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
                str += "<td>" + item.fecha_inc + "</td>";
                str += "<td>" + item.nombre_user + "</td>";
                str += "<td>" + item.nombre_sub_cat + "</td>";
                str += "<td><form action='' method='post' id='frm'>";
                str += "<select name='estado' id='estado' class='estado'>";
                estados.forEach(function (estado) {
                    str += "<option value='" + estado.id + "'";
                    if (estado.nombre_estado === item.nombre_estado) {
                        str += " selected";
                    }
                    str += ">" + estado.nombre_estado + "</option>";
                });
                str += "</select>";
                str += "<input type='hidden' name='idp' id='idp' value='" + item.id + "'>";
                str += "</form></td>";
                str += "<td>" + (item.nombre_tecnico || 'Sin asignar') + "</td></tr>";
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
    document.getElementById('incidencias').addEventListener('change', function (event) {
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
    ajax.open('POST', '/registrar');
    ajax.onload = function () {
        if (ajax.status === 200) {
            if (ajax.responseText === "ok") {
                Swal.fire({
                    icon: 'success',
                    title: 'Modificado',
                    showConfirmButton: false,
                    timer: 1500
                });
                ListarProductos('', '');
            }
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Hubo un error al procesar la solicitud.'
            });
        }
    }
    ajax.send(formdata);
}
