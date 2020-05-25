<?php
require_once('../../core/helpers/dashboard.php');
Dashboard::headerTemplate('Administrar clientes');
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
    <div class="col l8">
        <table class="responsive-table  centered white-text">
            <thead>
                <tr>
                    <th>Fotografia</th>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Correo</th>
                    <th>Telefono</th>
                    <th>Clave</th>
                    <th>Fecha de Nacimiento</th>
                    <th><a class="tooltipped waves-effect waves-light modal-trigger" data-position="left" data-tooltip="Agregar Docente" href="#modal2"><i class="material-icons green-text text- accent-4">add_box</i></a></th>
                    <th><a class="tooltipped waves-effect waves-light modal-trigger" data-position="left" data-tooltip="Eliminar Todo" href="#modal3"><i class="material-icons red-text text- accent-4">clear</i></a></th>
                </tr>
            </thead>

            <tbody class="black-text">
                <tr>
                    <td><img src="../../resources/img/dashboard/img12-1.jpg" height="50" width="80"></td>
                    <td>1</td>
                    <td>Carlos</td>
                    <td>Herrera</td>
                    <td>Carlos12@gmail.com</td>
                    <td>76453-222</td>
                    <td>DPGC</td>
                    <td>15/02/2002</td>
                    <td><a class="tooltipped waves-effect waves-light modal-trigger" data-position="left" data-tooltip="Editar" href="#modal1"><i class="material-icons black-text">create</i></a></td>
                    <td><a class="tooltipped waves-effect waves-light modal-trigger" data-position="left" data-tooltip="Eliminar" href="#modal3"><i class="material-icons red-text">delete</i></a></td>
                </tr>
                <tr>
                    <td><img src="../../resources/img/dashboard/img12-1.jpg" height="50" width="80"></td>
                    <td>1</td>
                    <td>Carlos</td>
                    <td>Herrera</td>
                    <td>Carlos12@gmail.com</td>
                    <td>76453-222</td>
                    <td>DPGC</td>
                    <td>15/02/2002</td>
                    <td><a class="tooltipped waves-effect waves-light modal-trigger" data-position="left" data-tooltip="Editar" href="#modal1"><i class="material-icons black-text">create</i></a></td>
                    <td><a class="tooltipped waves-effect waves-light modal-trigger" data-position="left" data-tooltip="Eliminar" href="#modal3"><i class="material-icons red-text">delete</i></a></td>
                </tr>
                <tr>
                    <td><img src="../../resources/img/dashboard/img12-1.jpg" height="50" width="80"></td>
                    <td>1</td>
                    <td>Carlos</td>
                    <td>Herrera</td>
                    <td>Carlos12@gmail.com</td>
                    <td>76453-222</td>
                    <td>DPGC</td>
                    <td>15/02/2002</td>
                    <td><a class="tooltipped waves-effect waves-light modal-trigger" data-position="left" data-tooltip="Editar" href="#modal1"><i class="material-icons black-text">create</i></a></td>
                    <td><a class="tooltipped waves-effect waves-light modal-trigger" data-position="left" data-tooltip="Eliminar" href="#modal3"><i class="material-icons red-text">delete</i></a></td>
                </tr>
                <tr>
                    <td><img src="../../resources/img/dashboard/img12-1.jpg" height="50" width="80"></td>
                    <td>Carlos</td>
                    <td>Herrera</td>
                    <td>Carlos12@gmail.com</td>
                    <td>76453-222</td>
                    <td>DPGC</td>
                    <td>15/02/2002</td>
                    <td><a class="tooltipped waves-effect waves-light modal-trigger" data-position="left" data-tooltip="Editar" href="#modal1"><i class="material-icons black-text">create</i></a></td>
                    <td><a class="tooltipped waves-effect waves-light modal-trigger" data-position="left" data-tooltip="Eliminar" href="#modal3"><i class="material-icons red-text">delete</i></a></td>
                </tr>
                <tr>
                    <td><img src="../../resources/img/dashboard/img12-1.jpg" height="50" width="80"></td>
                    <td>1</td>
                    <td>Carlos</td>
                    <td>Herrera</td>
                    <td>Carlos12@gmail.com</td>
                    <td>76453-222</td>
                    <td>DPGC</td>
                    <td>15/02/2002</td>
                    <td><a class="tooltipped waves-effect waves-light modal-trigger" data-position="left" data-tooltip="Editar" href="#modal1"><i class="material-icons black-text">create</i></a></td>
                    <td><a class="tooltipped waves-effect waves-light modal-trigger" data-position="left" data-tooltip="Eliminar" href="#modal3"><i class="material-icons red-text">delete</i></a></td>
                </tr>
            </tbody>
        </table>
        <div id="modal2" class="modal">
            <div class="modal-content">
                <h4>Agregar un Cliente</h4>
                <form class="col s12" method="post">
                    <div class='row'>
                        <div class='col s12'>
                        </div>
                    </div>
                </div>

                    <div class="container">
                        <div class="input-field col m6 s12">
                            <input type="text" name="nombres" id="nombres" value="justin ALEXANDER">
                            <label for="nombres">Nombre</label>
                        </div>

                        <div class="input-field col m6 s12">
                            <input type="text" name="apellidos" id="apellidos">
                            <label for="apellidos">Apellido</label>
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
                            <input type="text" name="clave" id="clave">
                            <label for="clave">Clave</label>
                        </div>

                        <div class="input-field col m6 s12">
                            <input type="text" name="direccion" id="direccion">
                            <label for="direccion">Direccion</label>
                        </div>

                        <div class="input-field col m6 s12">
                            <input type="text" name="nacimiento" id="nacimiento">
                            <label for="nacimiento">Nacimiento</label>
                        </div>

                        <div class="input-field col m6 s12">
                            <input type="text" name="registro" id="registro">
                            <label for="registro">Registro</label>
                        </div>
                    </div>
                    
                    <div class="modal-footer">
                        <a href="#!" class="modal-close waves-effect waves-green btn-flat green">Agregar Cliente</a>
                        <a href="#!" class="modal-close waves-effect waves-green btn-flat red">Cancelar</a>
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
                <div class="modal-footer">
                    <a href="#!" class="modal-close waves-effect waves-green btn-flat green">Agregar</a>
                    <a href="#!" class="modal-close waves-effect waves-green btn-flat red">Cancelar</a>
                </div>
        </div>
    </div>
</div>
</main>

<?php
Dashboard::footerTemplate();
?>