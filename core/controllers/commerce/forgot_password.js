const API_CLIENTES = '../../core/api/commerce/clientes.php?action=';

$('#nueva_clave_form').submit(function (e) {
    e.preventDefault();
    let params = new URLSearchParams(location.search);
    const t = params.get('t');
    $.ajax({
            type: 'post',
            url: API_CLIENTES + 'nuevaClave',
            data: {
                nueva_clave: $('#nueva_clave').val(),
                nueva_clave_2: $('#nueva_clave_2').val(),
                token_clave: t
            },
            dataType: 'json'
        })
        .done(function (response) {
            // Se comprueba si la API ha retornado una respuesta satisfactoria, de lo contrario se muestra un mensaje de error.
            if (response.status) {
                sweetAlert(1, response.message, null);
                setTimeout(() => {
                    location.href = 'http://localhost/Cuzcatlan-eCommerce/views/commerce/iniciar_sesion.php';
                }, 3000);
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

