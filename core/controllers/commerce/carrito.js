// Constante para establecer la ruta y parámetros de comunicación con la API.
const API_CARRITO = '../../core/api/commerce/carrito.php?action=';

$(document).ready(function () {
    readCart();
})

//Función para leer los productos del carrito.
function readCart() {
    $.ajax({
        url: API_CARRITO + 'readCart',
        dataType: 'json'
    })
        .done(function (response) {
            if (!response.status) {
                sweetAlert(4, response.exception, null);
            }
            fillTable(response.dataset);
            fillNav(response.dataset);
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
    let content = '';
    // Se recorre el conjunto de registros (dataset) fila por fila a través del objeto row.
    console.log(dataset);

    dataset.forEach(function (row) {
        let subtotal = (row.cantidad * row.precio_unitario);
        // Se crean y concatenan las filas de la tabla con los datos de cada registro.
        content += `
            <tr>
                <td><img src="../../resources/img/commerce/productos/pro (2).jpg" alt="" width="80" height="50"></td>
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
    $('#tbody-rows').html(content);
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
    $('#content').text(id);

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


function addProduct(id, ct, pr) {
    $.ajax({
        type: 'post',
        url: API_CARRITO + 'createDetail',
        data: {
            id_producto: id,
            cantidad: ct,
            precio_unitario: pr
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
        data: { id_detalle: id },
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



// // Función que prepara formulario para insertar un registro.
// function openCreateModal() {
//     // Se limpian los campos del formulario.
//     $('#save-form')[0].reset();
//     // Se abre la caja de dialogo (modal) que contiene el formulario.
//     $('#save-modal').modal('open');
//     // Se asigna el título para la caja de dialogo (modal).
//     $('#modal-title').text('Crear categoría');
//     // Se establece el campo de tipo archivo como obligatorio.
//     $('#archivo_categoria').prop('required', true);
// }

// // Función que prepara formulario para modificar un registro.
// function openUpdateModal(id) {
//     // Se limpian los campos del formulario.
//     $('#save-form')[0].reset();
//     // Se abre la caja de dialogo (modal) que contiene el formulario.
//     $('#save-modal').modal('open');
//     // Se asigna el título para la caja de dialogo (modal).
//     $('#modal-title').text('Modificar categoría');
//     // Se establece el campo de tipo archivo como opcional.
//     $('#archivo_categoria').prop('required', false);

//     $.ajax({
//         dataType: 'json',
//         url: API_CATEGORIAS + 'readOne',
//         data: {
//             id_categoria: id
//         },
//         type: 'post'
//     })
//         .done(function (response) {
//             // Se comprueba si la API ha retornado una respuesta satisfactoria, de lo contrario se muestra un mensaje de error.
//             if (response.status) {
//                 // Se inicializan los campos del formulario con los datos del registro seleccionado previamente.
//                 $('#id_categoria').val(response.dataset.id_categoria_producto);
//                 $('#nombre_categoria').val(response.dataset.categoria_producto);
//                 // Se actualizan los campos para que las etiquetas (labels) no queden sobre los datos.
//                 M.updateTextFields();
//             } else {
//                 sweetAlert(2, response.exception, null);
//             }
//         })
//         .fail(function (jqXHR) {
//             // Se verifica si la API ha respondido para mostrar la respuesta, de lo contrario se presenta el estado de la petición.
//             if (jqXHR.status == 200) {
//                 console.log(jqXHR.responseText);
//             } else {
//                 console.log(jqXHR.status + ' ' + jqXHR.statusText);
//             }
//         });
// }

// Evento para crear o modificar un registro.
// $('#save-form').submit(function (event) {
//     // Se evita recargar la página web después de enviar el formulario.
//     event.preventDefault();
//     // Se llama a la función que crea o actualiza un registro. Se encuentra en el archivo components.js
//     // Se comprueba si el id del registro esta asignado en el formulario para actualizar, de lo contrario se crea un registro.
//     if ($('#id_categoria').val()) {
//         saveRow(API_CATEGORIAS, 'update', this, 'save-modal');
//     } else {
//         saveRow(API_CATEGORIAS, 'create', this, 'save-modal');
//     }
// });

// // Función para establecer el registro a eliminar mediante el id recibido.
// function openDeleteDialog(id) {
//     // Se declara e inicializa un objeto con el id del registro que será borrado.
//     let identifier = {
//         id_categoria: id
//     };
//     // Se llama a la función que elimina un registro. Se encuentra en el archivo components.js
//     confirmDelete(API_CATEGORIAS, identifier);
// }