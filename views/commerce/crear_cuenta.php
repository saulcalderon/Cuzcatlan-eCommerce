<?php
require_once('../../core/helpers/commerce.php');
Commerce::headerTemplate();
?>
<!-- Contenido principal -->
<main>
    <section>
        <div class="row">
            <div class="col s12 m10 l6 push-m1 push-l3">
                <div class="card-panel login-card white">
                    <div class="container login-container">
                        <h3 class="center-align">Crear mi cuenta</h3>
                        <div class="row">
                            <form action="" class="col s12">
                                <div class="row">
                                    <div class="input-field col s12 m6">
                                        <input id="first_name" type="text" class="validate">
                                        <label for="first_name">Nombre</label>
                                    </div>
                                    <div class="input-field col s12 m6">
                                        <input id="last_name" type="text" class="validate">
                                        <label for="last_name">Apellido</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input  id="email" type="email" class="validate">
                                        <label for="email">Correo Electrónico</label>
                                        <span class="helper-text" data-error="wrong" data-success="right"></span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input id="password" type="password" class="validate">
                                        <label for="password">Contraseña</label>
                                        <span class="helper-text" data-error="wrong" data-success="right"></span>
                                    </div>
                                </div>
                                <p class="center-align">
                                    <label>
                                        <input type="checkbox" class="filled-in" />
                                        <span>Al crear la cuenta, acepta nuestros <a href="">términos y condiciones</a>.</span>
                                    </label>
                                </p>
                                <div class="row">
                                    <div class="col s12 center-align">
                                        <button class="btn waves-effect waves-light btn-large black" type="submit" name="action">Crear cuenta<i class="material-icons right">send</i></button>
                                    </div>
                                </div>
                            </form> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>     
</main>
<?php
Commerce::FooterTemplate();
?>