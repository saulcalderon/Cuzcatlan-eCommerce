<?php
/*
*	Clase utilizada como plantilla del diseño del sitio privado
*/
class Dashboard
{
    /*
    *   Método para imprimir la plantilla del encabezado.
    *
    *   Parámetros
    *   $titulo: título de la página web.
    *
    *   Retorno: null.
    */
    public static function headerTemplate($titulo)
    {
        // Se crea una sesión o se reanuda la actual para poder utilizar variables de sesión en las páginas web.
        session_start();
        print('
            <!DOCTYPE html>
            <html lang="es">
                <head>
                    <meta charset="utf-8">
                    <title>Cuzcatlan - ' . $titulo . '</title>
                    <link type="image/png" rel="icon" href="../../resources/img/logo.png"/>
                    <link type="text/css" rel="stylesheet" href="../../resources/css/materialize.min.css"/>
                    <link type="text/css" rel="stylesheet" href="../../resources/css/material-icons.css"/>
                    <link type="text/css" rel="stylesheet" href="../../resources/css/dashboard.css"/>
                    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
                </head>
                <body>
        ');
        // Se obtiene el nombre del archivo de la página web actual o URL.
        $filename = basename($_SERVER['PHP_SELF']);
        //Validación de usuario al mantener sesión abierta
        // Se comprueba si existe una sesión de administrador para mostrar el menú de opciones, de lo contrario se muestra un menú vacío.
        if (isset($_SESSION['id_usuario'])) {
            // Se verifica si la página web actual es diferente a la de Iniciar sesión y a register.php (Crear primer usuario) para no iniciar sesión otra vez, de lo contrario se direcciona a main.php
            if ($filename != 'index.php' && $filename != 'register.php') {
                // Se llama al método que contiene el código de las cajas de dialogo (modals).
                self::modals();
                // Se imprime el código HTML para el encabezado del documento con el menú de opciones.
                print('
                <header>
                    <nav class="pink darken-1">
                        <div class="nav wrapper">
                            <div class="container">
                                <a href="" class="brand-logo center">Cuzcatlán</a>
                                <a href="#" data-target="slide-out" class="sidenav-trigger"><i
                                        class="material-icons">menu</i></a>
                                <!-- <ul class="right collection hide-on-small-and-down">
                
                                </ul> -->
                            </div>
                        </div>
                    </nav>
                    <ul class="sidenav sidenav-fixed black" id="slide-out">
                        <li>
                            <div class="user-view">
                                <div class="background ">
                                    <img src="" alt="" class="responsive-img">
                                </div>
                                <a href="">
                                    <img src="../../resources/img/dashboard/img12-1.jpg" alt="" class="circle +">
                                </a>
                                <span class="white-text name">Daniela Teos</span>
                                <span class="white-text">Encargado de productos</span>
                            </div>
                        </li>
                        <li>
                            <a href="main-j.php" class="white-text"><i class="material-icons blue-text">dashboard</i>Dashboard
                            </a>
                        </li>
                        <li>
                            <a href="usuarios-j.php" class="white-text"><i class="material-icons blue-text">person</i>Usuarios
                            </a>
                        </li>
                        <li>
                            <a href="clientes-j.php" class="white-text"><i class="material-icons blue-text">people</i>Clientes
                            </a>
                        </li>
                        <li>
                            <a href="" class="white-text"><i class="material-icons blue-text">insert_chart</i>Analíticas
                            </a>
                        </li>
                        <li>
                            <a href="productos-j.php" class="white-text"><i class="material-icons blue-text">shop</i>Productos
                            </a>
                        </li>
                        <li>
                            <a href="factura-j.php" class="white-text"><i class="material-icons blue-text">payment</i>Facturas
                            </a>
                        </li>
                        <li>
                            <a href="proveedores-j.php" class="white-text"><i class="material-icons blue-text">local_shipping
                                </i>Proveedores
                            </a>
                        </li>
                    </ul>
                </header>
                <main>
                ');
            } else {
                header('location: main.php');
            }
        } else {
            // Se verifica si la página web actual es diferente a index.php (Iniciar sesión) y a register.php (Crear primer usuario) para direccionar a index.php, de lo contrario se muestra un menú vacío.
            if ($filename != 'index.php' && $filename != 'register.php') {
                header('location: index.php');
            } else {
                // Se imprime el código HTML para el encabezado del documento con un menú vacío cuando sea iniciar sesión o registrar el primer usuario.
                print('
                    <header>
                        <div class="navbar-fixed">
                            <nav class="teal">
                                <div class="nav-wrapper">
                                    <a href="index.php" class="brand-logo"><i class="material-icons">dashboard</i></a>
                                </div>
                            </nav>
                        </div>
                    </header>
                    <main class="container">
                        <h3 class="center-align">' . $titulo . '</h3>
                ');
            }
        }
    }

    /*
    *   Método para imprimir la plantilla del pie.
    *
    *   Parámetros: $controller (nombre del archivo que sirve como controlador de la página web).
    *
    *   Retorno: ninguno.
    */
    public static function footerTemplate()
    {
        // Se imprime el código HTML para el pie del documento.
        print('
                </main>
                <script type="text/javascript" src="../../resources/js/jquery-3.4.1.min.js"></script>
                <script type="text/javascript" src="../../resources/js/materialize.min.js"></script>
                <script type="text/javascript" src="../../resources/js/sweetalert.min.js"></script>
                <!--<script type="text/javascript" src="../../core/helpers/components.js"></script>-->
                <script type="text/javascript" src="../../core/controllers/dashboard/initialization.js"></script>
                <!--<script type="text/javascript" src="../../core/controllers/dashboard/account.js"></script>-->
                
                </body>
            </html>
        ');
    }

    /*
    *   Método para imprimir las cajas de dialogo (modals) de editar pefil y cambiar contraseña.
    */
    private function modals()
    {
        // Se imprime el código HTML de las cajas de dialogo (modals).
        print('
            <!-- Componente Modal para mostrar el formulario de editar perfil -->
            <div id="profile-modal" class="modal">
                <div class="modal-content">
                    <h4 class="center-align">Editar perfil</h4>
                    <form method="post" id="profile-form">
                        <div class="row">
                            <div class="input-field col s12 m6">
                                <i class="material-icons prefix">person</i>
                                <input id="nombres_perfil" type="text" name="nombres_perfil" class="validate" required/>
                                <label for="nombres_perfil">Nombres</label>
                            </div>
                            <div class="input-field col s12 m6">
                                <i class="material-icons prefix">person</i>
                                <input id="apellidos_perfil" type="text" name="apellidos_perfil" class="validate" required/>
                                <label for="apellidos_perfil">Apellidos</label>
                            </div>
                            <div class="input-field col s12 m6">
                                <i class="material-icons prefix">email</i>
                                <input id="correo_perfil" type="email" name="correo_perfil" class="validate" required/>
                                <label for="correo_perfil">Correo</label>
                            </div>
                            <div class="input-field col s12 m6">
                                <i class="material-icons prefix">person_pin</i>
                                <input id="alias_perfil" type="text" name="alias_perfil" class="validate" required/>
                                <label for="alias_perfil">Alias</label>
                            </div>
                        </div>
                        <div class="row center-align">
                            <a href="#" class="btn waves-effect grey tooltipped modal-close" data-tooltip="Cancelar"><i class="material-icons">cancel</i></a>
                            <button type="submit" class="btn waves-effect blue tooltipped" data-tooltip="Guardar"><i class="material-icons">save</i></button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Componente Modal para mostrar el formulario de cambiar contraseña -->
            <div id="password-modal" class="modal">
                <div class="modal-content">
                    <h4 class="center-align">Cambiar contraseña</h4>
                    <form method="post" id="password-form">
                        <div class="row center-align">
                            <label>CLAVE ACTUAL</label>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m6">
                                <i class="material-icons prefix">security</i>
                                <input id="clave_actual_1" type="password" name="clave_actual_1" class="validate" required/>
                                <label for="clave_actual_1">Clave</label>
                            </div>
                            <div class="input-field col s12 m6">
                                <i class="material-icons prefix">security</i>
                                <input id="clave_actual_2" type="password" name="clave_actual_2" class="validate" required/>
                                <label for="clave_actual_2">Confirmar clave</label>
                            </div>
                        </div>
                        <div class="row center-align">
                            <label>CLAVE NUEVA</label>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m6">
                                <i class="material-icons prefix">security</i>
                                <input id="clave_nueva_1" type="password" name="clave_nueva_1" class="validate" required/>
                                <label for="clave_nueva_1">Clave</label>
                            </div>
                            <div class="input-field col s12 m6">
                                <i class="material-icons prefix">security</i>
                                <input id="clave_nueva_2" type="password" name="clave_nueva_2" class="validate" required/>
                                <label for="clave_nueva_2">Confirmar clave</label>
                            </div>
                        </div>
                        <div class="row center-align">
                            <a href="#" class="btn waves-effect grey tooltipped modal-close" data-tooltip="Cancelar"><i class="material-icons">cancel</i></a>
                            <button type="submit" class="btn waves-effect blue tooltipped" data-tooltip="Guardar"><i class="material-icons">save</i></button>
                        </div>
                    </form>
                </div>
            </div>
        ');
    }
}
