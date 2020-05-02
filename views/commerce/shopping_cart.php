<?php
require_once('../../core/helpers/templates.php');
Templates::headerTemplate();
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
                            <table class="highlight centered responsive-table">
                                <thead>
                                    <tr>
                                        <th>Imagen</th>
                                        <th>Productos</th>
                                        <th>Precio</th>
                                        <th>Cantidad</th>
                                        <th>Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><img src="../../resources/img/commerce/3.1.png" alt="" width="160" height="80"></td>
                                        <td>Pintura de madera con montañas</td>
                                        <td><h6>$12</h6></td>
                                        <td><input id="number" type="number" value="1"></td>
                                        <td><h6>$12</h6></td>
                                        <td><i class="material-icons">clear</i></td>
                                    </tr>
                                    <tr>
                                        <td><img src="../../resources/img/commerce/3.1.png" alt="" width="160" height="80"></td>
                                        <td>Pintura de madera con montañas</td>
                                        <td><h6>$12</h6></td>
                                        <td><input id="number" type="number" value="1"></td>
                                        <td><h6>$12</h6></td>
                                        <td><i class="material-icons">clear</i></td>
                                    </tr>
                                    <tr>
                                        <td><img src="../../resources/img/commerce/3.1.png" alt="" width="160" height="80"></td>
                                        <td>Pintura de madera con montañas</td>
                                        <td><h6>$12</h6></td>
                                        <td><input id="number" type="number" value="1"></td>
                                        <td><h6>$12</h6></td>
                                        <td><i class="material-icons">clear</i></td>
                                    </tr>
                                </tbody>
                            </table> 
                            <div class="divider"></div>
                            <!-- Botón de total a pagar -->
                            <div class="row right-align margin">
                                <div class="col s12 pull-s1">
                                    <h5>Total: <span>$24</span></h5>
                                    <span>Gastos de envío incluidos</span>
                                </div>
                                <div class="col s12 pull-s1">
                                    <a class="waves-effect waves-light btn-large">Finalizar compra</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<?php
Templates::FooterTemplate();
?>