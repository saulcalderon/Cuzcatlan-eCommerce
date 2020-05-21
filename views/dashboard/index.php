<?php
require_once('../../core/helpers/dashboard.php');
Dashboard::headerTemplate('Bienvenido');
?>

<div class="container">
    <div class="row">
        <!-- Formulario para iniciar sesión -->
        <form method="post" id="sesion-form">
            <div class="input-field col s12 m6 offset-m3">
                <i class="material-icons prefix">account_circle</i>
                <input id="alias" type="text" name="alias" class="validate" required/>
                <label for="alias">Correo Electrónico</label>
            </div>
            <div class="input-field col s12 m6 offset-m3">
                <i class="material-icons prefix">vpn_key</i>
                <input id="clave" type="password" name="clave" class="validate" required/>
                <label for="clave">Clave</label>
            </div>
            <div class="col s12 center-align">
                <button type="submit" class="btn waves-effect blue tooltipped" data-tooltip="Iniciar sesión">Ingresar</button>
            </div>
        </form>
    </div>
</div>

<?php
Dashboard::footerTemplate('index.js');
?>
