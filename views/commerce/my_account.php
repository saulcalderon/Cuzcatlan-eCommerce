<?php
require_once('../../core/helpers/templates.php');
Templates::headerTemplate();
?>
<!-- Contenido principal -->
<main>
    <h1 class="center-align slider-text">Mi cuenta</h1>
    <div class="container gen">
         <div class="card margin">
            <div class="card-content">
                <!-- Línea del ícono y texto -->
                <div class="row">
                    <div class="col s4 m1">
                        <i class="material-icons small">account_circle</i>
                    </div>
                    <div class="col s8 m6">
                        <h6>Datos personales</h6>
                    </div>
                </div>
                <div class="divider"></div>
                <!-- División de espacios entre la información de la cuenta y 
                foto de perfil -->
                <div class="row margin-pedido">
                    <!-- Información de la cuenta -->
                    <div class="col s12 m8">
                        <div class="row">
                            <form action="" class="col s12">
                                <!-- Nombre y apellido -->
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
                                <!-- Correo -->
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input  id="email" type="email" class="validate">
                                        <label for="email">Correo Electrónico</label>
                                        <span class="helper-text" data-error="wrong" data-success="right"></span>
                                    </div>
                                </div>
                                <!-- Contraseña -->
                                <div class="row">
                                    <div class="input-field col s12 m6">
                                        <input id="password" type="password" class="validate">
                                        <label for="password">Nueva contraseña</label>
                                        <span class="helper-text" data-error="wrong" data-success="right"></span>
                                    </div>
                                    <div class="input-field col s12 m6">
                                        <input id="password" type="password" class="validate">
                                        <label for="password">Confirme la contraseña</label>
                                        <span class="helper-text" data-error="wrong" data-success="right"></span>
                                    </div>
                                </div>
                                <!-- Dirección -->
                                <div class="row">
                                    <div class="input-field col s12">
                                    <textarea id="textarea1" class="materialize-textarea"></textarea>
                                    <label for="textarea1">Dirección</label>
                                    </div>
                                </div>
                                <!-- Selector de fecha y teléfono -->
                                <div class="row">
                                    <div class="col s6 margin-pedido">
                                        <input type="text" class="datepicker">
                                    </div>
                                    <div class="input-field col s6">
                                        <input id="icon_telephone" type="tel" class="validate">
                                        <label for="icon_telephone">Telephone</label>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- Foto de perfil -->
                    <div class="col s12 m4">
                        <div class="row">
                            <!-- Círculo donde se muestra la foto de perfil -->
                            <div class="col s12 margin center-align">
                                <img src="../../resources/img/commerce/2.1.png" alt="" class="circle responsive-img">
                                <h5>Foto de Perfil</h5>
                            </div>
                            <!-- Botón para subir foto de perfil -->
                            <div class="col s12 center-align">
                                <a class="waves-effect waves-light btn-large">Subir imagen</a>
                            </div>
                            <!-- Botones de acción -->
                            <div class="col s12 center-align margin ">
                                <button class="btn waves-effect waves-light btn-large" type="submit" name="action">Guadar cambios<i class="material-icons right">send</i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Colapsable del historial de compra -->
        <ul class="collapsible">
            <li class="active">
                <!-- Texto -->
                <div class="collapsible-header"><i class="material-icons">filter_drama</i>Historial de compras</div>
                <!-- Cuerpo de todo el colapsable -->
                <div class="collapsible-body">
                    <table class="highlight centered responsive-table">
                        <thead class="hide-on-small-only">
                            <tr>
                                <th>Fecha/Hora</th>
                                <th>Producto</th>
                                <th>Cantidad</th>
                                <th>Precio</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Cuerpo de solo un historial de compra -->
                            <tr>
                                <td>04/1/2020 4:49 pm</td>
                                <td>Pintura de madera con montañas</td>
                                <td>3</td>
                                <td>$12</td>
                                <td>$36</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>Pintura de madera con montañas</td>
                                <td>3</td>
                                <td>$12</td>
                                <td>$36</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>Pintura de madera con montañas</td>
                                <td>3</td>
                                <td>$12</td>
                                <td>$36</td>
                            </tr>
                            <tr>   
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td><h5>Total: <span>$180</span></h5></td>
                            </tr>
                            <!-- Otro historial de compra-->
                            <tr>
                                <td>04/1/2020 4:49 pm</td>
                                <td>Pintura de madera con montañas</td>
                                <td>3</td>
                                <td>$12</td>
                                <td>$36</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>Pintura de madera con montañas</td>
                                <td>3</td>
                                <td>$12</td>
                                <td>$36</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>Pintura de madera con montañas</td>
                                <td>3</td>
                                <td>$12</td>
                                <td>$36</td>
                            </tr>
                            <tr>   
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td><h5>Total: <span>$180</span></h5></td>
                            </tr>
                        </tbody>
                    
                    
                    <div class="divider"></div>
                </table>
                </div>
            </li>
        </ul>
    </div>    
</main>
<?php
Templates::FooterTemplate();
?>