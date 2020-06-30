<?php
require_once('../../helpers/database.php');
require_once('../../helpers/validator.php');
require_once('../../models/commerce/descuento.php');

// Se comprueba si existe una acción a realizar, de lo contrario se finaliza el script con un mensaje de error.
if (isset($_GET['action'])) {
    // Se crea una sesión o se reanuda la actual para poder utilizar variables de sesión en el script.
    session_start();
    // Se instancia la clase correspondiente.
    $descuento = new  Descuento;
    // Se declara e inicializa un arreglo para guardar el resultado que retorna la API.
    $result = array('status' => 0, 'message' => null, 'exception' => null);
    // Se verifica si existe una sesión iniciada como administrador, de lo contrario se finaliza el script con un mensaje de error.
    if (/*isset($_SESSION['id_usuario'])*/1) {
        // Se compara la acción a realizar cuando un administrador ha iniciado sesión.
        switch ($_GET['action']) {
            case 'readAll':
                if ($descuento->setPrecio(<=10)) {
                    if ($result['dataset'] = $descuento->readAllDescuento()) {
                        
                        $result['status'] = 2;
                        $result['message'] = 'Cantidad modificada correctamente';

                    } else {
                        $result['exception'] = 'Problema en el formulario';
                    }
                } else {
                    $result['exception'] = 'Cliente incorrecto';
                }
                break;
            case 'readCart':
                if ($carrito->setIdCliente(1)) {
                    if ($carrito->readBill2()) {
                        if ($result['dataset'] = $carrito->readOneDetail()) {
                            $result['status'] = 1;
                            $_SESSION['id_factura'] = $carrito->getIdFactura();
                        } else {
                            $result['exception'] = 'Factura incorrecta';
                        }
                    } else {
                        $result['exception'] = 'Problema en el carrito';
                    }
                } else {
                    $result['exception'] = 'Cliente incorrecto';
                }
                break;
            case 'update':
                $_POST = $carrito->validateForm($_POST);
                if ($carrito->setIdDetalle($_POST['id_detalle'])) {
                    if ($carrito->setCantidad($_POST['cantidad'])) {
                        if ($carrito->updateDetail()) {
                            $result['status'] = 1;
                            $result['message'] = 'Cantidad modificada correctamente';
                        } else {
                            $result['exception'] = 'Ocurrió un problema al modificar la cantidad';
                        }
                    } else {
                        $result['exception'] = 'Cantidad incorrecta';
                    }
                } else {
                    $result['exception'] = 'Detalle incorrecto';
                }
                break;
            case 'deleteDetail':
                if ($carrito->setIdDetalle($_POST['id_detalle'])) {
                    if ($carrito->deleteDetail()) {
                        $result['status'] = 1;
                        $result['message'] = 'Producto eliminado correctamente';
                    } else {
                        $result['exception'] = Database::getException();
                    }
                } else {
                    $result['exception'] = 'Detalle incorrecto';
                }
                break;
            case 'readOne':
                if ($carrito->setIdDetalle($_POST['id_detalle'])) {
                    if ($result['dataset'] = $carrito->readOne()) {
                        $result['status'] = 1;
                    } else {
                        $result['exception'] = 'Detalle inexistente';
                    }
                } else {
                    $result['exception'] = 'Detalle incorrecto';
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
        exit('Acceso no disponible');
    }
} else {
    exit('Recurso denegado');
}