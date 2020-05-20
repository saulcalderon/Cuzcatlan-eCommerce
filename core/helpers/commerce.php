<?php
/*
*   Clase para definir las plantillas de las páginas web del sitio público.
*/
class Commerce
{
    /*
    *   Método para imprimir la plantilla del encabezado.
    *
    *   Parámetros: $title (título de la página web).
    *
    *   Retorno: ninguno.
    */
    public static function headerTemplate($title)
    {
        // Se imprime el código HTML para el encabezado del documento.
        print('
            <!DOCTYPE html>
            <html lang="es">
            <head>
                <meta charset="utf-8">
                <title>Coffeeshop - '.$title.'</title>
                <link type="image/png" rel="icon" href="../../resources/img/logo.png"/>
                <link type="text/css" rel="stylesheet" href="../../resources/css/materialize.min.css"/>
                <link type="text/css" rel="stylesheet" href="../../resources/css/material-icons.css"/>
                <link type="text/css" rel="stylesheet" href="../../resources/css/commerce.css"/>
                <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
            </head>
            <body>
                <header>
                    <div class="navbar-fixed">
                        <nav class="green">
                            <div class="nav-wrapper">
                                <a href="index.php" class="brand-logo"><img src="../../resources/img/logo.png" height="60"></a>
                                <a href="#" data-target="mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                                <ul class="right hide-on-med-and-down">
                                    <li><a href="index.php"><i class="material-icons left">view_module</i>Catálogo</a></li>
                                    <li><a href="#"><i class="material-icons left">shopping_cart</i>Compras</a></li>
                                    <li><a href="acceder.php"><i class="material-icons left">person</i>Acceder</a></li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                    <ul class="sidenav" id="mobile">
                        <li><a href="index.php"><i class="material-icons left">view_module</i>Catálogo</a></li>
                        <li><a href="#"><i class="material-icons left">shopping_cart</i>Compras</a></li>
                        <li><a href="acceder.php"><i class="material-icons left">person</i>Acceder</a></li>
                    </ul>
                </header>
                <main>
        ');
        // Se llama al método que contiene el código de las cajas de dialogo (modals).
        self::modals();
    }

    /*
    *   Método para imprimir la plantilla del pie.
    *
    *   Parámetros: $controller (nombre del archivo que sirve como controlador de la página web).
    *
    *   Retorno: ninguno.
    */
    public static function footerTemplate($controller)
    {
        // Se imprime el código HTML para el pie del documento.
        print('
                </main>
                <footer class="page-footer green">
                    <div class="container">
                        <div class="row">
                            <div class="col s12 m6 l6">
                                <h5 class="white-text">Nosotros</h5>
                                <p>
                                    <blockquote>
                                        <a href="#mision" class="modal-trigger white-text"><b>Misión</b></a>
                                        <span>|</span>
                                        <a href="#vision" class="modal-trigger white-text"><b>Visión</b></a>
                                        <span>|</span>
                                        <a href="#valores" class="modal-trigger white-text"><b>Valores</b></a>
                                    </blockquote>
                                    <blockquote>
                                        <a href="#terminos" class="modal-trigger white-text"><b>Términos y condiciones</b></a>
                                    </blockquote>
                                </p>
                            </div>
                            <div class="col s12 m6 l6">
                                <h5 class="white-text">Contáctanos</h5>
                                <p>
                                    <blockquote>
                                        <a class="white-text" href="https://www.facebook.com/" target="_blank"><b>facebook</b></a>
                                        <span>|</span>
                                        <a class="white-text" href="https://twitter.com/" target="_blank"><b>twitter</b></a>
                                    </blockquote>
                                    <blockquote>
                                        <a class="white-text" href="https://www.instagram.com/" target="_blank"><b>instagram</b></a>
                                        <span>|</span>
                                        <a class="white-text" href="https://www.youtube.com/" target="_blank"><b>youtube</b></a>
                                    </blockquote>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="footer-copyright">
                        <div class="container">
                            <span>© Coffeeshop, todos los derechos reservados.</span>
                            <span class="grey-text text-lighten-4 right">Diseñado con <a class="red-text text-accent-1" href="http://materializecss.com/" target="_blank"><b>Materialize</b></a></span>
                        </div>
                    </div>
                </footer>
                <script type="text/javascript" src="../../resources/js/jquery-3.4.1.min.js"></script>
                <script type="text/javascript" src="../../resources/js/materialize.min.js"></script>
                <script type="text/javascript" src="../../resources/js/sweetalert.min.js"></script>
                <script type="text/javascript" src="../../core/helpers/components.js"></script>
                <script type="text/javascript" src="../../core/controllers/commerce/initialization.js"></script>
                <script type="text/javascript" src="../../core/controllers/commerce/'.$controller.'"></script>
            </body>
            </html>
        ');
    }

    /*
    *   Método para imprimir las cajas de dialogo (modals).
    */
    private function modals()
    {
        // Se imprime el código HTML de las cajas de dialogo (modals).
        print('
            <!-- Componente Modal para mostrar los Términos y condiciones -->
            <div id="terminos" class="modal">
                <div class="modal-content">
                    <h4 class="center-align">TÉRMINOS Y CONDICIONES</h4>
                    <p>Nuestra empresa ofrece los mejores productos a nivel nacional con una calidad garantizada y...</p>
                </div>
                <div class="divider"></div>
                <div class="modal-footer">
                    <a href="#!" class="modal-action modal-close btn waves-effect"><i class="material-icons">done</i></a>
                </div>
            </div>

            <!-- Componente Modal para mostrar la Misión -->
            <div id="mision" class="modal">
                <div class="modal-content">
                    <h4 class="center-align">MISIÓN</h4>
                    <p>Ofrecer los mejores productos a nivel nacional para satisfacer a nuestros clientes y...</p>
                </div>
                <div class="divider"></div>
                <div class="modal-footer">
                    <a href="#!" class="modal-action modal-close btn waves-effect"><i class="material-icons">done</i></a>
                </div>
            </div>

            <!-- Componente Modal para mostrar la Visión -->
            <div id="vision" class="modal">
                <div class="modal-content">
                    <h4 class="center-align">VISIÓN</h4>
                    <p>Ser la empresa lider en la región ofreciendo productos de calidad a precios accesibles y...</p>
                </div>
                <div class="divider"></div>
                <div class="modal-footer">
                    <a href="#!" class="modal-action modal-close btn waves-effect"><i class="material-icons">done</i></a>
                </div>
            </div>

            <!-- Componente Modal para mostrar los Valores -->
            <div id="valores" class="modal">
                <div class="modal-content center-align">
                    <h4>VALORES</h4>
                    <p>Responsabilidad</p>
                    <p>Honestidad</p>
                    <p>Seguridad</p>
                    <p>Calidad</p>
                </div>
                <div class="divider"></div>
                <div class="modal-footer">
                    <a href="#!" class="modal-action modal-close btn waves-effect"><i class="material-icons">done</i></a>
                </div>
            </div>
        ');
    }
}
?>