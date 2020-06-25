<?php
require_once('../../core/helpers/commerce.php');
Commerce::headerTemplate();
?>
<!-- Contenido principal -->
<main>
    <!-- Header de la página de la información -->
    <h5 class="center-align">Acerca de Cuzcatlán</h5>
    <h1 class="center-align margin slider-text">Más que una tienda, Historia y Cultura</h1>
    <div class="container">
        <h6 class="center-align margin-separador ">Cuzcatlán nace como una empresa de venta online de diferentes tipos de
        artesanías, creadas en distintos departamentos y municipios del país, cada una 
        con un estilo que caracteriza a las poblaciones donde se crean.</h6>
    </div>
    <!-- Cartas para la misión, visión y valores -->
    <div class="row">
        <!-- Misión -->
        <div class="col s12 m6 l4 margin">
            <div class="card small">
                <div class="card-content">
                    <h4 class="center-align">Misión</h4>
                    <p>Expandir la historia y cultura de todos los departamentos donde por medio de las creaciones a mano, o de los diferentes materiales, representan un significado del origen y lo expresan mediante el arte.</p>
                </div>
            </div>
        </div>
        <!-- Visión -->
        <div class="col s12 m6 l4 margin">
            <div class="card small">
                <div class="card-content">
                    <h4 class="center-align">Visión</h4>
                    <p>Ser para el año 2025 una de las tiendas online con mayor expansión el mercado salvadoreño</p>
                </div>
            </div>
        </div>
        <!-- Valores -->
        <div class="col s12 l4 margin">
            <div class="card small">
                <div class="card-content">
                    <h4 class="center-align">Valores</h4>
                    <ul class="center-align">
                        <li>Compromiso</li>
                        <li>Honestidad</li>
                        <li>Transparencia</li>
                        <li>Integridad</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Patrocinadores -->
    <h1 class="center-align slider-text margin">Patrocinadores</h1>
    <div class="patrocinadores">
        <div class="container">
            <div class="row margin">
                <!-- Imágenes de patrocinadores -->
                <div class="col s12 m6">
                    <div class="card">
                        <div class="card-image ">
                            <img src="../../resources/img/commerce/mitur.png" height="300px">
                        </div>
                    </div>
                </div>
                <div class="col s12 m6">
                    <div class="card">
                        <div class="card-image ">
                            <img src="../../resources/img/commerce/pv.jpg" height="300px">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php
Commerce::FooterTemplate();
?>
