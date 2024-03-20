// script2.js

// Esta función se encarga de enviar una solicitud AJAX para obtener y mostrar las incidencias en forma de tarjetas
function ListarIncidencias2() {
    // Especificamos en qué elemento HTML de la página vamos a "insertar" el resultado de la consulta AJAX
    // El ID "resultado2" corresponde al contenedor de tarjetas en la página
    var resultado2 = document.getElementById('resultado2');

    // Creamos un nuevo objeto FormData vacío para almacenar los datos del formulario
    var formdata = new FormData();

    // Agregamos el token CSRF al FormData
    var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    formdata.append('_token', csrfToken);

    // Inicializamos un objeto XMLHttpRequest para hacer la solicitud AJAX
    var ajax = new XMLHttpRequest();

    // Configuramos la solicitud AJAX
    ajax.open('POST', '/crud_incidencias/');
    ajax.onload = function () {
        // Verificamos si la solicitud se completó con éxito (status 200)
        if (ajax.status == 200) {
            // Convertimos la respuesta JSON del servidor en un objeto JavaScript
            var json = JSON.parse(ajax.responseText);
            console.log(json)
            // Variable para almacenar las tarjetas HTML
            var cards = '';

            // Recorremos los datos y construimos una tarjeta para cada uno
            json.forEach(function(item) {
                cards += '<div class="col-lg-4">';
                cards += '<div class="card">';
                cards += '<div class="card-body">';
                cards += '<h5 class="card-title">' + item.titulo_inc + '</h5>';
                cards += '<p class="card-text">' + item.desc_inc + '</p>';
                cards += '<p class="card-text">' + item.fecha_inc + '</p>';
                cards += '<p class="card-text">' + item.foto_inc + '</p>';
                cards += '<p class="card-text">' + item.nombre_subcat + '</p>';
                cards += '<p class="card-text">' + item.id_estado + '</p>';
                cards += '<p class="card-text">' + item.nombre_user + '</p>';
                cards += '<td><a href="/crud_incidencias" class="btn btn-primary">Volver</a></td>';
                cards += "</td>";
                // Agrega más contenido de la tarjeta según tus necesidades
                cards += '</div>';
                cards += '</div>';
                cards += '</div>';
            });

            // Agregamos las tarjetas al contenedor en la página
            resultado2.innerHTML = cards;
        } else {
            // Si la solicitud no fue exitosa, mostramos un mensaje de error en el contenedor
            resultado2.innerText = 'Error';
        }
    }

    // Enviamos la solicitud AJAX con los datos del formulario
    ajax.send(formdata);
}

// Llamamos a la función para listar las incidencias cuando se cargue la página
window.onload = function() {
    ListarIncidencias2();
};
