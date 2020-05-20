// Constante para establecer la ruta y parámetros de comunicación con la API.
const API_CATALOGO = '../../core/api/commerce/catalogo.php?action=';

// Método que se ejecuta cuando el documento está listo.
$( document ).ready(function() {
    // Se busca en la URL las variables (parámetros) disponibles.
    let params = new URLSearchParams( location.search );
    // Se obtienen los datos localizados por medio de las variables.
    const ID = params.get( 'id' );
    const NAME = params.get( 'nombre' );
    // Se llama a la función que muestra los productos de la categoría seleccionada previamente.
    readProductosCategoria( ID, NAME );
});

// Función para obtener y mostrar los productos de acuerdo a la categoría seleccionada.
function readProductosCategoria( id, categoria )
{
    $.ajax({
        dataType: 'json',
        url: API_CATALOGO + 'readProductosCategoria',
        data: { id_categoria: id },
        type: 'post'
    })
    .done(function( response ) {
        // Se comprueba si la API ha retornado datos, de lo contrario se muestra un mensaje de error en pantalla.
        if ( response.status ) {
            let content = '';
            // Se recorre el conjunto de registros devuelto por la API (dataset) fila por fila a través del objeto row.
            response.dataset.forEach(function( row ) {
                // Se crean y concatenan las tarjetas con los datos de cada producto.
                content += `
                    <div class="col s12 m6 l4">
                        <div class="card hoverable">
                            <div class="card-image">
                                <img src="../../resources/img/productos/${row.imagen_producto}" class="materialboxed">
                                <a href="detalle.php?id=${row.id_producto}" class="btn-floating halfway-fab waves-effect waves-light red tooltipped" data-tooltip="Ver detalle">
                                    <i class="material-icons">add</i>
                                </a>
                            </div>
                            <div class="card-content">
                                <span class="card-title">${row.nombre_producto}</span>
                                <p>Precio(US$) ${row.precio_producto}</p>
                            </div>
                        </div>
                    </div>
                `;
            });
            // Se asigna como título la categoría de los productos.
            $( '#title' ).text( `Categoría: ${categoria}` );
            // Se agregan las tarjetas a la etiqueta div mediante su id para mostrar los productos.
            $( '#productos' ).html( content );
            // Se inicializa el componente Material Box asignado a las imagenes para que funcione el efecto Lightbox.
            $( '.materialboxed' ).materialbox();
            // Se inicializa el componente Tooltip asignado a los enlaces para que funcionen las sugerencias textuales.
            $( '.tooltipped' ).tooltip();
        } else {
            // Se presenta un mensaje de error cuando no existen datos para mostrar.
            $( '#title' ).html( `<i class="material-icons small">cloud_off</i><span class="red-text">${response.exception}</span>` );
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