

mensajes('');

function mensajes() {

    var resultado = document.getElementById('resultado');
    var formdata = new FormData();
    var ajax = new XMLHttpRequest();
    ajax.open('POST', '/chat');
    ajax.onload = function () {
        var str = "";

        if (ajax.status == 200) {
            var json = JSON.parse(ajax.responseText);
            var tabla = '';
            console.log(json);
            json.forEach(function (item) {
                str = "<tr><td>" + item.id + "</td>";
                str = str + "<td>" + item.producto + "</td>";
                str += "<td>" + item.precio + "</td>";
                str += "<td>" + item.cantidad + "</td>";
                str += "<td>";
                str = str + " <button type='button' class='btn btn-success' onclick=" + "Editar(" + item.id + ")>Editar</button>";
                str = str + " <button type='button' class='btn btn-danger' onclick=" + "Eliminar(" + item.id + ")>Eliminar</button>";
                str += "</td> ";
                str += "</tr>";
                tabla += str;
            });
            resultado.innerHTML = tabla;
        } else {
            resultado.innerText = 'Error';
        }
    }
    ajax.send(formdata);

}


document.addEventListener('DOMContentLoaded', function () {
    // Event listener para cambios en el select de incidencias
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
                listarincidencias('', '');
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
