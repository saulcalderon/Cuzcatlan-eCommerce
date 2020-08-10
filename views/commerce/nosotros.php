<?php
require_once('../../core/helpers/commerce.php');
Commerce::headerTemplate();
?>
<!-- Contenido principal -->
<main>
    <!-- Header de la página de la información -->
    <h5 class="center-align">About Cuzcatlán</h5>
    <h1 class="center-align margin slider-text">More than a Store, History & Culture</h1>
    <div class="container">
        <h6 class="center-align margin-separador ">Cuzcatlán was born as an online sell company about different kind of
        handicraft, made in different departments and towns around the country, each one  
        with a unique style that identifies every population where were they created.</h6>
    </div>
    <!-- Cartas para la misión, visión y valores -->
    <div class="row">
        <!-- Misión -->
        <div class="col s12 m6 l4 margin">
            <div class="card small">
                <div class="card-content">
                    <h4 class="center-align">Mission</h4>
                    <p>Expand the history and culture of all departaments through creations, or different materials, can show a meaning of the origin and express it through art.</p>
                </div>
            </div>
        </div>
        <!-- Visión -->
        <div class="col s12 m6 l4 margin">
            <div class="card small">
                <div class="card-content">
                    <h4 class="center-align">Vision</h4>
                    <p>Be the 2025 a store with the further expansion in salvadorian market</p>
                </div>
            </div>
        </div>
        <!-- Valores -->
        <div class="col s12 l4 margin">
            <div class="card small">
                <div class="card-content">
                    <h4 class="center-align">Values</h4>
                    <ul class="center-align">
                        <li>Compromise</li>
                        <li>Honesty</li>
                        <li>Transparency</li>
                        <li>Integrity</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Patrocinadores -->
    <h1 class="center-align slider-text margin">Sponsors</h1>
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
