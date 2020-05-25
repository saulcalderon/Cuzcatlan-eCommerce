<?php
require_once('../../core/helpers/dashboard.php');
Dashboard::headerTemplate('Administrar facturas');
?>
<div class="row">
    <div class="col l3"></div>

    <div class="col l8">

        <table class="responsive-table  centered white-text">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Empresa</th>
                    <th>Telefono</th>
                    <th>ID Departamento</th>
                    <th><a class="tooltipped waves-effect waves-light modal-trigger" data-position="left" data-tooltip="Agregar Producto" href="#modal2"><i class="material-icons green-text text- accent-4">add_box</i></a></th>
                    <th><a class="tooltipped waves-effect waves-light modal-trigger" data-position="left" data-tooltip="Buscar" href="#modal3"><i class="material-icons white-text text- accent-4">search</i></a></th>
                </tr>
            </thead>

            <tbody class="black-text">
                <tr>
                    <td>1</td>
                    <td>Jardani Jovonovich</td>
                    <td>Masacre Feliz</td>
                    <td>22577-777</td>
                    <td>1</td>
                    <td><a class="tooltipped waves-effect waves-light modal-trigger" data-position="left" data-tooltip="Editar" href="#modal1"><i class="material-icons black-text">create</i></a></td>
                    <td><a class="tooltipped waves-effect waves-light modal-trigger" data-position="left" data-tooltip="Eliminar" href="#modal3"><i class="material-icons red-text">delete</i></a></td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Jardani Jovonovich</td>
                    <td>Masacre Feliz</td>
                    <td>22577-777</td>
                    <td>1</td>
                    <td><a class="tooltipped waves-effect waves-light modal-trigger" data-position="left" data-tooltip="Editar" href="#modal1"><i class="material-icons black-text">create</i></a></td>
                    <td><a class="tooltipped waves-effect waves-light modal-trigger" data-position="left" data-tooltip="Eliminar" href="#modal3"><i class="material-icons red-text">delete</i></a></td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Jardani Jovonovich</td>
                    <td>Masacre Feliz</td>
                    <td>22577-777</td>
                    <td>1</td>
                    <td><a class="tooltipped waves-effect waves-light modal-trigger" data-position="left" data-tooltip="Editar" href="#modal1"><i class="material-icons black-text">create</i></a></td>
                    <td><a class="tooltipped waves-effect waves-light modal-trigger" data-position="left" data-tooltip="Eliminar" href="#modal3"><i class="material-icons red-text">delete</i></a></td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Jardani Jovonovich</td>
                    <td>Masacre Feliz</td>
                    <td>22577-777</td>
                    <td>1</td>
                    <td><a class="tooltipped waves-effect waves-light modal-trigger" data-position="left" data-tooltip="Editar" href="#modal1"><i class="material-icons black-text">create</i></a></td>
                    <td><a class="tooltipped waves-effect waves-light modal-trigger" data-position="left" data-tooltip="Eliminar" href="#modal3"><i class="material-icons red-text">delete</i></a></td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Jardani Jovonovich</td>
                    <td>Masacre Feliz</td>
                    <td>22577-777</td>
                    <td>1</td>
                    <td><a class="tooltipped waves-effect waves-light modal-trigger" data-position="left" data-tooltip="Editar" href="#modal1"><i class="material-icons black-text">create</i></a></td>
                    <td><a class="tooltipped waves-effect waves-light modal-trigger" data-position="left" data-tooltip="Eliminar" href="#modal3"><i class="material-icons red-text">delete</i></a></td>
                </tr>
            </tbody>
        </table>
        <div id="modal2" class="modal">
            <div class="modal-content">
                <h4 class="centered black-text">Agregar un Proveedor</h4>
                <form class="col s12" method="post">
                    <div class='row'>
                        <div class='col s12'>
                        </div>
                    </div>

                    <div class="container">
                        <div class="input-field col m6 s12">
                            <input type="text" name="nombres" id="nombres">
                            <label for="nombres">Nombre</label>
                        </div>

                        <div class="input-field col m6 s12">
                            <input type="text" name="empresa" id="empresa">
                            <label for="empresa">Empresa</label>
                        </div>

                        <div class='input-field col m6 s12'>
                            <input type='text' name='telefono' id='telefono' />
                            <label for='telefono'>Telefono</label>
                        </div>

                        <div class="input-field col m6 s12">
                            <input type="text" name="departamento" id="departamento">
                            <label for="departamento">ID Departamento</label>
                        </div>
                    </div>
                </form>
                <div class="modal-footer">
                    <a href="#!" class="modal-close waves-effect waves-green btn-flat green">Agregar Producto</a>
                    <a href="#!" class="modal-close waves-effect waves-green btn-flat red">Cancelar</a>
                </div>
            </div>
        </div>
    </div>
</div>

</main>

<script type="text/javascript" src="../../resources/js/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="../../resources/js/materialize.min.js"></script>
<script type="text/javascript" src="../../resources/js/sweetalert.min.js"></script>
<script type="text/javascript" src="../../core/helpers/components.js"></script>
<script type="text/javascript" src="../../core/controllers/dashboard/initialization.js"></script>
<script type="text/javascript" src="../../core/controllers/dashboard/account.js"></script>
<script type="text/javascript" src="../../core/controllers/dashboard/'.$controller.'"></script>
</body>

</html>