// Constante para establecer la ruta y parámetros de comunicación con la API.
const API_CARRITO = '../../core/api/commerce/carrito.php?action=';


$(document).ready(function () {
    readCart();

});

let page = 'http://localhost/Cuzcatlan-eCommerce/views/commerce/shopping_cart.php';

//Función para leer los productos del carrito.
function readCart() {
    $.ajax({
            url: API_CARRITO + 'readCart',
            dataType: 'json'
        })
        .done(function (response) {
            if (!response.status) {
                let content;

                if (window.location == page) {
                    content = `
                 <tr>
                     <td>There are no products in your shopping cart.</td>
                     <td></td>
                     <td></td>
                     <td></td>
                 </tr>
                 `;
                } else {
                    content = `
                <tr>
                    <td>No hay productos en su carrito.</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                `;
                }

                $('#tbody-nav').html(content);
                $('#tbody-carrito').html(content);

            }
            if (response.dataset) {
                fillTable(response.dataset);
                fillNav(response.dataset);
            }
        })
        .fail(function (jqXHR) {
            if (jqXHR.status == 200) {
                console.log(jqXHR.responseText);
            } else {
                console.log(jqXHR.status + ' ' + jqXHR.responseText);
            }
        })
};

function fillTable(dataset) {
    if (dataset.length) {
        let content = '';
        let total = 0;

        dataset.forEach(function (row) {
            let subtotal = (row.cantidad * row.precio_unitario);
            total += subtotal;
            // Se crean y concatenan las filas de la tabla con los datos de cada registro.
            content += `
            <tr>
                <td><img class="materialboxed" src="../../resources/img/commerce/productos/pro (2).jpg" alt="" width="80" height="50"></td>
                <td>${row.nombre}</td>
                <td>${row.cantidad}</td>
                <td>${row.precio_unitario}</td>
                <td>${subtotal}</td>
                <td>
                    <a href="#" onclick="updateDetail(${row.id_detalle_factura})"><i class="material-icons green-text">edit</i></a>
                    <a href="#" onclick="deleteDetail(${row.id_detalle_factura})"><i class="material-icons red-text">close</i></a>
                </td>
            </tr>
        `;
        })

        // Se agregan las filas al cuerpo de la tabla mediante su id para mostrar los registros.
        $('#tbody-carrito').html(content);
        $('#finalizar').removeClass('disabled');
        $('#precio').text(total.toFixed(2));

    } else {
        // let page = 'http://localhost/Cuzcatlan-eCommerce/views/commerce/shopping_cart.php'
        let content;

        if (window.location == page) {
            content = `
         <tr>
             <td>There are no products in your shopping cart.</td>
             <td></td>
             <td></td>
             <td></td>
         </tr>
         `;
        } else {
            content = `
        <tr>
            <td>No hay productos en su carrito.</td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        `;
        }

        $('#tbody-nav').html(content);
        $('#tbody-carrito').html(content);
        $('#finalizar').addClass('disabled');
    }
    // Se recorre el conjunto de registros (dataset) fila por fila a través del objeto row.

}

function fillNav(dataset) {
    let content = '';
    // Se recorre el conjunto de registros (dataset) fila por fila a través del objeto row.

    dataset.forEach(function (row) {
        // Se crean y concatenan las filas de la tabla con los datos de cada registro.
        content += `
            <tr>
                <td><img src="../../resources/img/commerce/productos/pro (2).jpg" alt="" width="80" height="50"></td>
                <td>${row.nombre}</td>
                <td>${row.cantidad}</td>
                <td>${row.precio_unitario}</td>
                <td>
                    <a href="#" onclick="deleteDetail(${row.id_detalle_factura})"><i class="material-icons red-text">close</i></a>
                </td>
            </tr>
        `;
    })

    // Se agregan las filas al cuerpo de la tabla mediante su id para mostrar los registros.
    $('#tbody-nav').html(content);
}

$('#update').submit(function (event) {
    // Se evita recargar la página web después de enviar el formulario.
    event.preventDefault();
    // Se comprueba si el id del registro esta asignado en el formulario para actualizar, de lo contrario se crea un registro.
    $.ajax({
            type: 'post',
            url: API_CARRITO + 'update',
            data: $('#updateForm').serialize(),
            dataType: 'json',

        })
        .done(function (response) {
            if (response.status) {
                // Se cargan nuevamente las filas en la tabla de la vista después de agregar o modificar un registro.
                readCart();
                sweetAlert(1, response.message, null);
                // Se cierra la caja de dialogo (modal) donde está el formulario.
                $('#update').modal('close');
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

function updateDetail(id) {
    // Se abre la caja de dialogo (modal) que contiene el formulario.
    $('#update').modal('open');
    // Se asigna el título para la caja de dialogo (modal).
    $('#content').text('Modificar cantidad');

    $.ajax({
            dataType: 'json',
            url: API_CARRITO + 'readOne',
            data: {
                id_detalle: id
            },
            type: 'post'
        })
        .done(function (response) {
            // Se comprueba si la API ha retornado una respuesta satisfactoria, de lo contrario se muestra un mensaje de error.
            if (response.status) {
                // Se inicializan los campos del formulario con los datos del registro seleccionado previamente.
                $('#id_detalle').val(response.dataset.id_detalle_factura);
                $('#cantidad').val(response.dataset.cantidad);
                $('#existencias').text('Existencias: ' + response.dataset.existencias);
                console.log('correcto');

                // Se actualizan los campos para que las etiquetas (labels) no queden sobre los datos.
                M.updateTextFields();
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
}

function addProduct(id, ct) {
    $.ajax({
            type: 'post',
            url: API_CARRITO + 'createDetail',
            data: {
                id_producto: id,
                cantidad: ct
            },
            dataType: 'json',
        })
        .done(function (response) {
            if (!response.status) {
                sweetAlert(4, response.exception, null);
            }
            readCart();
        })
        .fail(function (jqXHR) {
            // Se verifica si la API ha respondido para mostrar la respuesta, de lo contrario se presenta el estado de la petición.
            if (jqXHR.status == 200) {
                console.log(jqXHR.responseText);
            } else {
                console.log(jqXHR.status + ' ' + jqXHR.statusText);
            }
        });
}

function deleteDetail(id) {
    $.ajax({
            type: 'post',
            url: API_CARRITO + 'deleteDetail',
            data: {
                id_detalle: id
            },
            dataType: 'json',
        })
        .done(function (response) {
            if (!response.status) {
                sweetAlert(4, response.exception, null);
            }
            readCart();
        })
        .fail(function (jqXHR) {
            // Se verifica si la API ha respondido para mostrar la respuesta, de lo contrario se presenta el estado de la petición.
            if (jqXHR.status == 200) {
                console.log(jqXHR.responseText);
            } else {
                console.log(jqXHR.status + ' ' + jqXHR.statusText);
            }
        });
}

$('#finalizar').click(function (e) {
    e.preventDefault();
    let precio = parseFloat($('#precio').text());
    console.log(precio);
    $.ajax({
            type: 'post',
            url: API_CARRITO + 'finishBill',
            data: {
                precio: parseFloat(precio)
            },
            dataType: 'json',

        })
        .done(function (response) {
            $('#finalizar').addClass('disabled');
            if (!response.status) {
                sweetAlert(4, response.exception, null);
            } else {
                var toastHTML = response.message;
                M.toast({
                    html: toastHTML
                });
                setTimeout(() => {
                    swal({
                            title: 'Aviso',
                            text: '¿Desea ver el comprobante de compra?',
                            icon: 'success',
                            buttons: ['No, regresar al inicio.', 'Ok'],
                            closeOnClickOutside: false,
                            closeOnEsc: false
                        })
                        .then((value) => {
                            if (value) {
                                console.log(response.dataset);
                                window.open(`http://localhost/Cuzcatlan-eCommerce/core/reports/commerce/comprobante.php?action=comprobante`);
                                setTimeout(() => {
                                    window.location = 'http://localhost/Cuzcatlan-eCommerce/views/commerce/index.php';
                                }, 1000);

                            } else {
                                window.location = 'http://localhost/Cuzcatlan-eCommerce/views/commerce/index.php';
                            }
                        });
                }, 3000);




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