<?php
require_once('../../helpers/database.php');
require_once('../../helpers/validator.php');
require_once('../../models/usuarios.php');

// Se comprueba si existe una acción a realizar, de lo contrario se finaliza el script con un mensaje de error.
if (isset($_GET['action'])) {
    // Se crea una sesión o se reanuda la actual para poder utilizar variables de sesión en el script.
    session_start();
    // Se instancia al modelo correspondiente.
    $usuario = new Usuarios;
    // Se declara e inicializa un arreglo para guardar el resultado que retorna la API.
    $result = array('status' => 0, 'message' => null, 'exception' => null);
    // Se verifica si existe una sesión iniciada como administrador, de lo contrario se finaliza el script con un mensaje de error.
    //print_r($_SESSION);

    if (isset($_SESSION['id_usuario'])) {
        // Se compara la acción a realizar cuando un administrador ha iniciado sesión.
        switch ($_GET['action']) {
            case 'logout':
                if (session_destroy()) {
                    $result['status'] = 1;
                    $result['message'] = 'Sesión eliminada correctamente';
                } else {
                    $result['exception'] = 'Ocurrió un problema al cerrar la sesión';
                }
                break;
            case 'readProfile':
                if ($usuario->setId($_SESSION['id_usuario'])) {
                    if ($result['dataset'] = $usuario->readOneUsuario()) {
                        $result['status'] = 1;
                    } else {
                        $result['exception'] = 'Usuario inexistente';
                    }
                } else {
                    $result['exception'] = 'Usuario incorrecto';
                }
                break;
            case 'editProfile':
                if ($usuario->setId($_SESSION['id_usuario'])) {
                    if ($usuario->readOneUsuario()) {
                        $_POST = $usuario->validateForm($_POST);
                        if ($usuario->setNombres($_POST['nombres_perfil'])) {
                            if ($usuario->setApellidos($_POST['apellidos_perfil'])) {
                                if ($usuario->setCorreo($_POST['correo_perfil'])) {
                                    if ($usuario->setTelefono($_POST['alias_perfil'])) {
                                        if ($usuario->editProfile()) {
                                            $_SESSION['alias_usuario'] = $usuario->getCorreo();
                                            $result['status'] = 1;
                                            $result['message'] = 'Perfil modificado correctamente';
                                        } else {
                                            $result['exception'] = Database::getException();
                                        }
                                    } else {
                                        $result['exception'] = 'Alias incorrecto';
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
                    } else {
                        $result['exception'] = 'Usuario inexistente';
                    }
                } else {
                    $result['exception'] = 'Usuario incorrecto';
                }
                break;
            case 'password':
                if ($usuario->setId($_SESSION['id_usuario'])) {
                    $_POST = $usuario->validateForm($_POST);
                    if ($_POST['clave_actual_1'] == $_POST['clave_actual_2']) {
                        if ($usuario->setClave($_POST['clave_actual_1'])) {
                            if ($usuario->checkPassword($_POST['clave_actual_1'])) {
                                if ($_POST['clave_nueva_1'] == $_POST['clave_nueva_2']) {
                                    if ($usuario->setClave($_POST['clave_nueva_1'])) {
                                        if ($usuario->changePassword()) {
                                            $result['status'] = 1;
                                            $result['message'] = 'Contraseña cambiada correctamente';
                                        } else {
                                            $result['exception'] = Database::getException();
                                        }
                                    } else {
                                        $result['exception'] = 'Clave nueva menor a 6 caracteres';
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
            case 'readAll':
                if ($result['dataset'] = $usuario->readAllUsuarios()) {
                    $result['status'] = 1;
                    //print_r($_GET['action']);
                    //print_r($result['dataset']);
                } else {
                    $result['exception'] = 'No hay usuarios registrados';
                }
                break;
            case 'search':
                $_POST = $usuario->validateForm($_POST);
                if ($_POST['search'] != '') {
                    if ($result['dataset'] = $usuario->searchUsuarios($_POST['search'])) {
                        $result['status'] = 1;
                        $rows = count($result['dataset']);
                        if ($rows > 1) {
                            $result['message'] = 'Se encontraron ' . $rows . ' coincidencias';
                        } else {
                            $result['message'] = 'Solo existe una coincidencia';
                        }
                    } else {
                        $result['exception'] = 'No hay coincidencias';
                    }
                } else {
                    $result['exception'] = 'Ingrese un valor para buscar';
                }
                break;
            case 'create':
                $_POST = $usuario->validateForm($_POST);
                if ($usuario->setNombres($_POST['nombre'])) {
                    if ($usuario->setApellidos($_POST['apellido'])) {
                        if ($usuario->setCorreo($_POST['correo'])) {
                            if ($usuario->setTelefono($_POST['telefono'])) {
                                if ($_POST['clave_usuario'] == $_POST['confirmar_clave']) {
                                    if ($usuario->setClave($_POST['clave_usuario'])) {
                                        if ($usuario->createUsuario()) {
                                            $result['status'] = 1;
                                            $result['message'] = 'Usuario creado correctamente';
                                        } else {
                                            $result['exception'] = Database::getException();
                                        }
                                    } else {
                                        $result['exception'] = 'Clave menor a 6 caracteres';
                                    }
                                } else {
                                    $result['exception'] = 'Claves diferentes';
                                }
                            } else {
                                $result['exception'] = 'Alias incorrecto';
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
            case 'readOne':
                if ($usuario->setId($_POST['id_usuario'])) {
                    if ($result['dataset'] = $usuario->readOneUsuario()) {
                        $result['status'] = 1;
                    } else {
                        $result['exception'] = 'Usuario inexistente';
                    }
                } else {
                    $result['exception'] = 'Usuario incorrecto';
                }
                break;
            case 'update':
                $_POST = $usuario->validateForm($_POST);
                if ($usuario->setId($_POST['id_administrador'])) {
                    if ($usuario->readOneUsuario()) {
                        if ($usuario->setNombres($_POST['nombre'])) {
                            if ($usuario->setApellidos($_POST['apellido'])) {
                                if ($usuario->setTelefono($_POST['telefono'])) {
                                    if ($usuario->updateUsuario()) {
                                        $result['status'] = 1;
                                        $result['message'] = 'Usuario modificado correctamente';
                                    } else {
                                        $result['exception'] = Database::getException();
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
                    } else {
                        $result['exception'] = 'Usuario inexistente';
                    }
                } else {
                    $result['exception'] = 'Usuario incorrecto';
                }
                break;
            case 'delete':
                if ($_POST['id_usuario'] != $_SESSION['id_usuario']) {
                    if ($usuario->setId($_POST['id_usuario'])) {
                        if ($usuario->readOneUsuario()) {
                            if ($usuario->deleteUsuario()) {
                                $result['status'] = 1;
                                $result['message'] = 'Usuario eliminado correctamente';
                            } else {
                                $result['exception'] = Database::getException();
                            }
                        } else {
                            $result['exception'] = 'Usuario inexistente';
                        }
                    } else {
                        $result['exception'] = 'Usuario incorrecto';
                    }
                } else {
                    $result['exception'] = 'No se puede eliminar a sí mismo';
                }
                break;
            default:
                exit('Acción no disponible log');
        }
    } else {
        // Se compara la acción a realizar cuando el administrador no ha iniciado sesión.
        switch ($_GET['action']) {
            case 'readAll':
                if ($usuario->readAllUsuarios()) {
                    $result['status'] = 1;
                    $result['message'] = 'Existe al menos un usuario registrado';
                } else {
                    $result['exception'] = 'No existen usuarios registrados';
                }
                //print($result['status']);
                break;
            case 'register':
                $_POST = $usuario->validateForm($_POST);
                if ($usuario->setNombres($_POST['nombres'])) {
                    if ($usuario->setApellidos($_POST['apellidos'])) {
                        if ($usuario->setCorreo($_POST['correo'])) {
                            if ($usuario->setTelefono($_POST['telefono'])) {
                                if ($_POST['clave1'] == $_POST['clave2']) {
                                    if ($usuario->setClave($_POST['clave1'])) {
                                        if ($usuario->createUsuario()) {
                                            $result['status'] = 1;
                                            $result['message'] = 'Usuario registrado correctamente';
                                        } else {
                                            $result['exception'] = Database::getException();
                                        }
                                    } else {
                                        $result['exception'] = 'Clave menor a 6 caracteres';
                                    }
                                } else {
                                    $result['exception'] = 'Claves diferentes';
                                }
                            } else {
                                $result['exception'] = 'Telefono incorrecto';
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
                //Seguridad 1
            case 'login':
                $_POST = $usuario->validateForm($_POST);
                //Verficar si el usuario no ha sido bloqueado, utilizando la cookie block
                if (isset($_COOKIE["block" . $_POST['alias']])) {
                    $result['exception'] = 'Su cuenta está bloqueada por un minuto';
                } else {
                    if ($usuario->checkCorreo($_POST['alias'])) {
                        if ($usuario->checkPassword($_POST['clave'])) {
                            //Seguridad 2 (Terminar)
                            // if ($usuario->checkDispositivo()) {
                            $_SESSION['id_usuario'] = $usuario->getId();
                            $_SESSION['alias_usuario'] = $usuario->getNombres() . ' ' . $usuario->getApellidos();
                            $result['status'] = 1;
                            $result['message'] = 'Autenticación correcta';
                            // } else {
                            //     $result['exception'] = "Se tiene una sesión activa en otro dispositivo, cierre sesión y vuelva a intentarlo";
                            // }
                        } else {
                            $result['exception'] = 'Clave incorrecta';
                        }
                    } else {
                        $result['exception'] = 'Alias incorrecto';
                    }

                    //Bloqueo de usuario por intentos, utilizando cookies
                    if ($result['status'] != 1) {
                        if (isset($_COOKIE[$_POST['alias']])) {
                            //print($_COOKIE);

                            $cont =  $_COOKIE[$_POST['alias']];
                            $cont++;
                            setcookie($_POST['alias'], $cont, time() + 120);

                            //print($_COOKIE);
                            //Contador para evaluar los tres intentos del usuario
                            if ($cont >= 3) {
                                //Se setea el tiempo que va a bloquearse el inicio de sesión en segundos, en este caso 60 segundos
                                setcookie("block" . $_POST['alias'], $cont, time() + 60);
                            }
                        } else {
                            setcookie($_POST['alias'], 1, time() + 120);
                        }
                    }
                }

                break;
            case 'recuperar':
                $_POST = $usuario->validateForm($_POST);
                if ($usuario->checkCorreo($_POST['recuperar_mail'])) {

                    require '../../../libraries/phpmailer52/class.phpmailer.php';
                    require '../../../libraries/phpmailer52/class.smtp.php';

                    $token = hash("sha256", uniqid());

                    setcookie('t', $token, time() + 900);

                    $direccion = "http://localhost/Cuzcatlan-eCommerce/views/dashboard/forgot_password.php?t=" . $token;
                    $mail = new PHPMailer;

                    $mail->CharSet = 'UTF-8';
                    //Tell PHPMailer to use SMTP
                    $mail->isSMTP();

                    //Set the hostname of the mail server
                    $mail->Host = 'smtp.gmail.com';

                    //Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
                    $mail->Port = 465;

                    $mail->SMTPSecure = 'ssl';

                    //Whether to use SMTP authentication
                    $mail->SMTPAuth = true;

                    //Username to use for SMTP authentication - use full email address for gmail
                    $mail->Username = 'kamiltik.thecoffeecup@gmail.com';

                    //Password to use for SMTP authentication
                    $mail->Password = 'Kamiltik12';

                    //Set who the message is to be sent from
                    $mail->setFrom('kamiltik.thecoffeecup@gmail.com', 'Kamiltik');

                    //Set who the message is to be sent to
                    $mail->addAddress($_POST['recuperar_mail'], $usuario->getNombres() . ' ' . $usuario->getApellidos());

                    //Set the subject line
                    $mail->Subject = 'Restauración de contraseña';

                    //Replace the plain text body with one created manually
                    $mail->Body = "Restablezca su contraseña haciendo click en el siguiente enlace: " . $direccion;
                    //send the message, check for error

                    if ($mail->send()) {
                        if ($usuario->tokenClave($token)) {
                            $result['status'] = 1;
                            $result['message'] = 'Hemos enviado un correo para que restablezca su contraseña.';
                        } else {
                            $result['exception'] = 'Hubo un error al enviar el correo.';
                        }
                    } else {
                        $result['exception'] = $mail->ErrorInfo;
                    }
                } else {
                    $result['exception'] = 'Correo no registrado';
                }
                break;
            case 'nuevaClave':
                $_POST = $usuario->validateForm($_POST);
                if (isset($_COOKIE['t'])) {
                    if ($usuario->setTokenClave($_POST['token_clave'])) {
                        if ($_POST['token_clave'] == $_COOKIE['t']) {
                            if ($_POST['nueva_clave'] === $_POST['nueva_clave_2']) {
                                if ($usuario->setClave($_POST['nueva_clave'])) {
                                    if ($usuario->changePassword2()) {
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
            default:
                exit('Acción no disponible');
        }
    }
    // Se indica el tipo de contenido a mostrar y su respectivo conjunto de caracteres.
    header('content-type: application/json; charset=utf-8');
    // Se imprime el resultado en formato JSON y se retorna al controlador.
    print(json_encode($result));
} else {
    exit('Recurso denegado');
}
