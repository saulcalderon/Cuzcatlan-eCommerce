// Constantes para establecer las rutas y parámetros de comunicación con la APIs.
const API_PRODUCTOS = '../../core/api/dashboard/productos.php?action=';
const API_PROVEEDORES = '../../core/api/dashboard/proveedores.php?action=';
const API_NOTICIAS = '../../core/api/dashboard/noticias.php?action=';

// Método que se ejecuta cuando el documento está listo.
$(document).ready(function () {
    // Se declara e inicializa un objeto con la fecha y hora actual del cliente.
    let today = new Date();
    // Se declara e inicializa una variable con el número de horas transcurridas en el día.
    let hour = today.getHours();
    // Se declara e inicializa una variable para guardar un saludo.
    let greeting = '';
    // Dependiendo del número de horas transcurridas en el día, se asigna un saludo para el usuario.
    if (hour < 12) {
        greeting = 'Buenos días';
    } else if (hour < 19) {
        greeting = 'Buenas tardes';
    } else if (hour <= 23) {
        greeting = 'Buenas noches';
    }
    // Se muestra el saludo en la página web.
    $('#greeting').text(greeting);
    // Se llama a la función que muestra una gráfica en la página web.
    graficaProveedores();
    graficaNoticias();
    lineGraphBills();
    lineGraphClients();
    GraphCompras();
});

// Función para graficar la cantidad de proveedores por departamentos.
function graficaProveedores() {
    $.ajax({
            dataType: 'json',
            url: API_PROVEEDORES + 'proveedoresDepartamento',
            data: null
        })
        .done(function (response) {
            // Se comprueba si la API ha retornado datos, de lo contrario se remueve la etiqueta canvas asignada para la gráfica.
            if (response.status) {
                // Se declaran los arreglos para guardar los datos por gráficar.
                let departamento = [];
                let cantidad = [];
                // Se recorre el conjunto de registros devuelto por la API (dataset) fila por fila a través del objeto row.
                response.dataset.forEach(function (row) {
                    // Se asignan los datos a los arreglos.
                    departamento.push(row.departamento);
                    cantidad.push(row.cantidad);
                });
                // Se llama a la función que genera y muestra una gráfica de barras. Se encuentra en el archivo components.js
                barGraph('chart-proveedores', departamento, cantidad, 'Cantidad de proveedores', 'Cantidad de proveedores por departamento');
            } else {
                $('#chart').remove();
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


// Gráfica de noticias por fecha
function graficaNoticias() {
    $.ajax({
            dataType: 'json',
            url: API_NOTICIAS + 'graficaFecha',
            data: null
        })
        .done(function (response) {
            // Se comprueba si la API ha retornado datos, de lo contrario se remueve la etiqueta canvas asignada para la gráfica.
            if (response.status) {
                // Se declaran los arreglos para guardar los datos por gráficar.
                let fecha_registro = [];
                let cantidad = [];
                // Se recorre el conjunto de registros devuelto por la API (dataset) fila por fila a través del objeto row.
                response.dataset.forEach(function (row) {
                    // Se asignan los datos a los arreglos.
                    fecha_registro.push(row.fecha_registro);
                    cantidad.push(row.cantidad);
                });
                // Se llama a la función que genera y muestra una gráfica de barras. Se encuentra en el archivo components.js
                lineGraph('chart-noticias', fecha_registro, cantidad, 'Cantidad de noticias', 'Cantidad de noticias por fecha');
            } else {
                $('#chart').remove();
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

let months = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];

function lineGraphClients() {
    $.ajax({
            url: '../../core/api/dashboard/clientes.php?action=newClients',
            dataType: 'json'
        })
        .done(function (response) {
            // Se comprueba si la API ha retornado una respuesta satisfactoria, de lo contrario se muestra un mensaje de error.
            if (response.status) {
                // Se declaran los arreglos para guardar los datos por gráficar. 
                let posMonths = [];
                let clients = [];
                // Se recorre el conjunto de registros devuelto por la API (dataset) fila por fila a través del objeto row.
                response.dataset.forEach(function (row) {
                    posMonths.push(row.mes);
                    clients.push(row.cantidad);
                })
                // Se recorren dos arreglos para asignar el valor 0 cuando no se registren datos.
                let state = false;
                for (let i = 0; i < months.length; i++) {
                    for (let j = 0; j < posMonths.length; j++) {
                        if (i == parseInt(posMonths[j])) {
                            state = true;
                        }
                    }
                    if (state == false) {
                        clients.splice(i, 0, 0);
                    }
                    state = false;
                }
                // Se llama a la función ubicada en components.js
                lineGraph('chart-clientes', months, clients, 'asdasd', 'Clientes registrados por mes');
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

function lineGraphBills() {
    $.ajax({
            url: '../../core/api/dashboard/factura.php?action=monthlyBills',
            dataType: 'json'
        })
        .done(function (response) {
            // Se comprueba si la API ha retornado una respuesta satisfactoria, de lo contrario se muestra un mensaje de error.
            if (response.status) {
                // Se declaran los arreglos para guardar los datos por gráficar. 
                let posMonths = [];
                let money = [];
                // Se recorre el conjunto de registros devuelto por la API (dataset) fila por fila a través del objeto row.
                response.dataset.forEach(function (row) {
                    posMonths.push(row.mes);
                    money.push(row.cantidad);
                })
                // Se recorren dos arreglos para asignar el valor 0 cuando no se registren datos.
                let state = false;
                for (let i = 0; i < months.length; i++) {
                    for (let j = 0; j < posMonths.length; j++) {
                        if (i == parseInt(posMonths[j])) {
                            state = true;
                        }
                    }
                    if (state == false) {
                        money.splice(i, 0, 0);
                    }
                    state = false;
                }
                // Se llama a la función ubicada en components.js
                lineGraph2('chart-facturas', months, money, 'Total: $ ', 'Ganancias totales por mes');
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

function GraphCompras() {
    $.ajax({
            url: '../../core/api/dashboard/factura.php?action=cantidadCompras',
            dataType: 'json'
        })
        .done(function (response) {
            // Se comprueba si la API ha retornado una respuesta satisfactoria, de lo contrario se muestra un mensaje de error.
            if (response.status) {
                // Se declaran los arreglos para guardar los datos por gráficar. 
                let posMonths = [];
                let cantidad = [];
                let activeMonths = [];
                // Se recorre el conjunto de registros devuelto por la API (dataset) fila por fila a través del objeto row.
                response.dataset.forEach(function (row) {
                    posMonths.push(row.mes);
                    cantidad.push(row.cantidad);
                })
                // Se recorren dos arreglos para asignar el mes correspondiente a la posición.
                for (let i = 0; i < months.length; i++) {
                    for (let j = 0; j < posMonths.length; j++) {
                        if (i == parseInt(posMonths[j])) {
                            activeMonths.push(months[i]);
                        }
                    }
                }
                // Se llama a la función que genera y muestra una gráfica de barras. Se encuentra en el archivo components.js
                pieGraph('chart-compras', activeMonths, cantidad, 'Cantidad :', 'Compras');
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