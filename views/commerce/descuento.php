<?php
require_once('../../core/helpers/commerce.php');
Commerce::headerTemplate();
?>
<!-- Contenido principal -->
<main>
    <h1 class="center-align">Cuadros</h1>
    <div class="container">
        <h5 class="center-align margin">Hechos con las manos trabajadoras de los salvadoreños </h5>
    </div>
    <div class="row">
        <div class="col s12 l3 margin center-align">
            <div class="card menu-categorias">
                <div class="card-content">
                    <span class="card-title">Categorías</span>
                    <h6><a href="descuento.php">Descuentos</a></h6>
                    <h6><a href="promociones.php">Promociones</a></h6>
                    <h6><a href="">Noticias</a></h6>
                    <h6><a href="productos.php">General</a></h6>
                </div>
            </div>
        </div>
        <div class="col s12 l9">
            <div class="row">
                <div class="swiper-container descuento">
                    <div class="swiper-wrapper" id="swiper"> 
                    
                    </div>
                </div>
            </div>
        </div>
            
        
        
    </div>
</main>
<?php
Commerce::FooterTemplate('descuento');
?>