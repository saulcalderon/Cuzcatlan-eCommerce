<?php
require_once('../../core/helpers/dashboard.php');
Dashboard::headerTemplate('Dashboard');
?>


<!-- Graficas superiores -->
<div class="row">
    <!-- Gráfica de proveedores por departamento -->
    <div class="col s12 m6 l6">
        <div class="card white">
            <div class="card-content">
                <span class="card-title center">Gráfica de proveedores</span>
                <canvas id="chart-proveedores"></canvas>
            </div>
        </div>
    </div>
    <!-- Gráfica de noticias por fecha -->
    <div class="col s12 m6 l6">
        <div class="card white">
            <div class="card-content">
                <span class="card-title center">Gráfica de noticias</span>
                <canvas id="chart-noticias"></canvas>
            </div>
        </div>
    </div>
    <!-- Gráfica de ganancias por mes -->
    <div class="col s12 m12 l12">
        <div class="card white">
            <div class="card-content">
                <span class="card-title center">Gráfica de ganancias</span>
                <canvas id="chart-facturas"></canvas>
            </div>
        </div>
    </div>
    <!-- Gráfica de clientes por mes -->
    <div class="col s12 m6 l6">
        <div class="card white">
            <div class="card-content">
                <span class="card-title center">Gráfica de clientes</span>
                <canvas id="chart-clientes"></canvas>
            </div>
        </div>
    </div>
    <!-- Gráfica de compras por mes -->
    <div class="col s12 m6 l6">
        <div class="card white">
            <div class="card-content">
                <span class="card-title center">Meses con más compras</span>
                <canvas id="chart-compras"></canvas>
            </div>
        </div>
    </div>
</div>



<!-- Importación del archivo para generar gráficas en tiempo real. Para más información https://www.chartjs.org/ -->
<!-- <script type="text/javascript" src="../../resources/js/chart.js"></script> -->

<?php
Dashboard::footerTemplate('main.js');
?>