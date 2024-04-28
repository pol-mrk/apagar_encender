// ----------------------
// ESCUCHAR EVENTO ACTUALIZAR FORMULARIO DEL FILTRO
// ----------------------

// Escuchamos permanentemente al evento keyup, que se activa cuando el usuario suelta 
// una tecla después de presionarla en un elemento HTML.
// Esto almacena el valor del value del input text "buscar" del formulario HTML de filtrado de resultado 
// en la constante valor y posteriormente ejecutamos la función ListarProductos pasandole ese valor como
// parámetro. En caso de que el formulario esté vacío, se envía NULL para que muestre todos los datos.
let select_option = '';

// buscar.addEventListener("keyup", () => {
//     const valor = buscar.value;
//     if (valor == "") {
//         ListarIncidencias('');
//     } else {
//         ListarIncidencias(valor);
//     }
// });

const incidencia = document.getElementById('buscar');
// incidencia.addEventListener("keyup", actualizarFiltro);




window.onload = () => {
    const buscar = document.getElementById('buscar');
    const status_id = document.getElementById('status_id');
    const fecha_inc = document.getElementById('fecha_inc');
    var resolta = document.getElementById('resolta');

    buscar.addEventListener("keyup", () => {
        const buscarValor = buscar.value;
        const status_idValor = status_id.value;
        const fecha_incValor = fecha_inc.value;
        if (buscarValor == "" &&  status_idValor == "" &&  fecha_incValor == ""  && resolta.value=="" ) {
            ListarIncidencias("", "", "","");
        } else {
            ListarIncidencias(buscarValor, status_idValor, fecha_incValor, resolta.value);
        }
    });

    status_id.addEventListener("change", () => {
        const buscarValor = buscar.value;
        const status_idValor = status_id.value;
        const fecha_incValor = fecha_inc.value;
        if (buscarValor == "" &&  status_idValor == "" &&  fecha_incValor == ""  && resolta.value=="" ) {
            ListarIncidencias("", "", "","");
        } else {
            ListarIncidencias(buscarValor, status_idValor, fecha_incValor, resolta.value);
        }
    });

    fecha_inc.addEventListener("change", () => {
        const buscarValor = buscar.value;
        const status_idValor = status_id.value;
        const fecha_incValor = fecha_inc.value;
        if (buscarValor == "" &&  status_idValor == "" &&  fecha_incValor == ""  && resolta.value=="" ) {
            ListarIncidencias("", "", "","");
        } else {
            ListarIncidencias(buscarValor, status_idValor, fecha_incValor, resolta.value);
        }
    });
    
    resolta.addEventListener('click', ()=> {
    if (resolta.value == 'Quitar Resoltas') {
        resolta.value = 'Ver Resoltas';
        const buscarValor = buscar.value;
        const status_idValor = status_id.value;
        const fecha_incValor = fecha_inc.value;
        if (buscarValor == "" &&  status_idValor == "" &&  fecha_incValor == ""  && resolta.value=="" ) {
            ListarIncidencias("", "", "","");
        } else {
            ListarIncidencias(buscarValor, status_idValor, fecha_incValor, resolta.value);
        }
        
    } else {
        resolta.value = 'Quitar Resoltas';
        const buscarValor = buscar.value;
        const status_idValor = status_id.value;
        const fecha_incValor = fecha_inc.value;
        if (buscarValor == "" &&  status_idValor == "" &&  fecha_incValor == ""  && resolta.value=="" ) {
            ListarIncidencias("", "", "","");
        } else {
            ListarIncidencias(buscarValor, status_idValor, fecha_incValor, resolta.value);
        }
        
    }
    });
    
};




// document.getElementById("status_id").addEventListener('change', RecogerEstados);


// let estadosFiltro = '';
// let fechaFiltro = '';

// function actualizarFiltro(estadosFiltro = 'Prueba', fechaFiltro = 'null') {
//     const valor = incidencia.value;

//     // console.log('asdasd' + estadosFiltro);
//     ListarIncidencias(valor, estadosFiltro, fechaFiltro);
// }

// function RecogerEstados() {
//     var select_estados = document.getElementById('status_id').value;
//     // var estadosFiltro = select_estados.options[select_estados.selectedIndex].value;
//     actualizarFiltro('', select_estados, '');
// }

// function Fecha() {
//     var select_fecha = document.getElementById('fecha_inc');
//     // var fechaFiltro = select_fecha.options[select_fecha.selectedIndex].value;
//     actualizarFiltro(estadosFiltro, fechaFiltro);
// }

// ----------------------
// LISTAR PRODUCTOS
// ----------------------

// En primer luegar ejecutamos la función ListarProductos sin enviar ningún parámetro de búsqueda.
// De esta forma, se listarán todos los objetos de la base de datos al cargar la página por primera vez
ListarIncidencias('', '', '');

function ListarIncidencias(buscar, status_id, fecha_inc, resolta) {
    // Especificamos en qué elemento HTML de la página vamos a "insertar" el resultado de la consulta AJAX
    // El ID "resultado" corresponde con el tbody de "index.html"
    var resultado = document.getElementById('resultado');
    // var resultado= document.getElementById('resultado');
    //var frmbusqueda=document.getElementById('frmbusqueda');

    // Creamos un nuevo objeto Formulario VACÍO "FormData" que almacenamos en la variable formdata.
    var formdata = new FormData();


    // // Agrega el token CSRF al FormData
    var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    // console.log(csrfToken);
    formdata.append('_token', csrfToken);


    // Creamos un campo nuevo al objeto formulario recién creado y le pasamos como valor el contenido de la variable 
    // busqueda recibida al ejecutarse el evento "keyup" asociado al elemento "buscar" (input del formulario HTML)
    formdata.append('busqueda', buscar);
    formdata.append('estado', status_id);
    formdata.append('fecha', fecha_inc);
    formdata.append('resolta', resolta);
    console.log(buscar);
    console.log(status_id);
    console.log(fecha_inc);

    var ajax = new XMLHttpRequest();

    ajax.open('POST', '/gestor');

    ajax.onload = function () {


        // Inicializamos una variable string vacía que iremos rellenando con el código
        // HTML a mostrar a partir de los datos recibidos de listar.php
        var str = "";


        // El status 200 indica que se ha ejecutado correctamente la petición AJAX
        if (ajax.status == 200) {
            var json = JSON.parse(ajax.responseText);
            var incidencias = json.incidencias;

            console.log(incidencias)
            var estados = json.estados;
            console.log(estados);
            var tabla = '';
            var select = '';

            console.log(json)
            incidencias.forEach(function (item) {
                var str = "<tr>";
                str += "<td style='color:white;'>" + item.titulo_inc + "</td>";
                str += "<td style='color:white;'>" + item.desc_inc + "</td>";
                str += "<td style='color:white;'>" + item.fecha_inc + "</td>";
                str += "<td style='color:white;'>" + item.foto_inc + "</td>";
                str += "<td style='color:white;'>" + item.nombre_subcat + "</td>";
                str += "<td style='color:white;'>" + item.nombre_estado + "</td>";
                str += "<td style='color:white;'>" + item.nombre_prioridad + "</td>";
                str += "<td style='color:white;'>" + item.nombre_user + "</td>";
                str += "<td><a class='detalles' href='/gestor/" + item.id + "'>Detalles</a></td>";
                str += "</td>";
                str += "</tr>";
                tabla += str;
            });

            resultado.innerHTML = tabla;
        

        } else {
            // Si no se recibe un status 200, indica que ha habido un error en la petición AJAX
            resultado.innerText = 'Error';
          
        }
    }


    // Se ejecuta la consulta AJAX (se envían los datos recibidos del formulario
    // a la página indicada en el método OPEN ('listar.php'))
    ajax.send(formdata);
}