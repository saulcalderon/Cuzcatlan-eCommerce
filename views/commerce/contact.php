<?php
require_once('../../core/helpers/commerce_en.php');
Commerce::headerTemplate();
?>
<!-- Contenido principal -->
<main>
    <!-- Formulario de contacto -->
    <section class="white" >
        <h5 class="center-align margin">Contact Us</h5>
        <div class="row margin">
            <!-- Texto informativo -->
            <div class="col s12 m6">
                <div class="container">
                    <h1 class="center-align slider-text margin">Send us your questions</h1>
                    <div class="divider margin"></div>
                    <h5 class="center-align">We promise to respond as quickly as possible to clarify all your queries.</h5>
                </div>
            </div>
            <div class="col s12 m6">
                <div class="container">
                    <div class="row">
                        <form action="" class="col s12" autocomplete="off">
                            <div class="row">
                                <div class="input-field col s6">
                                    <input id="first_name" type="text" class="validate">
                                    <label for="first_name">Name</label>
                                </div>
                                <div class="input-field col s6">
                                    <input id="last_name" type="text" class="validate">
                                    <label for="last_name">Last name</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <select>
                                        <option value="" disabled selected>Choose your option</option>
                                        <option value="1">Account</option>
                                        <option value="2">Payments</option>
                                        <option value="3">Others</option>
                                    </select>
                                    <label>What do you have doubts about?</label>
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
                                    <button class="btn waves-effect waves-light btn-large black" type="submit" name="action">Send message<i class="material-icons right">send</i></button>
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
        <h1 class="center-align slider-text margin-separador">Frequently Asked Questions</h1>
        <!-- Contenedor de las preguntas frecuentes -->
        <div class="container"> 
            <ul class="collapsible popout margin">
                <li class="active">
                    <div class="collapsible-header"><i class="material-icons">filter_drama</i>What are the payment methods?</div>
                    <div class="collapsible-body"><span>Through Pagadito</span></div>
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
Commerce::FooterTemplate('');
?>
