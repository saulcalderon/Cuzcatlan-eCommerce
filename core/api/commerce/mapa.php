<?php
require_once('../../helpers/database.php');
require_once('../../helpers/validator.php');
require_once('../../models/commerce/mapa.php');


if (isset($_GET['action'])) {
    // Se instancia la clase correspondiente.
    $mapa = new  Mapa;
    // Se declara e inicializa un arreglo para guardar el resultado que retorna la API.
    $result = array('status' => 0, 'message' => null, 'exception' => null);
    // Se compara la acción a realizar.
    switch ($_GET['action']) {
        case 'readDepartment':
            if ($mapa->setIdDepartamento($_POST['id_departamento'])) {
                if ($result['dataset'] = $mapa->readDepartment()) {
                    $result['status'] = 1;
                } else {
                    $result['exception'] = 'No hay productos de este departamento, Lo sentimos.';
                }
            } else {
                $result['exception'] = 'Departamento incorrecto';
            }
            break;
        default:
            exit('Acción no disponible');
    }
    // Se indica el tipo de contenido a mostrar y su respectivo conjunto de caracteres.
    header('content-type: application/json; charset=utf-8');
    // Se imprime el resultado en formato JSON y se retorna al controlador.
    print(json_encode($result));
} else {
    exit('Recurso denegado');
}
