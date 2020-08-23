<?php
require_once('../../core/helpers/commerce_en.php');
Commerce::headerTemplate();
?>
<!-- Contenido principal -->
<main>
    <h5 class="center-align margin">News from Cuzcatlán</h5>
    <h1 class="center-align slider-text margin">News, sales, promotions y más.</h1>
    <!-- División de las categorías y las noticias -->
    <div class="row container login-container">
        <!-- Noticias ocupan 12 espacios con un contenedor-->
        <div class="col s12">
            <div class="row" id="noticias" name="noticias">
            </div>
            <!-- Botón para recargar más noticias
            <div class="row">
                <div class="col s12 center-align">
                        <a class="waves-effect waves-light btn-large margin"><i class="material-icons right">chevron_right</i>Ver más noticias</a>
                </div>
            </div>-->
        </div>        
    </div> 
</main>
<?php
Commerce::FooterTemplate('noticias.js');
?>
