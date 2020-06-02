<?php
require_once('../../core/helpers/dashboard.php');
Dashboard::headerTemplate('Administrar facturas');
?>
<div class="row padd-15">
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

    <table class="highlight padd-15" id="table-factura">
        <!-- Cabeza de la tabla para mostrar los títulos de las columnas -->
        <thead>
            <tr>
                <th>NOMBRE</th>
                <th>FECHA</th>
                <th>TOTAL</th>
                <th>ESTADO FACTURA</th>
                <th>CANTIDAD</th>
            </tr>
        </thead>
        <!-- Cuerpo de la tabla para mostrar un registro por fila -->
        <tbody id="tbody-rows">
        </tbody>
    </table>
    <div class="col-md-12 center text-center">
        <span class="left" id="total_reg"></span>
        <ul class="pagination pager" id="myPager"></ul>
    </div>

</div>
<div id="detalle-modal" class="modal">
    <div class="modal-content">
        <h4>Modal Header</h4>
        <table class="highlight padd-15">
            <!-- Cabeza de la tabla para mostrar los títulos de las columnas -->
            <thead>
                <tr>
                    <th>NOMBRE</th>
                    <th>PRECIO_UNITARIO</th>
                    <th>CANTIDAD</th>
                </tr>
            </thead>
            <!-- Cuerpo de la tabla para mostrar un registro por fila -->
            <tbody id="tbody-details">
            </tbody>
        </table>
    </div>
</div>


<!-- Tabla para mostrar los registros existentes -->

<!-- Componente Modal para mostrar una caja de dialogo -->
<div id="save-modal" class="modal">
    <div class="modal-content">
        <h4 id="modal-title" class="center-align"></h4>
        <!-- Formulario para crear o actualizar un registro -->
        <form method="post" id="save-form">
            <!-- Campo oculto para asignar el id del registro al momento de modificar -->
            <input class="hide" type="text" id="id_factura" name="id_factura" />
            <div class="row">
                <div class="input-field col s12 m6">
                    <i class="material-icons prefix">person</i>
                    <input id="nombre" type="text" name="nombre" class="validate" required />
                    <label for="nombre">Nombre</label>
                </div>
                <div class="input-field col s12 m6">
                    <i class="material-icons prefix">person</i>
                    <input id="fecha" type="text" name="fecha" class="validate" required />
                    <label for="fecha">Fecha</label>
                </div>
                <div class="input-field col s12 m6">
                    <i class="material-icons prefix">email</i>
                    <input id="cantidad" type="number" name="cantidad" class="validate" required />
                    <label for="cantidad">Cantidad</label>
                </div>
                <div class="input-field col s12 m6">
                    <i class="material-icons prefix">phone</i>
                    <input id="total" type="number" name="total" class="validate" />
                    <label for="total">Total</label>
                </div>
                <div class="input-field col s12 m6">
                    <select id="estado_factura" name="estado_factura">
                    </select>
                    <label>Categoría</label>
                </div>
                
            </div>
            <div class="row center-align">
                <a href="#" class="btn waves-effect grey tooltipped modal-close" data-tooltip="Cancelar"><i class="material-icons">cancel</i></a>
                <button type="submit" class="btn waves-effect blue tooltipped" data-tooltip="Guardar"><i class="material-icons">save</i></button>
            </div>
        </form>
    </div>
</div>

<?php
Dashboard::footerTemplate('factura.js');
?>