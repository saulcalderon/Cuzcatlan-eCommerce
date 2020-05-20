// Constante para establecer la ruta y parámetros de comunicación con la API.
const API_CLIENTES = '../../core/api/commerce/clientes.php?action=';

// Método que se ejecuta cuando el documento está listo.
$( document ).ready(function() {
    // Se inicializa el componente Tabs para que funcionen las pestañas donde se encuentran los formularios.
    $( '.tabs' ).tabs();
    // Método que se ejecuta cuando carga la biblioteca reCAPTCHA.
    grecaptcha.ready(function() {
        // Se declara e inicializa una variable para guardar la llave pública del reCAPTCHA.
        let publicKey = '6LdBzLQUAAAAAJvH-aCUUJgliLOjLcmrHN06RFXT';
        // Se obtiene un token para la página web mediante la llave pública y se asigna el valor a un campo del formulario.
        grecaptcha.execute( publicKey, { action: 'homepage' } )
        .then(function( token ) {
            $( '#g-recaptcha-response' ).val( token );
        });
    });
});

// Evento para realizar el registro de un cliente.
$( '#register-form' ).submit(function( event ) {
    // Se evita recargar la página web después de enviar el formulario.
    event.preventDefault();
    $.ajax({
        type: 'post',
        url: API_CLIENTES + 'register',
        data: $( '#register-form' ).serialize(),
        dataType: 'json'
    })
    .done(function( response ) {
        // Se comprueba si la API ha retornado una respuesta satisfactoria, de lo contrario se muestra un mensaje de error.
        if ( response.status ) {
            sweetAlert( 1, response.message, null );
        } else {
            sweetAlert( 2, response.exception, null );
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
});