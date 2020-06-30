<?php
require_once('../../core/helpers/commerce.php');
Commerce::headerTemplate();
?>
<!-- Contenido principal -->
<main>
    <!-- Carrito -->
    <section>
        <h1 class="center-align slider-text margin">Carrito</h1>
        <div class="container login-container">
            <!-- Productos contenidos en el carrito -->
            <div class="row">
                <div class="col s12">
                    <div class="card">
                        <!-- Productos individuales -->
                        <div class="card-content margin">
                            <table class="highlight responsive-table">
                                <thead>
                                    <tr>
                                        <th>Imagen</th>
                                        <th>Productos</th>
                                        <th>Cantidad</th>
                                        <th>Precio</th>
                                        <th>Subtotal</th>
                                        <th>Accion</th>
                                    </tr>
                                </thead>
                                <tbody id="tbody-carrito">
                                </tbody>
                            </table>
                            <div class="divider"></div>
                            <!-- Botón de total a pagar -->
                            <div class="row right-align margin">
                                <div class="col s12 pull-s1">
                                    <h5>Total: $<span id="precio"></span></h5>
                                    <span>Gastos de envío incluidos</span>
                                </div>
                                <div class="col s12 pull-s1">
                                    <a id="finalizar" class="waves-effect waves-light btn-large disabled" type="submit">Finalizar compra</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="update" class="modal">
            <div class="modal-content">
                <h4 id="content" class="center"></h4>
                <div class="container">
                    <form method="post" id="updateForm">
                        <input class="hide" type="text" id="id_detalle" name="id_detalle">
                        <div class="row">
                            <div class="input-field col s12 m6">
                                <label for="cantidad">Cantidad</label>
                                <input type="number" name="cantidad" id="cantidad">
                            </div>

                            <div class="input-field col s12 m6">
                                <button class="btn waves-effect waves-light" type="submit" name="action">Guardar
                                    <i class="material-icons right">send</i>
                                </button>
                            </div>
                        </div>
                    </form>
                    <h6 id="existencias" class="center"></h6>
                </div>
            </div>
        </div>
    </section>
</main>

<?php
Commerce::FooterTemplate('');
?>