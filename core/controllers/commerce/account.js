/*
*   Este controlador es de uso general en las páginas web del sitio público. Se importa en la plantilla del pie del documento.
*   Sirve para manejar todo lo que tiene que ver con la cuenta del cliente.
*/

// Constante para establecer la ruta y parámetros de comunicación con la API.
const API = '../../core/api/commerce/clientes.php?action=';


$('#check-passwords').change(function(){
    if($(this).is(":checked")){
      $(".passwords").show();
    }else{
      $(".passwords").hide();
    }
  });

// Función que abre una caja de dialogo para confirmar el cierre de la sesión del usuario. Requiere el archivo sweetalert.min.js para funcionar.
function logOut()
{
    swal({
        title: 'Advertencia',
        text: '¿Está seguro de cerrar la sesión?',
        icon: 'warning',
        buttons: [ 'No', 'Sí' ],
        closeOnClickOutside: false,
        closeOnEsc: false
    })
    .then(function( value ) {
        // Se verifica si fue cliqueado el botón Sí para hacer la petición de cerrar sesión, de lo contrario se continua con la sesión actual.
        if ( value ) {
            $.ajax({
                dataType: 'json',
                url: API + 'logout'
            })
            .done(function( response ) {
                // Se comprueba si la API ha retornado una respuesta satisfactoria, de lo contrario se muestra un mensaje de error.
                if ( response.status ) {
                    sweetAlert( 1, response.message, 'index.php' );
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
        } else {
            sweetAlert( 4, 'Puede continuar con la sesión', null );
        }
    });
}

//Funcion para cerrar sesion por inactividad
function closeSession()
{
    $.ajax({
        dataType: 'json',
        url: API + 'closeSession'
    })
    .done(function(response){
        // Se comprueba si la API ha retornado una respuesta satisfactoria, de lo contrario se muestra un mensaje de error.
        if (response.status) {
            sweetAlert( 4, 'Su sesion ha caducado',  'iniciar_sesion.php');
        }
    })
    .fail (function (jqXHR){
          // Se verifica si la API ha respondido para mostrar la respuesta, de lo contrario se presenta el estado de la petición.
          if (jqXHR.status == 200) {
            console.log(jqXHR.responseText);
        } else {
            console.log(jqXHR.status + ' ' + jqXHR.statusText);
        }
    });
}

function openModalPasswords(){
    $('#password-modal').modal('open');

}
function openModalProfile(){
    $('#profile-modal').modal('open');

    $.ajax({
        dataType: 'json',
        url: API + 'readProfile'
    })
    .done(function(response){
        // Se comprueba si la API ha retornado una respuesta satisfactoria, de lo contrario se muestra un mensaje de error.
        if (response.status) {
            // Se inicializan los campos del formulario con los datos del usuario que ha iniciado sesión.
            $('#nombres_cliente').val(response.dataset.nombre);
            $('#apellidos_cliente').val(response.dataset.apellido);
            $('#correo_cliente').val(response.dataset.correo);
            $('#telefono_cliente').val(response.dataset.telefono);
            $('#direccion_cliente').val(response.dataset.direccion);
            $('#nacimiento_cliente').val(response.dataset.nacimiento);
            // Se actualizan los campos para que las etiquetas (labels) no queden sobre los datos.
            M.updateTextFields();
        } else {
            sweetAlert(2, response.exception, null);
        }
    })
    .fail (function (jqXHR){
          // Se verifica si la API ha respondido para mostrar la respuesta, de lo contrario se presenta el estado de la petición.
          if (jqXHR.status == 200) {
            console.log(jqXHR.responseText);
        } else {
            console.log(jqXHR.status + ' ' + jqXHR.statusText);
        }
    });
}

// Evento para editar el perfil del usuario que ha iniciado sesión.
$('#profile-form').submit(function (event) {
    // Se evita recargar la página web después de enviar el formulario.
    event.preventDefault();
    $.ajax({
            type: 'post',
            url: API + 'editProfile',
            data: $('#profile-form').serialize(),
            dataType: 'json'
        })
        .done(function (response) {
            // Se comprueba si la API ha retornado una respuesta satisfactoria, de lo contrario se muestra un mensaje de error.
            if (response.status) {
                // Se cierra la caja de dialogo (modal) con el formulario para editar perfil, ubicado en el archivo de las plantillas.
                sweetAlert(1, response.message, 'index.php');
            } else {
                sweetAlert(2, response.exception, null);
            }
        })
        .fail(function (jqXHR) {
            // Se verifica si la API ha respondido para mostrar la respuesta, de lo contrario se presenta el estado de la petición.
            if (jqXHR.status == 200) {
                console.log(jqXHR.responseText);
            } else {
                console.log(jqXHR.status + ' ' + jqXHR.statusText);
            }
        });
});

// Evento para editar el perfil del usuario que ha iniciado sesión.
$('#password-form').submit(function (event) {
    // Se evita recargar la página web después de enviar el formulario.
    event.preventDefault();
    $.ajax({
            type: 'post',
            url: API + 'changePassword',
            data: $('#password-form').serialize(),
            dataType: 'json'
        })
        .done(function (response) {
            // Se comprueba si la API ha retornado una respuesta satisfactoria, de lo contrario se muestra un mensaje de error.
            if (response.status) {
                // Se cierra la caja de dialogo (modal) con el formulario para editar perfil, ubicado en el archivo de las plantillas.
                sweetAlert(1, response.message, 'index.php');
            } else {
                sweetAlert(2, response.exception, null);
            }
        })
        .fail(function (jqXHR) {
            // Se verifica si la API ha respondido para mostrar la respuesta, de lo contrario se presenta el estado de la petición.
            if (jqXHR.status == 200) {
                console.log(jqXHR.responseText);
            } else {
                console.log(jqXHR.status + ' ' + jqXHR.statusText);
            }
        });
});
