const API_NOTICIAS = '../../core/api/commerce/noticias.php?action=';

$(document).ready(function(){
    readNoticias();
})

// Función para obtener y mostrar las noticias
function readNoticias()
{
    $.ajax({
        dataType: 'json',
        url: API_NOTICIAS + 'readNoticias',
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
            <div class="col s12">
                <div class="card horizontal margin">
                    <div class="card-image hide-on-small-only">
                        <img src="../../resources/img/commerce/3.1.png">
                    </div>
                    <div class="card-stacked">
                        <div class="card-content">
                            <h4 class="header">${row.titulo}</h4>
                            <p>por Saúl Calderón  |  ${row.fecha_registro}</p>
                            <p>${row.contenido}</p>
                            <!--<a href="#">Ver más</a>-->
                        </div>
                    </div>
                </div>
            </div>
                `;
            });
            // Se agregan las tarjetas a la etiqueta div mediante su id para mostrar los productos.
            $( '#noticias' ).html( content );
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