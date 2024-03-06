// ----------------------
// ESCUCHAR EVENTO ACTUALIZAR FORMULARIO DEL FILTRO
// ----------------------

buscar.addEventListener("keyup", () => {
    const valor = buscar.value;
    if (valor == "") {
        ListarProductos('');
    } else {
        ListarProductos(valor);
    }
});

// ----------------------
// LISTAR PRODUCTOS
// ----------------------

ListarProductos('');

function ListarProductos(valor) {

    var resultado = document.getElementById('incidencias');
    var formdata = new FormData();
    //agregar token
    var csrfToken = document.querySelector('meta[name="csrf_token"]').getAttribute('content');
    formdata.append('_token', csrfToken);

    formdata.append('busqueda', valor);

    var ajax = new XMLHttpRequest();
    ajax.open('POST', '/listar');
    ajax.onload = function () {
        var str = "";

        if (ajax.status == 200) {
            // console.log(this.responseText); Comprobar que lleva la respues de listar.php
            var json = JSON.parse(ajax.responseText);
            var tabla = '';
            // console.log(this.responseText);
            json.forEach(function (item) {
                str = "<tr><td>" + item.titulo_inc + "</td>";
                str += "<td>" + item.desc_inc + "</td>";
                str += "<td>" + item.fecha_inc + "</td>";
                str += "<td>" + item.nombre_user + "</td>";
                str += "<td>" + item.nombre_sub_cat + "</td>";
                str += "<td>" + item.nombre_estado + "</td>";
                str += "<td>" + item.tecnico + "</td>";
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
