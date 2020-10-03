//Constante para establecer la ruta y comunicación con la API de clientes
const API_CLIENTES = '../../core/api/commerce/clientes.php?action=';


$(document).ready(function(){
    //Método utilizado para abrir el modal dentro de registrarse
    $('.modal').modal();

    // Método que se ejecuta cuando carga la biblioteca reCAPTCHA.
    grecaptcha.ready(function() {
        // Se declara e inicializa una variable para guardar la llave pública del reCAPTCHA.
        let publicKey = '6LdBzLQUAAAAAJvH-aCUUJgliLOjLcmrHN06RFXT';
        // Se obtiene un token para la página web mediante la llave pública.
        grecaptcha.execute( publicKey, { action: 'homepage' } )
        .then(function( token ) {
            // Se asigna el valor del token al campo oculto del formulario
            $( '#g-recaptcha-response' ).val( token );
        });
    });

    // Se declara e inicializa un objeto para obtener la fecha y hora actual.
    let today = new Date();
    // Se declara e inicializa una variable para guardar el día en formato de 2 dígitos.
    let day = ( '0' + today.getDate() ).slice( -2 );
    // Se declara e inicializa una variable para guardar el mes en formato de 2 dígitos.
    var month = ( '0' + ( today.getMonth() + 1 ) ).slice( -2 );
    // Se declara e inicializa una variable para guardar el año con la mayoría de edad.
    let year = today.getFullYear() - 18;
    // Se declara e inicializa una variable para establecer el formato de la fecha.
    let date = (`${year}-${month}-${day}`);
    // Se asigna la fecha como valor máximo en el campo del formulario.
    $( '#nacimiento_cliente' ).prop( 'max', date );
});


$('#register-form').submit(function( event ){
    //Se evita recargar la página después de enviar la información
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
            sweetAlert( 1, response.message, 'iniciar_sesion.php' );
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