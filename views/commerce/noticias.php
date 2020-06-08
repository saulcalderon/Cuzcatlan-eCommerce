<?php
require_once('../../core/helpers/templates.php');
Templates::headerTemplate();
?>
<!-- Contenido principal -->
<main>
    <h5 class="center-align margin">Noticias Cuzcatlán</h5>
    <h1 class="center-align slider-text margin">Noticias, descuentos, promociones y más.</h1>
    <!-- División de las categorías y las noticias -->
    <div class="row container login-container">
        <!-- Noticias ocupan 12 espacios con un contenedor-->
        <div class="col s12">
            <div class="row">
                <div class="col s12">
                    <div class="card horizontal margin">
                        <div class="card-image hide-on-small-only">
                            <img src="../../resources/img/commerce/3.1.png">
                        </div>
                        <div class="card-stacked">
                            <div class="card-content">
                                <h4 class="header">Nueva colección: Lula's shirts, te trae lo mejor en comodidad y estilo</h4>
                                <p>por Saúl Calderón  |  Enero 20, 2020</p>
                                <p>Siempre con los mejores proveedores, Lula's shirts es el nuevo estilo proporcionado por el prestigioso empresario y diseñador de moda Saúl Calderón. </p>
                                <a href="#">Ver más</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col s12">
                    <div class="card horizontal margin">
                        <div class="card-image hide-on-small-only">
                            <img src="../../resources/img/commerce/3.1.png">
                        </div>
                        <div class="card-stacked">
                            <div class="card-content">
                                <h4 class="header">Nueva colección: Lula's shirts, te trae lo mejor en comodidad y estilo</h4>
                                <p>por Saúl Calderón  |  Enero 20, 2020</p>
                                <p>Siempre con los mejores proveedores, Lula's shirts es el nuevo estilo proporcionado por el prestigioso empresario y diseñador de moda Saúl Calderón. </p>
                                <a href="#">Ver más</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col s12">
                    <div class="card horizontal margin">
                        <div class="card-image hide-on-small-only">
                            <img src="../../resources/img/commerce/3.1.png">
                        </div>
                        <div class="card-stacked">
                            <div class="card-content">
                                <h4 class="header">Nueva colección: Lula's shirts, te trae lo mejor en comodidad y estilo</h4>
                                <p>por Saúl Calderón  |  Enero 20, 2020</p>
                                <p>Siempre con los mejores proveedores, Lula's shirts es el nuevo estilo proporcionado por el prestigioso empresario y diseñador de moda Saúl Calderón. </p>
                                <a href="#">Ver más</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Botón para recargar más noticias-->
            <div class="row">
                <div class="col s12 center-align">
                        <a class="waves-effect waves-light btn-large margin"><i class="material-icons right">chevron_right</i>Ver más noticias</a>
                </div>
            </div>
        </div>        
    </div> 
</main>
<?php
Templates::FooterTemplate();
?>
