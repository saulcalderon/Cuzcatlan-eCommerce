<?php
require_once('../../core/helpers/templates.php');
Templates::headerTemplate();
?>
<!-- Contenido principal -->
<main>
    <div class="row">
        <div class="col s12 m10 l6 push-m1 push-l3">
            <div class="card-panel login-card white">
                <div class="container login-container">
                    <h3 class="center-align margin">Recupera tu cuenta</h3>
                    <h6 class="center-align margin">Ingresa el correo electrónico asociado a tu cuenta y enviaremos y correo para que restablezcas tu contraseña.</h4>
                    <div class="row margin">
                        <form action="" class="col s12">
                            <div class="row">
                                <div class="input-field col s12">
                                    <input  id="email" type="email" class="validate">
                                    <label for="email">Correo Electrónico</label>
                                    <span class="helper-text" data-error="wrong" data-success="right"></span>
                                </div>
                            </div>
                            <div class="row margin">
                                <div class="col s12 center">
                                    <button class="btn waves-effect waves-light btn-large black" type="submit" name="action">Enviar correo<i class="material-icons right">send</i></button>
                                </div>
                            </div>
                            <h5 class="center-align margin"><a href="iniciar-sesion.php" class="green-text">Volver al inicio de sesión</a></h5>
                        </form>  
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php
Templates::FooterTemplate();
?>