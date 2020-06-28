const API_MAPA = '../../core/api/commerce/mapa.php?action='

function modalInfo(id, name) {
    $('.load').removeClass('hide');
    $('#p-dep').addClass('hide');
    $('#modal2').modal('open');
    $('#modal-header').text(name);
    carga();
    $.ajax({
            type: 'post',
            url: API_MAPA + 'readDepartment',
            data: {
                id_departamento: id
            },
            dataType: 'json',
        })
        .done(function (response) {
            if (response.status) {

                fillDepartment(response.dataset);
            } else {
                $('#modal2').modal('close');
                sweetAlert(4, response.exception, null);
            }

        })
        .fail(function (jqXHR) {
            if (jqXHR.status == 200) {
                console.log(jqXHR.responseText);
            } else {
                console.log(jqXHR.status + ' ' + jqXHR.responseText);
            }
        })
}

function fillDepartment(dataset) {
    let content = '';
    let suma = 0;
    // Se recorre el conjunto de registros (dataset) fila por fila a través del objeto row.
    dataset.forEach(function (row) {
        // Se crean y concatenan las filas de la tabla con los datos de cada registro.
        suma += 1;
        content += `
             <tr class="hoverable pointer">
                <td><img src="../../resources/img/commerce/productos/pro (${suma}).jpg" alt="" width="80"></td>
                <td>${row.nombre}</td>
                <td>${row.existencias}</td>
                <td>${row.precio_unitario}</td>
                <td>${row.categoria_producto}</td>
                <td>${row.nombre_empresa}</td>
             </tr>   
            `;
    })
    // Se agregan las filas al cuerpo de la tabla mediante su id para mostrar los registros.
    $('#tbody-dep').html(content);
    $('.load').addClass('hide');
    $('#p-dep').removeClass('hide');
}


