<?php
require_once('../../core/helpers/templates.php');
Templates::headerTemplate();
?>
<!-- Contenido principal -->
<main>
    <div class="row">
        <div class="col s12 m6">
            <!-- Slider de fotos del producto -->
            <div class="swiper-container gallery-top margin">
                <div class="swiper-wrapper">
                    <div class="swiper-slide fondo-imagen" style="background-image:url(../../resources/img/commerce/2.1.png);"></div>
                    <div class="swiper-slide fondo-imagen" style="background-image:url(../../resources/img/commerce/3.1.png);"></div>
                    <div class="swiper-slide fondo-imagen" style="background-image:url(../../resources/img/commerce/1.2.png);"></div>
                </div>
                <!-- Add Arrows -->
                <div class="swiper-button-next swiper-button-white"></div>
                <div class="swiper-button-prev swiper-button-white"></div>
            </div>
            <div class="swiper-container gallery-thumbs hide-on-small-only">
                <div class="swiper-wrapper">
                    <div class="swiper-slide fondo-imagen" style="background-image:url(../../resources/img/commerce/2.1.png);"></div>
                    <div class="swiper-slide fondo-imagen" style="background-image:url(../../resources/img/commerce/3.1.png);"></div>
                    <div class="swiper-slide fondo-imagen" style="background-image:url(../../resources/img/commerce/1.2.png);"></div>
                </div>
            </div>
        </div>
        <div class="col s12 m6 margin">
            <div class="container gen">
                <!-- Información del producto-->
                <h4>Pintura de frutas de madera</h4>
                <div class="row">
                        <div class="col s12 m6">
                            <h5>$20</h5>
                        </div>
                        <div class="col s12 m6">
                            <h5>Cat.Hogar</h5>
                        </div>
                        <div class="col s12">
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus hic neque quos amet aspernatur magnam consequatur sapiente non quas cumque ut deleniti facilis eligendi, ipsam reiciendis reprehenderit iste tempora numquam.</p>
                        </div>
                </div>
                <div class="row">
                        <div class="col s12 m3">
                            <h5>Cantidad:</h5>
                        </div>
                        <div class="col s12 m2">
                            <input id="number" type="number" value="1">
                        </div>
                        <div class="col s12 m4 push-m2">
                            <h5>4 disponibles</h5>
                        </div>
                </div>
                <div class="row">
                        <div class="col s6">
                            <a class="waves-effect waves-light btn-large margin"><i class="material-icons left">add_shopping_cart</i>Agregar al carrito</a>
                        </div>
                        <div class="col s6">
                            <a class="waves-effect waves-light btn-large margin"><i class="material-icons right">arrow_downward</i>Comprar ahora!</a>
                        </div>
                </div>
                <div class="row">
                        <!--<div class="col s5 margin">
                            <p class="left-align">
                                <label>
                                    <input type="checkbox" class="filled-in" />
                                    <span>Agregar a la lista de deseo</span>
                                </label>
                            </p>
                        </div>-->
                        <div class="col s7 margin">
                            <h6>Proveedor: <span>Mercado de Artesanías</span></h6>
                        </div>
                </div>
            </div>
        </div>
    </div>
    <div class="divider margin"></div>
    <!-- Apartado de valoraciones y reseñas -->
    <h1 class="center-align slider-text margin-separador">Valoraciones y reseñas</h1>
    <div class="container gen">
        <!-- Información en general de valoraciones -->
        <div class="row">
            <!-- Estadísticas de las reseñas -->
            <div class="col s12 m4 center-align">
                <!-- Estadísticas generales -->
                <div class="row">
                    <div class="col s12">
                        <h2>4.6</h2>
                    </div>
                    <div class="col s12">
                        <i class="material-icons">star</i>
                        <i class="material-icons">star</i>
                        <i class="material-icons">star</i>
                        <i class="material-icons">star</i>
                        <i class="material-icons">star_half</i>
                    </div>
                    <div class="col s12">
                        <h6>16 valoraciones</h6>
                    </div>
                </div>
            </div>
            <!-- Estadísticas puntuales -->
            <div class="col s12 m4">
                <div class="row">
                    <div class="col s12">
                        <div class="row">
                            <div class="col s2">
                                <h6>1<i class="material-icons stars">star</i></h6>
                            </div>
                            <div class="col s6">
                                <div class="meter orange nostripes" style="width:60px;"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col s12">
                        <div class="row">
                            <div class="col s2">
                                <h6>2<i class="material-icons stars">star</i></h6>
                            </div>
                            <div class="col s6">
                                <div class="meter orange nostripes" style="width:100px;"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col s12">
                        <div class="row">
                            <div class="col s2">
                                <h6>3<i class="material-icons stars">star</i></h6>
                            </div>
                            <div class="col s6">
                                <div class="meter orange nostripes" style="width:150px;"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col s12">
                        <div class="row">
                            <div class="col s2">
                                <h6>4<i class="material-icons stars">star</i></h6>
                            </div>
                            <div class="col s6">
                                <div class="meter orange nostripes" style="width:210px;"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col s12">
                        <div class="row">
                            <div class="col s2">
                                <h6>5<i class="material-icons stars">star</i></h6>
                            </div>
                            <div class="col s6">
                                <div class="meter orange nostripes" style="width:250px;"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col s4">
                <a class="waves-effect waves-light btn-large margin"><i class="material-icons right">chevron_right</i>Escribir una reseña</a>
            </div>
        </div>
        <!-- Valoraciones de los usuarios -->
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
            </div>    
        </div>
    <div class="row">
        <div class="col s12 center-align">
            <a class="waves-effect waves-light btn-large margin"><i class="material-icons right">chevron_right</i>Ver más reseñas</a>
        </div>
    </div>
</main>
<?php
Templates::FooterTemplate();
?>
