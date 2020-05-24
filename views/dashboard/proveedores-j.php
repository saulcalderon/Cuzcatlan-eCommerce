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
                    <th>Existencias</th>
                    <th>Fecha Registro</th>
                    <th>ID Estado</th>
                    <th>ID Categoria</th>
                    <th>ID Proveedor</th>
                    <th><a class="tooltipped waves-effect waves-light modal-trigger" data-position="left" data-tooltip="Agregar Producto" href="#modal2"><i class="material-icons green-text text- accent-4">add_box</i></a></th>
                    <th><a class="tooltipped waves-effect waves-light modal-trigger" data-position="left" data-tooltip="Buscar" href="#modal3"><i class="material-icons white-text text- accent-4">search</i></a></th>
                </tr>
            </thead>

            <tbody class="black-text">
                <tr>
                    <td>1</td>
                    <td>Pintura Flor Nacional</td>
                    <td>25</td>
                    <td>02/02/2017</td>
                    <td>1</td>
                    <td>1</td>
                    <td>1</td>
                    <td><a class="tooltipped waves-effect waves-light modal-trigger" data-position="left" data-tooltip="Editar" href="#modal1"><i class="material-icons black-text">create</i></a></td>
                    <td><a class="tooltipped waves-effect waves-light modal-trigger" data-position="left" data-tooltip="Eliminar" href="#modal3"><i class="material-icons red-text">delete</i></a></td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Pintura Flor Nacional</td>
                    <td>25</td>
                    <td>02/02/2017</td>
                    <td>1</td>
                    <td>1</td>
                    <td>1</td>
                    <td><a class="tooltipped waves-effect waves-light modal-trigger" data-position="left" data-tooltip="Editar" href="#modal1"><i class="material-icons black-text">create</i></a></td>
                    <td><a class="tooltipped waves-effect waves-light modal-trigger" data-position="left" data-tooltip="Eliminar" href="#modal3"><i class="material-icons red-text">delete</i></a></td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Pintura Flor Nacional</td>
                    <td>25</td>
                    <td>02/02/2017</td>
                    <td>1</td>
                    <td>1</td>
                    <td>1</td>
                    <td><a class="tooltipped waves-effect waves-light modal-trigger" data-position="left" data-tooltip="Editar" href="#modal1"><i class="material-icons black-text">create</i></a></td>
                    <td><a class="tooltipped waves-effect waves-light modal-trigger" data-position="left" data-tooltip="Eliminar" href="#modal3"><i class="material-icons red-text">delete</i></a></td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Pintura Flor Nacional</td>
                    <td>25</td>
                    <td>02/02/2017</td>
                    <td>1</td>
                    <td>1</td>
                    <td>1</td>
                    <td><a class="tooltipped waves-effect waves-light modal-trigger" data-position="left" data-tooltip="Editar" href="#modal1"><i class="material-icons black-text">create</i></a></td>
                    <td><a class="tooltipped waves-effect waves-light modal-trigger" data-position="left" data-tooltip="Eliminar" href="#modal3"><i class="material-icons red-text">delete</i></a></td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Pintura Flor Nacional</td>
                    <td>25</td>
                    <td>02/02/2017</td>
                    <td>1</td>
                    <td>1</td>
                    <td>1</td>
                    <td><a class="tooltipped waves-effect waves-light modal-trigger" data-position="left" data-tooltip="Editar" href="#modal1"><i class="material-icons black-text">create</i></a></td>
                    <td><a class="tooltipped waves-effect waves-light modal-trigger" data-position="left" data-tooltip="Eliminar" href="#modal3"><i class="material-icons red-text">delete</i></a></td>
                </tr>
            </tbody>
        </table>
        <div id="modal2" class="modal">
            <div class="modal-content">
                <h4 class="centered black-text">Agregar un Producto</h4>
                <form class="col s12" method="post">
                    <div class='row'>
                        <div class='col s12'>
                        </div>
                    </div>

                    <div class="container">
                        <div class="input-field col m6 s12">
                            <input type="text" name="nombres" id="nombres">
                            <label for="nombres">Nombres</label>
                        </div>

                        <div class="input-field col m6 s12">
                            <input type="text" name="apellidos" id="apellidos">
                            <label for="apellidos">Apellidos</label>
                        </div>

                        <div class='input-field col m6 s12'>
                            <input class='validate white-text' type='email' name='email' id='email' />
                            <label for='email'>Email</label>
                        </div>

                        <div class="input-field col m6 s12">
                            <input type="text" name="telefono" id="telefono">
                            <label for="telefono">Telefono</label>
                        </div>

                        <div class="input-field col m6 s12">
                            <input type="text" name="direccion" id="direccion">
                            <label for="direccion">Direccion</label>
                        </div>

                        <div class="input-field col m6 s12">
                            <input type="text" name="direccion" id="direccion">
                            <label for="direccion">Dui</label>
                        </div>

                        <div class="input-field col m6 s12">
                            <input type="text" name="direccion" id="direccion">
                            <label for="direccion">Nacimiento</label>
                        </div>

                        <div class="input-field col m6 s12">
                            <input type="text" name="direccion" id="direccion">
                            <label for="direccion">Titulos</label>
                        </div>

                        <div class="input-field col m6 s12">
                            <input type="text" name="direccion" id="direccion">
                            <label for="direccion"># de Escalafon</label>
                        </div>

                        <div class="input-field col m6 s12">
                            <input type="text" name="direccion" id="direccion">
                            <label for="direccion">ID Tipo</label>
                        </div>

                        <div class='input-field col m6 s12'>
                            <input class='validate white-text' type='password' name='password1' id='password1' />
                            <label for='password1'>Contraseña</label>
                        </div>

                        <div class="input-field col m6 s12">
                            <input type="text" name="direccion" id="direccion">
                            <label for="direccion">Tipo Docente</label>
                        </div>

                        <div class="input-field col m6 s12">
                            <input type="text" name="direccion" id="direccion">
                            <label for="direccion">ID Nivel</label>
                        </div>

                        <div class="input-field col m6 s12">
                            <input type="text" name="direccion" id="direccion">
                            <label for="direccion">Nivel Docente</label>
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