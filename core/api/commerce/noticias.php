<?php
require_once('../../helpers/database.php');
require_once('../../helpers/validator.php');
require_once('../../models/noticias.php');

// Se comprueba si existe una acción a realizar, de lo contrario se finaliza el script con un mensaje de error.
if(isset($_GET['action'])){
    //Se instancia la clase noticias
    $noticias = new Noticias;
    //Se declara e inicializa un arreglo para guardar el resultado retornado por la API
    $result = array('status'=> 0, 'message' => null, 'exception' => null);

    switch($_GET['action']){

        case 'readNoticias':
            if($result['dataset']= $noticias->readAllProductosEstado()){
                $result['status'] = 1;
                $result['message'] = 'Busqueda realizada';
                //print_r($result['message']);
                //print_r($result['dataset']);
            }else{
                $result['exception']='Contenido no disponible';
            }
        break;

        case 'readNoticiasNuevas':
            if($result['dataset']= $noticias->readNewProductosEstado()){
                $result['status'] = 1;
                $result['message'] = 'Busqueda realizada';
                //print_r($result['message']);
                //print_r($result['dataset']);
            }else{
                $result['exception']='Contenido no disponible';
            }
        break;

        case 'readOne':
            if($noticias->setId($_POST['id_producto'])){
                if($result['dataset'] = $noticias->readOneProducto()){
                    $result['status'] = 1;
                }else{
                    $result['exception'] = 'Contenido no disponible';
                }
            }else{
                $result['exception'] = 'Noticia incorrecta';
            }
        break;

        default:
        exit('Accion no disponible');
    }
    header('content-type: application/json; charset=utf-8');
    
    print(json_encode($result));
}else{
    exit('Recurso denegado');
}

?>