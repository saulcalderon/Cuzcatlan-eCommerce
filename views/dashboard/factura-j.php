<?php
require_once('../../core/helpers/dashboard.php');
Dashboard::headerTemplate('Administrar facturas');
?>
<div class="padd-15">
    <div class="row">
        <!-- Formulario de búsqueda -->
        <form method="post" id="search-form">
            <div class="input-field col s6 m4">
                <i class="material-icons prefix">search</i>
                <input id="search" type="text" name="search" />
                <label for="search">Buscador</label>
            </div>
            <div class="input-field col s6 m4">
                <button type="submit" class="btn waves-effect green tooltipped" data-tooltip="Buscar"><i class="material-icons">check_circle</i></button>
            </div>
        </form>
        <div class="input-field center-align col s12 m4">
            <!-- Enlace para abrir caja de dialogo (modal) al momento de crear un nuevo registro -->
            <a href="#" onclick="openCreateModal()" class="btn waves-effect indigo tooltipped" data-tooltip="Crear"><i class="material-icons">add_circle</i></a>
            <!-- Enlace para generar un reporte en formato PDF -->
            <a href="../../core/reports/dashboard/productos.php" target="_blank" class="btn waves-effect amber tooltipped" data-tooltip="Reporte de productos por categoría"><i class="material-icons">assignment</i></a>
        </div>
    </div>
    <table class="responsive-table  centered white-text">
        <thead>
            <tr>
                <th>Image</th>
                <th>Cliente</th>
                <th>Monto</th>
                <th>Fecha</th>
            </tr>
        </thead>
        <tbody class="black-text">
            <tr>
                <td><img src="../../resources/img/dashboard/img12-1.jpg" height="50" width="80"></td>
                <td><a class="modal-trigger" href="#modal2">Rene Saul Calderon</a></td>
                <td>$25.00</td>
                <td>02/02/2017</td>
            </tr>
            <tr>
                <td><img src="../../resources/img/dashboard/img12-1.jpg" height="50" width="80"></td>
                <td><a class="modal-trigger" href="#modal2">Rene Saul Calderon</a></td>
                <td>$25.00</td>
                <td>02/02/2017</td>
            </tr>
            <tr>
                <td><img src="../../resources/img/dashboard/img12-1.jpg" height="50" width="80"></td>
                <td><a class="modal-trigger" href="#modal2">Rene Saul Calderon</a></td>
                <td>$25.00</td>
                <td>02/02/2017</td>
            </tr>
            <tr>
                <td><img src="../../resources/img/dashboard/img12-1.jpg" height="50" width="80"></td>
                <td><a class="modal-trigger" href="#modal2">Rene Saul Calderon</a></td>
                <td>$25.00</td>
                <td>02/02/2017</td>
            </tr>
            <tr>
                <td><img src="../../resources/img/dashboard/img12-1.jpg" height="50" width="80"></td>
                <td><a class="modal-trigger" href="#modal2">Rene Saul Calderon</a></td>
                <td>$25.00</td>
                <td>02/02/2017</td>
            </tr>
        </tbody>
    </table>
    <div id="modal2" class="modal">
        <div class="modal-content">
            <h4 class="centered black-text">Detalles</h4>
            <form class="col s12" method="post">
                <div class='row'>
                    <div class='col s12'>
                    </div>
                </div>
                <div class="container">
                    <div class="input-field col m6 s12">
                        <input type="text" name="nombres" id="nombres" value="Justin Perez">
                        <label for="nombres">Nombres</label>

                    </div>

                    <div class='input-field col m6 s12'>
                        <input class='validate black-text' type='email' name='email' id='email' value="stark122@gmail.com">
                        <label for='email'>Email</label>
                    </div>

                    <div class="input-field col m6 s12">
                        <input type="text" name="telefono" id="telefono" value="6543-1834">
                        <label for="telefono">Telefono</label>
                    </div>

                    <div class="input-field col m6 s12">
                        <input type="text" name="direccion" id="direccion" value="Col. Baycity Casa#200">
                        <label for="direccion">Direccion</label>
                    </div>

                    <div class="input-field col m6 s12">
                        <input type="text" name="factura" id="factura" value="1">
                        <label for="factura">N. Factura</label>
                    </div>

                    <div class="input-field col m6 s12">
                        <input type="text" name="direccion" id="fecha" value="12/05/2020">
                        <label for="fecha">Fecha Realizada</label>
                    </div>

                    <div class="input-field col m6 s12">
                        <select>
                            <option value="" disabled selected>Estado</option>
                            <option value="1">Option 1</option>
                            <option value="2">Option 2</option>
                            <option value="3">Option 3</option>
                        </select>
                    </div>
                    <table class="responsive-table  centered white-text">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Articulos</th>
                                <th>Cantidad</th>
                                <th>Precio</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody class="black-text">
                            <tr>
                                <td><img src="../../resources/img/billete.jpg" height="50" width="80"></td>
                                <td>Pintura Residencia</td>
                                <td>1</td>
                                <td>$45.00</td>
                                <td>$45.00</td>
                            </tr>
                        </tbody>
                    </table>
                    <ul class="right-text">
                        <li>Sub-Total:</li>
                        <li>Costo de Envio:</li>
                        <li>Total:</li>
                    </ul>
                </div>
        </div>
    </div>

</div>
<?php
Dashboard::footerTemplate();
?>