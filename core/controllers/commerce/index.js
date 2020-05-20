// Constante para establecer la ruta y parámetros de comunicación con la API.
const API_CATALOGO = '../../core/api/commerce/catalogo.php?action=';

// Método que se ejecuta cuando el documento está listo.
$( document ).ready(function() {
    // Se inicializa el componente Slider para que funcione el carrusel de imágenes.
    $( '.slider' ).slider();
    // Se llama a la función que muestra las categorías disponibles.
    readAllCategorias();
});

// Función para obtener y mostrar las categorías disponibles.
function readAllCategorias()
{
    $.ajax({
        dataType: 'json',
        url: API_CATALOGO + 'readAllCategorias'
    })
    .done(function( response ) {
        // Se comprueba si la API ha retornado datos, de lo contrario se muestra un mensaje de error en pantalla.
        if ( response.status ) {
            let content = '';
            let url = '';
            // Se recorre el conjunto de registros devuelto por la API (dataset) fila por fila a través del objeto row.
            response.dataset.forEach(function( row ) {
                // Se define una dirección con los datos de cada categoría para mostrar sus productos en otra página web.
                url = `productos.php?id=${row.id_categoria}&nombre=${row.nombre_categoria}`;
                // Se crean y concatenan las tarjetas con los datos de cada categoría.
                content += `
                    <div class="col s12 m6 l4">
                        <div class="card hoverable">
                            <div class="card-image waves-effect waves-block waves-light">
                                <img class="activator" src="../../resources/img/categorias/${row.imagen_categoria}">
                            </div>
                            <div class="card-content">
                                <span class="card-title activator grey-text text-darken-4">
                                    ${row.nombre_categoria}
                                    <i class="material-icons right">more_vert</i>
                                </span>
                                <p class="center">
                                    <a href="${url}" class="tooltipped" data-tooltip="Ver más">
                                        <i class="material-icons small">local_cafe</i>
                                    </a>
                                </p>
                            </div>
                            <div class="card-reveal">
                                <span class="card-title grey-text text-darken-4">
                                    ${row.nombre_categoria}
                                    <i class="material-icons right">close</i>
                                </span>
                                <p>${row.descripcion_categoria}</p>
                            </div>
                        </div>
                    </div>
                `;
            });
            // Se agregan las tarjetas a la etiqueta div mediante su id para mostrar las categorías.
            $( '#categorias' ).html( content );
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