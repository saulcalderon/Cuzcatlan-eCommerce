<?php
require_once('../../core/helpers/dashboard.php');
Dashboard::headerTemplate('Administrar facturas');
?>
<div class="row">
    <div class="col s12 m12 l3"></div>

    <div class="col s12 m12 l3">
        <div class="card horizontal gradient-45deg-light-red-red gradient-shadow">
            <div class="card horizontal waves-effect waves-block waves-light">
                <img class="activator" src="../../resources/img/dashboard/img12-1.jpg" height="100" width="100">
            </div>
            <div class="card-content">
                <div class="card-content activator white-text">Ingresos: $41,500</div>
                <p><a href="Encargados2.html"><button class="btn gradient-45deg-red-pink">Actualizar</button></a></p>
            </div>
        </div>
    </div>
    <div class="col s12 m12 l3">
        <div class="card horizontal gradient-45deg-light-red-red gradient-shadow">
            <div class="card horizontal waves-effect waves-block waves-light">
                <img class="activator" src="../../resources/img/dashboard/img12-1.jpg" height="100" width="100">
            </div>
            <div class="card-content">
                <div class="card-content white-text">Usuarios: 12</div>
                <p><a href="Encargados2.html"><button class="btn gradient-45deg-red-pink">Actualizar</button></a></p>
            </div>
        </div>
    </div>
    <div class="col s12 m12 l3">
        <div class="card horizontal gradient-45deg-light-red-red gradient-shadow">
            <div class="card horizontal waves-effect waves-block waves-light">
                <img class="activator" src="../../resources/img/dashboard/img12-1.jpg" height="100" width="100">
            </div>
            <div class="card-content">
                <div class="card-content activator white-text">Clientes: 16,000</div>
                <p><a href="Encargados2.html"><button class="btn gradient-45deg-red-pink">Actualizar</button></a></p>
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