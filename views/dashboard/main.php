<?php
require_once('../../core/helpers/dashboard.php');
Dashboard::headerTemplate('Administrar facturas');
?>
<div class="row padd-15">
    <div class="col l3 s6">
        <!-- small box -->
        <div class="small-box bg-aqua">
            <div class="inner">
                <h3>420</h3>
                <p>Accounts</p>
            </div>
            <div class="icon">
                <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer" class="animsition-link">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div><!-- ./col -->
    <div class="col l3 s6">
        <!-- small box -->
        <div class="small-box bg-green">
            <div class="inner">
                <h3>69</h3>
                <p>New Toons</p>
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer" class="animsition-link">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div><!-- ./col -->
    <div class="col l3 s6">
        <!-- small box -->
        <div class="small-box bg-yellow">
            <div class="inner">
                <h3>36</h3>
                <p>Support Emails</p>
            </div>
            <div class="icon">
                <i class="ion ion-email"></i>
            </div>
            <a href="#" class="small-box-footer" class="animsition-link">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div><!-- ./col -->
    <div class="col l3 s6">
        <!-- small box -->
        <div class="small-box bg-red">
            <div class="inner">
                <h3>1337</h3>
                <p>Unique Visitors</p>
            </div>
            <div class="icon">
                <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer" class="animsition-link">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
</div>

<!-- Graficas superiores -->
 <div class="row">
    <!-- Gráfica de proveedores por departamento -->
    <div class="col s12 m6 l6">
        <div class="card-content">
            <canvas id="chart-proveedores"></canvas>
        </div>
    </div>
    <!-- Gráfica de noticias por fecha -->
    <div class="col s12 m6 l6">
        <div class="card-content">
            <canvas id="chart-noticias"></canvas>
        </div>
    </div>
</div> 




<!-- Importación del archivo para generar gráficas en tiempo real. Para más información https://www.chartjs.org/ -->
    <script type="text/javascript" src="../../resources/js/chart.js"></script>
    
<?php
Dashboard::footerTemplate('main.js');
?>