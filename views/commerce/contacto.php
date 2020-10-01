<?php
require_once('../../core/helpers/commerce.php');
Commerce::headerTemplate();
?>
<!-- Contenido principal -->
<main>
    <!-- Formulario de contacto -->
    <section class="white" >
        <h5 class="center-align margin">Contáctanos</h5>
        <div class="row margin">
            <!-- Texto informativo -->
            <div class="col s12 m6">
                <div class="container">
                    <h1 class="center-align slider-text margin">Envíanos tus preguntas</h1>
                    <div class="divider margin"></div>
                    <h5 class="center-align">Prometemos responder lo más rápido posible para aclarar todas tus consultas.</h5>
                </div>
            </div>
            <div class="col s12 m6">
                <div class="container">
                    <div class="row">
                        <form action="" class="col s12" autocomplete="off">
                            <div class="row">
                                <div class="input-field col s6">
                                    <input id="first_name" type="text" class="validate">
                                    <label for="first_name">Nombre</label>
                                </div>
                                <div class="input-field col s6">
                                    <input id="last_name" type="text" class="validate">
                                    <label for="last_name">Apellido</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <select>
                                        <option value="" disabled selected>Choose your option</option>
                                        <option value="1">Cuenta</option>
                                        <option value="2">Pagos</option>
                                        <option value="3">Otros</option>
                                    </select>
                                    <label>¿Sobre que tienes dudas?</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <textarea id="textarea1" class="materialize-textarea"></textarea>
                                    <label for="textarea1">Textarea</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col s12 right-align">
                                    <button class="btn waves-effect waves-light btn-large black" type="submit" name="action">Enviar mensaje<i class="material-icons right">send</i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div> 
        <div class="divider margin-separador"></div> 
    </section>
    <!-- Preguntas frecuentes -->
    <section>
        <h1 class="center-align slider-text margin-separador">Preguntas frecuentes</h1>
        <!-- Contenedor de las preguntas frecuentes -->
        <div class="container"> 
            <ul class="collapsible popout margin">
                <li class="active">
                    <div class="collapsible-header"><i class="material-icons">filter_drama</i>¿Cuáles son los métodos de pago?</div>
                    <div class="collapsible-body"><span>Por medio de Pagadito</span></div>
                </li>
                <li>
                    <div class="collapsible-header"><i class="material-icons">place</i>Second</div>
                    <div class="collapsible-body"><span>Lorem ipsum dolor sit amet.</span></div>
                </li>
                <li>
                    <div class="collapsible-header"><i class="material-icons">whatshot</i>Third</div>
                    <div class="collapsible-body"><span>Lorem ipsum dolor sit amet.</span></div>
                </li>
            </ul> 
        </div>
    </section>
    
</main>
<?php
Commerce::FooterTemplate();
?>
