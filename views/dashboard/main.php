<?php
require_once('../../core/helpers/dashboard.php');
require_once('../../core/helpers/database.php');
Dashboard::headerTemplate('Bienvenido');
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

<section>
            <h3 class="text-muted text-center mb-3 ">Estadisticas</h3>
            <div class="chart-container" style="margin: 0 auto">
                <canvas id="myChart"></canvas>
            </div>
            <div class="container-fluid">
              <div class="row mb-5">
                <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
                  <div class="row align-items-center">
                   
                    <div class="col-xl-6 col-6">
                      <h3 class="text-muted text-center mb-3">Pagos Recientes</h3>
                      <table class="responsive-table  centered highlight black-text" style="margin: 0 auto;">
                        <thead>
                          <tr class="text-muted black-text">
                            <th>#</th>
                            <th>Nombre</th>
                            <th>Cantidad</th>
                            <th>Fecha</th>
                            <th>Estado</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <th>1</th>
                            <td>Monica</td>
                            <td>$2000</td>
                            <td>25/05/2020</td>
                            <td><span class="green-text">Aprobado</span></td>
                          </tr>
                          <tr>
                            <th>2</th>
                            <td>James</td>
                            <td>$2000</td>
                            <td>25/05/2020</td>
                            <td><span class="green-text">Aprobado</span></td>
                          </tr>
                          <tr>
                            <th>3</th>
                            <td>Alex</td>
                            <td>$2000</td>
                            <td>25/05/2020</td>
                            <td><span class="red-text">Pendiente</span></td>
                          </tr>
                          <tr>
                            <th>4</th>
                            <td>Barbara</td>
                            <td>$2000</td>
                            <td>25/05/2020</td>
                            <td><span class="red-text">Pendiente</span></td>
                          </tr>
                          <tr>
                            <th>5</th>
                            <td>Michael</td>
                            <td>$2000</td>
                            <td>25/05/2020</td>
                            <td><span class="green-text">Aprobado</span></td>
                          </tr>
                          <tr>
                            <th>6</th>
                            <td>Katherine</td>
                            <td>$2000</td>
                            <td>25/05/2020</td>
                            <td><span class="red-text">Pendiente</span></td>
                          </tr>
                        </tbody>
                      </table>
                       <!-- paginacion -->
                           <ul class="pagination white-text center">
                                <li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
                                <li class="active"><a href="#!" class="waves-effect waves-rose btn-flat red">1</a></li>
                                <li class="waves-effect"><a href="#!">2</a></li>
                                <li class="waves-effect"><a href="#!">3</a></li>
                                <li class="waves-effect"><a href="#!">4</a></li>
                                <li class="waves-effect"><a href="#!">5</a></li>
                                <li class="waves-effect"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
                            </ul> 
                      <!-- final de paginacion -->
                    </div>
                   </div>
                </div>
              </div>
            </div>
          </section>

<!-- Importación del archivo para generar gráficas en tiempo real. Para más información https://www.chartjs.org/ -->
<script type="text/javascript" src="../../resources/js/chart.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js"></script>
<script type="text/javascript">
    var ctx= document.getElementById("myChart").getContext("2d");
    var myChart= new Chart(ctx,{
        type:"bar",
        data:{
          labels: <?php echo json_encode($json); ?> ,                                                                                            
            datasets:[{
                    label:'Datos',
                    data: <?php echo json_encode($json2); ?> ,
                    backgroundColor:[
                        'rgb(66, 134, 244)',
                        'rgb(252, 186, 3)',
                        'rgb(252, 32, 3)',
                        'rgb(74, 135, 72)',
                        'rgb(252, 144, 3)',
                        'rgb(157, 3, 252)'
                    ]
            }]
        },
        options:{
            responsive: true, 
            maintainAspectRatio: false, 
            scales:{
                yAxes:[{
                        ticks:{
                            beginAtZero:true
                        }
                }]
            }
        }
    });
</script>

<?php
Dashboard::footerTemplate('main.js');
?>
