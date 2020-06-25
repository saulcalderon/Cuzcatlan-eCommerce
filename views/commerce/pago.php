<?php
require_once('../../core/helpers/commerce.php');
Commerce::headerTemplate();
?>
<!-- Contenido principal -->
<main>
    <h1 class="center-align slider-text margin">Completar transacción</h1>
    <h5 class="center-align margin">Compras y envíos únicamente en El Salvador</h5>
    <div class="container login-container">
        <div class="row">
            <!-- División de los datos personales y el pedido -->
            <div class="col s12 m7 margin">
                <div class="row">
                    <!-- Datos personales -->
                    <div class="col s12">
                        <div class="card">
                            <div class="card-content">
                                <!-- Formulario de datos personales -->
                                <h6>Datos personales</h6>
                                <div class="divider"></div>
                                <div class="container gen">
                                    <div class="row margin">
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
                                                <div class="input-field col s12 m6">
                                                    <input  id="email" type="email" class="validate">
                                                    <label for="email">Correo Electrónico</label>
                                                    <span class="helper-text" data-error="wrong" data-success="right"></span>
                                                </div>
                                                <div class="input-field col s12 m6">
                                                    <input id="icon_telephone" type="tel" class="validate">
                                                    <label for="icon_telephone">Teléfono</label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="input-field col s12">
                                                    <textarea id="textarea1" class="materialize-textarea"></textarea>
                                                    <label for="textarea1">Dirección</label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="input-field col s12 m5">
                                                    <select>
                                                        <option value="" disabled selected>Elegir departamento</option>
                                                        <option value="1">Ahuachapán</option>
                                                        <option value="2">Cabañas</option>
                                                        <option value="3">Chalatenango</option>
                                                        <option value="4">Cuscatlan</option>
                                                        <option value="5">La Libertad</option>
                                                        <option value="6">La Paz</option>
                                                        <option value="7">La Union</option>
                                                        <option value="8">Morazan</option>
                                                        <option value="9">San Miguel</option>
                                                        <option value="10">San Salvador</option>
                                                        <option value="11">San Vicente</option>
                                                        <option value="12">Santa Ana</option>
                                                        <option value="13">Sonsonate</option>
                                                        <option value="14">Usulutan</option>
                                                    </select>
                                                    <label>Departamento</label>
                                                </div>
                                                <div class="input-field col s12 m4">
                                                    <select>
                                                        <option value="" disabled selected>Elegir municipio</option>
                                                        <option value="1">Ahuachapán</option>
                                                        <option value="2">Cabañas</option>
                                                        <option value="3">Chalatenango</option>
                                                        <option value="4">Cuscatlan</option>
                                                        <option value="5">La Libertad</option>
                                                        <option value="6">La Paz</option>
                                                        <option value="7">La Union</option>
                                                        <option value="8">Morazan</option>
                                                    </select>
                                                <label>Municipio</label>
                                                </div>
                                                <div class="input-field col s12 m3">
                                                    <input id="code-post" type="number" >
                                                    <label for="code-post">Código Postal</label>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Métodos de pago -->
                    <div class="col s12 margin">
                        <div class="card">
                            <div class="card-content">
                                <!-- Apartado para métodos de pago -->
                                <h6>Métodos de Pago</h6>
                                <div class="divider"></div>
                                <div class="row">
                                    <div class="col s12 m8 margin">
                                    <p>
                                        <label>
                                            <input class="with-gap" name="group1" type="radio" checked />
                                            <span><img src="../../resources/img/commerce/pagadito-logo.jpg" alt="" class="img-pagadito-logo"></span>
                                        </label>
                                    </p>
                                    </div>
                                    <div class="col s12 m4 center-align margin">
                                        <h6>Contra Entrega</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col sz12 m5 margin">
                <div class="card">
                    <div class="card-content">
                        <!-- Mini carrito de confirmar la compra -->
                        <h6>Tu pedido</h6>
                        <div class="divider"></div>
                        <!-- Cada artículo -->
                        <table class="highlight responsive-table">
                            <thead>
                            <tr>
                                <th>Imagen</th>
                                <th>Producto</th>
                                <th>Precio</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>Alvin</td>
                                <span class="product-thumbnail__quantity" aria-hidden="true">3</span>
                                <td>Eclair</td>
                                <td>$0.87</td>
                            </tr>
                            <tr>
                                <td>Alan</td>
                                <td>Jellybean</td>
                                <td>$3.76</td>
                            </tr>
                            <tr>
                                <td>Jonathan</td>
                                <td>Lollipop</td>
                                <td>$7.00</td>
                            </tr>
                            </tbody>
                        </table>
                        <!-- Información de costos -->
                        <div class="row margin-pedido">
                            <div class="col s8">
                                <h6>Monto a pagar</h6>
                            </div>
                            <div class="col s4 center-align">
                                <h6>$65</h6>
                            </div>
                        </div>
                        <div class="row margin-pedido">
                            <div class="col s8">
                                <h6>Envío</h6>
                            </div>
                            <div class="col s4 center-align">
                                <h6>$5</h6>
                            </div>
                        </div>
                        <div class="divider"></div>
                        <div class="row margin-pedido">
                            <div class="col s8">
                                <h6>Total</h6>
                            </div>
                            <div class="col s4">
                                <h6>USD  $65</h6>
                            </div>
                        </div>
                        <!-- Botón y mensaje después de compra  -->
                        <div class="row">
                            <div class="col s12 center-align margin-pedido">
                                <button class="btn waves-effect waves-light btn-large black" type="submit" name="action">Confirmar y pagar<i class="material-icons right">send</i></button>
                            </div>
                            <div class="col s12 margin-pedido">
                                <div class="container gen">
                                   <p>Luego de hacer clic en “Confirmar y pagar”, serás redirigido a <span class="green-text">Pagadito</span> para completar tu compra de forma segura.</p> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>  
</main>
<?php
Commerce::FooterTemplate();
?>