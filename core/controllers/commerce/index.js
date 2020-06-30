const API_NOTICIAS = '../../core/api/commerce/noticias.php?action=';

$(document).ready(function(){
    readNoticiasNuevas();
})

// Función para obtener y mostrar las noticias
function readNoticiasNuevas()
{
    $.ajax({
        dataType: 'json',
        url: API_NOTICIAS + 'readNoticiasNuevas',
        type: 'post'
    })
    .done(function( response ) {
        // Se comprueba si la API ha retornado datos, de lo contrario se muestra un mensaje de error en pantalla.
        if ( response.status ) {
            let content = '';
//            console.log(response.dataset);
            // Se recorre el conjunto de registros devuelto por la API (dataset) fila por fila a través del objeto row.
            response.dataset.forEach(function( row ) {
                // Se crean y concatenan las tarjetas con los datos de cada producto.
                content += `
            <div class="col s12 m6 l4 margin">
                <div class="card">
                    <div class="card-image">
                        <img src="../../resources/img/commerce/img3.jpg" alt="">
                        <span class="card-title">${row.titulo}</span>
                    </div>
                    <div class="card-content">
                        <h6>por Saúl Calderón | ${row.fecha_registro}</h6>
                        <br>
                        <p>${row.contenido}</p>
                    </div>
                </div>
            </div>
                `;
            });
            // Se agregan las tarjetas a la etiqueta div mediante su id para mostrar los productos.
            $( '#noticias-index' ).html( content );
            // Se inicializa el componente Material Box asignado a las imagenes para que funcione el efecto Lightbox.
            $( '.materialboxed' ).materialbox();
            // Se inicializa el componente Tooltip asignado a los enlaces para que funcionen las sugerencias textuales.
            $( '.tooltipped' ).tooltip();
        } else {
            // Se presenta un mensaje de error cuando no existen datos para mostrar.
            //$( '#title' ).html( `<i class="material-icons small">cloud_off</i><span class="red-text">${response.exception}</span>` );
        }
    })
    .fail(function( jqXHR ) {
        // Se verifica si la API ha respondido para mostrar la respuesta, de lo contrario se presenta el estado de la petición.
        if ( jqXHR.status == 200 ) {
            console.log( jqXHR.responseText );
        } else {
            console.log( jqXHR.status + ' ' + jqXHR.statusText );
        }
    });
}
const API_MAPA = '../../core/api/commerce/mapa.php?action='

function modalInfo(id, name) {
    $('.load').removeClass('hide');
    $('#p-dep').addClass('hide');
    $('#modal2').modal('open');
    $('#modal-header').text(name);
    carga();
    $.ajax({
            type: 'post',
            url: API_MAPA + 'readDepartment',
            data: {
                id_departamento: id
            },
            dataType: 'json',
        })
        .done(function (response) {
            if (response.status) {

                fillDepartment(response.dataset);
            } else {
                $('#modal2').modal('close');
                sweetAlert(4, response.exception, null);
            }

        })
        .fail(function (jqXHR) {
            if (jqXHR.status == 200) {
                console.log(jqXHR.responseText);
            } else {
                console.log(jqXHR.status + ' ' + jqXHR.responseText);
            }
        })
}

function fillDepartment(dataset) {
    let content = '';
    let suma = 0;
    // Se recorre el conjunto de registros (dataset) fila por fila a través del objeto row.
    dataset.forEach(function (row) {
        // Se crean y concatenan las filas de la tabla con los datos de cada registro.
        suma += 1;
        content += `
             <tr class="hoverable pointer">
                <td><img src="../../resources/img/commerce/productos/pro (${suma}).jpg" alt="" width="80"></td>
                <td>${row.nombre}</td>
                <td>${row.existencias}</td>
                <td>${row.precio_unitario}</td>
                <td>${row.categoria_producto}</td>
                <td>${row.nombre_empresa}</td>
             </tr>   
            `;
    })
    // Se agregan las filas al cuerpo de la tabla mediante su id para mostrar los registros.
    $('#tbody-dep').html(content);
    $('.load').addClass('hide');
    $('#p-dep').removeClass('hide');
}


