<?php
require_once('../../core/helpers/commerce.php');
Commerce::headerTemplate();
?>
<!-- Contenido principal -->
<main>
    <section>
        <div class="container login-container">
            <div class="row">
                <div class="col s12 m6 margin">
                    <div class="card-panel white">
                        <div class="container login-container">
                            <h3 class="center-align">Inicio de Sesión</h3>
                            <div class="row">
                                <form method="post" id="session-form" class="col s12">
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <input id="correo_cliente" name="correo_cliente" type="email" class="validate" required>
                                            <label for="correo_cliente">Correo Electrónico</label>
                                            <span class="helper-text" data-error="wrong" data-success="right"></span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <input id="clave" name="clave" type="password" class="validate" required>
                                            <label for="clave">Contraseña</label>
                                            <span class="helper-text" data-error="wrong" data-success="right"></span>
                                        </div>
                                    </div>
                                    <div class="row margin">
                                        <div class="col s12 center">
                                            <button type="submit" class="btn waves-effect waves-light btn-large black" data-tooltip="Ingresar">Iniciar Sesión<i class="material-icons right">send</i></button>
                                        </div>
                                        <div class="col s12 center-align margin">
                                            <a class="modal-trigger" href="#rec-modal">¿Olvidaste tu contraseña?</a>
                                        </div>
                                    </div>

                                </form>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col s12 m6 center-align add-margin">
                    <h3>¿Aún no tienes cuenta?</h3>
                    <a class="waves-effect waves-light btn-large" href="crear_cuenta.php"><i class="material-icons left">cloud</i>Crear mi cuenta!</a>
                </div>
            </div>
        </div>
    </section>
    <div id="rec-modal" class="modal">
        <div class="modal-content center-align  m-15">
            <h4>Recuperar contraseña</h4>
            <p>Por favor ingrese su correo electrónico</p>
            <form id="recuperar">
                <div class="row">
                    <div class="input-field col s6 offset-s3  m-15">
                        <input id="recuperar_mail" type="email" class="validate" name="recuperar_mail">
                        <label for="recuperar_mail">Correo Electrónico</label>
                    </div>
                </div>
                <button class="btn waves-effect waves-light  m-15" type="submit">Enviar
                    <i class="material-icons right">send</i>
                </button>
            </form>
        </div>
    </div>
</main>
<?php
Commerce::FooterTemplate('login.js');
?>