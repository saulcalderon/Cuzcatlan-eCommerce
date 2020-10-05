<?php
require_once('../../helpers/database.php');
require_once('../../helpers/validator.php');
require_once('../../models/clientes.php');

//Se comprueba si existe una acción, de lo contrario se finaliza el Script con un mensaje de error.
if (isset($_GET['action'])) {
    //Se crea una sesión o se reanuda la actual para utilizar variables de sesión
    session_start();
    //Se instancia su clase
    $cliente = new Clientes;
    // Se declara e inicializa un arreglo para guardar el resultado que retorna la API.
    $result = array('status' => 0, 'message' => null, 'exception' => null);
    // Se verifica si existe una sesión iniciada como cliente para realizar las acciones correspondientes.
    if (isset($_SESSION['id_cliente'])) {
        // Se compara la acción a realizar cuando un cliente ha iniciado sesión.
        switch ($_GET['action']) {
            case 'logout':
                 //Sirve para el conteo de expiracion de sesion
                 if(time()-$_SESSION['tiempo1']>300){ //Se recomienda 300s para el equivalente a 5min
                    unset($_SESSION['id_cliente']);
                    $result['status'] = 1;
                }else{
                    $_SESSION['tiempo'] = time();
                }
                break;
            case 'readProfile':
                if ($cliente->setId($_SESSION['id_cliente'])) {
                    if ($result['dataset'] = $cliente->readOneCliente()) {
                        $result['status'] = 1;
                    } else {
                        $result['exception'] = 'Usuario inexistente';
                    }
                } else {
                    $result['exception'] = 'Usuario incorrecto';
                }
                break;

            case 'editProfile':
                print_r('Voy a editarlo');
                if ($cliente->setId($_SESSION['id_cliente'])) {
                    if ($cliente->readOneCliente()) {
                        print_r($_POST['nombres_cliente']);
                        if ($cliente->setNombre($_POST['nombres_cliente'])) {
                            if ($cliente->setApellido($_POST['apellidos_cliente'])) {
                                if ($cliente->setNacimiento($_POST['nacimiento_cliente'])) {
                                    if ($cliente->setTelefono($_POST['telefono_cliente'])) {
                                        if ($cliente->setCorreo($_POST['correo_cliente'])) {
                                            if ($cliente->setDireccion($_POST['direccion_cliente'])) {
                                                if ($cliente->editProfile()) {
                                                    $result['status'] = 1;
                                                    $result['message'] = 'Editado con éxito';
                                                } else {
                                                    $result['exception'] = 'No se pudo editar';
                                                }
                                            } else {
                                                $result['exception'] = 'Direccion incorrecta';
                                            }
                                        } else {
                                            $result['exception'] = 'Correo incorrecto';
                                        }
                                    } else {
                                        $result['exception'] = 'Telefono incorrecto';
                                    }
                                } else {
                                    $result['exception'] = 'Fecha de nacimiento incorrecta';
                                }
                            } else {
                                $result['exception'] = 'Apellido incorrecto';
                            }
                        } else {
                            $result['exception'] = 'Nombre incorrecto';
                        }
                    } else {
                        $result['exception'] = 'El usuario no existe o es incorrecto';
                    }
                } else {
                    $result['exception'] = 'El usuario no existe';
                }
                break;

            case 'changePassword':
                if ($cliente->setId($_SESSION['id_cliente'])) {
                    $_POST = $cliente->validateForm($_POST);
                    if ($_POST['clave_actual_1'] == $_POST['clave_actual_2']) {
                        if ($cliente->setClave($_POST['clave_actual_1'])) {
                            if ($cliente->checkPassword($_POST['clave_actual_1'])) {
                                if ($_POST['clave_nueva_1'] == $_POST['clave_nueva_2']) {
                                    if ($cliente->setClave($_POST['clave_nueva_1'])) {
                                        if ($cliente->changePassword()) {
                                            $result['status'] = 1;
                                            $result['message'] = 'Contraseña cambiada correctamente';
                                        } else {
                                            $result['exception'] = Database::getException();
                                        }
                                    } else {
                                        $result['exception'] = $cliente->getPasswordError(); //getPassword para validar contraseña
                                    }
                                } else {
                                    $result['exception'] = 'Claves nuevas diferentes';
                                }
                            } else {
                                $result['exception'] = 'Clave actual incorrecta';
                            }
                        } else {
                            $result['exception'] = 'Clave actual menor a 6 caracteres';
                        }
                    } else {
                        $result['exception'] = 'Claves actuales diferentes';
                    }
                } else {
                    $result['exception'] = 'Usuario incorrecto';
                }
                break;

            default:
                exit('Acción no disponible dentro de la sesión');
        }
    } else {
        // Se compara la acción a realizar cuando el cliente no ha iniciado sesión.
        switch ($_GET['action']) {
            case 'register':
                $_POST = $cliente->validateForm($_POST);
                if ($cliente->setNombre($_POST['nombres_cliente'])) {
                    if ($cliente->setApellido($_POST['apellidos_cliente'])) {
                        if ($cliente->setCorreo($_POST['correo_cliente'])) {
                            if ($cliente->setDireccion($_POST['direccion_cliente'])) {
                                if ($cliente->setNacimiento($_POST['nacimiento_cliente'])) {
                                    if ($cliente->setTelefono($_POST['telefono_cliente'])) {
                                        if ($_POST['clave_cliente'] == $_POST['confirmar_clave']) {
                                            if ($cliente->setClave($_POST['clave_cliente'])) {
                                                if ($cliente->createCliente()) {
                                                    $result['status'] = 1;
                                                    $result['message'] = 'Cliente registrado correctamente';
                                                } else {
                                                    $result['exception'] = 'Ocurrió un problema al registrar el cliente';
                                                }
                                            } else {
                                                $result['exception'] = $cliente->getPasswordError(); //getPassword para validar contraseña
                                            }
                                        } else {
                                            $result['exception'] = 'Claves diferentes';
                                        }
                                    } else {
                                        $result['exception'] = 'Teléfono incorrecto';
                                    }
                                } else {
                                    $result['exception'] = 'Fecha de nacimiento incorrecta';
                                }
                            } else {
                                $result['exception'] = 'Dirección incorrecta';
                            }
                        } else {
                            $result['exception'] = 'Correo incorrecto';
                        }
                    } else {
                        $result['exception'] = 'Apellidos incorrectos';
                    }
                } else {
                    $result['exception'] = 'Nombres incorrectos';
                }
                break;
            case 'login':
                $_POST = $cliente->validateForm($_POST);
                if ($cliente->checkUser($_POST['correo_cliente'])) {
                    if ($cliente->getEstado()) {
                        if ($cliente->checkPassword($_POST['clave'])) {

                            $_SESSION['id_cliente_auth'] = $cliente->getId();
                            $_SESSION['correo_cliente'] = $cliente->getCorreo();
                            $_SESSION['nombre_cliente'] = $cliente->getNombre();

                            $token = uniqid();

                            $direccion = "http://localhost/Cuzcatlan-eCommerce/views/commerce/autenticar.php?t=" . $token;


                            $body = "Confirme su inicio de sesión en el siguiente link: " . $direccion;

                            $subject = 'Confirmar inicio de sesión';
                            if ($cliente->sendMail($body, $subject)) {
                                if ($cliente->tokenAuth($token)) {
                                    $result['status'] = 1;
                                    $_SESSION['tiempo'] = time();
                                    $result['message'] = 'Se ha enviado un correo para validar su sesión.';
                                } else {
                                    $result['exception'] = "Hubo un error al enviar el correo.";
                                }
                            } else {
                                $result['exception'] = "Hubo un error al enviar el correo.";
                            }
                        } else {
                            $result['exception'] = 'Clave incorrecta';
                        }
                    } else {
                        $result['exception'] = 'Su cuenta ha sido desactivada';
                    }
                } else {
                    $result['exception'] = 'Alias incorrecto';
                }
                break;
            case 'recuperar':
                $_POST = $cliente->validateForm($_POST);
                if ($cliente->checkUser($_POST['recuperar_mail'])) {

                    $token = uniqid();

                    $direccion = "http://localhost/Cuzcatlan-eCommerce/views/commerce/forgot_password.php?t=" . $token;

                    $body = "Restablezca su contraseña haciendo click en el siguiente enlace: " . $direccion;

                    $subject = 'Restaurar contraseña';
                    if ($cliente->sendMail($body, $subject)) {
                        if ($cliente->tokenClave($token)) {
                            $_SESSION['correo'] = $cliente->getCorreo();
                            $result['status'] = 1;
                            $result['message'] = 'Hemos enviado un correo para que restablezca su contraseña.';
                        } else {
                            $result['exception'] = 'Hubo un error al enviar el correo.';
                        }
                    } else {
                        $result['exception'] = 'Hubo un error al enviar el correo.';
                    }
                } else {
                    $result['exception'] = 'Correo no registrado';
                }
                break;
            case 'nuevaClave':
                $_POST = $cliente->validateForm($_POST);
                if ($cliente->checkUser($_SESSION['correo'])) {
                    if ($cliente->setTokenClave($_POST['token_clave'])) {
                        if ($cliente->verifyTokenClave()) {
                            if ($_POST['nueva_clave'] === $_POST['nueva_clave_2']) {
                                if ($cliente->setClave($_POST['nueva_clave'])) {
                                    if ($cliente->changePassword2()) {
                                        $cliente->deleteTokenClave();
                                        $result['status'] = 1;
                                        $result['message'] = 'Contraseña actualizada correctamente.';
                                    } else {
                                        $result['exception'] = 'Hubo un error al cambiar la contraseña.';
                                    }
                                } else {
                                    $result['exception'] = 'Hubo un error al cambiar la contraseña.';
                                }
                            } else {
                                $result['exception'] = 'Las contraseñas no coinciden.';
                            }
                        } else {
                            $result['exception'] = 'Hubo un error al cambiar la contraseña.';
                        }
                    } else {
                        $result['exception'] = 'Hubo un error al cambiar la contraseña.';
                    }
                } else {
                    $result['exception'] = 'Hubo un error al cambiar la contraseña.';
                }
                break;

            case 'auth':
                $_POST = $cliente->validateForm($_POST);
                if ($cliente->setTokenClave($_POST['token_clave'])) {
                    if ($cliente->verifyTokenAuth(filter_var($_POST['auth'], FILTER_VALIDATE_BOOLEAN), $_SESSION['id_cliente_auth'])) {
                        $cliente->deleteTokenAuth($_SESSION['id_cliente_auth']);
                        $_SESSION['id_cliente'] =  $_SESSION['id_cliente_auth'];
                        $result['status'] = 1;
                        $result['message'] = 'Sesión verificada.';
                    } else {
                        $cliente->deleteTokenAuth($_SESSION['id_cliente_auth']);
                        $result['message'] = 'Sesión denegada.';
                    }
                } else {
                    $result['exception'] = 'Hubo un error al verificar su inicio de sesión, vuelva a intentarlo.';
                }
                break;
            default:
                exit('Acción no disponible fuera de la sesión');
        }
    }
    // Se indica el tipo de contenido a mostrar y su respectivo conjunto de caracteres.
    header('content-type: application/json; charset=utf-8');
    // Se imprime el resultado en formato JSON y se retorna al controlador.
    print(json_encode($result));
} else {
    exit('Recurso Denegado');
}
