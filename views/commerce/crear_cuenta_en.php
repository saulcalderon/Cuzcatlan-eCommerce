<?php
require_once('../../core/helpers/commerce_en.php');
Commerce::headerTemplate();
?>
<!-- Contenido principal -->
<main>
    <section>
        <div class="row">
            <div class="col s12 m10 l6 push-m1 push-l3">
                <div class="card-panel login-card white">
                    <div class="container login-container">
                        <h3 class="center-align">Sign up</h3>
                        <div class="row">
                            <form method="post" id="register-form" class="col s12">
                            <!-- Campo oculto para asignar el token del reCAPTCHA -->
                            <input type="hidden" id="g-recaptcha-response" name="g-recaptcha-response"/>
                                <div class="row">
                                    <div class="input-field col s12 m6">
                                        <i class="material-icons prefix">account_box</i>
                                        <input type="text" id="nombres_cliente" name="nombres_cliente" pattern="[a-zA-ZñÑáÁéÉíÍóÓúÚ\s]{1,50}" class="validate" required/>
                                        <label for="nombres_cliente">Names</label>
                                    </div>
                                    <div class="input-field col s12 m6">
                                        <i class="material-icons prefix">account_box</i>
                                        <input type="text" id="apellidos_cliente" name="apellidos_cliente" pattern="[a-zA-ZñÑáÁéÉíÍóÓúÚ\s]{1,50}" class="validate" required/>
                                        <label for="apellidos_cliente">Last Name</label>
                                    </div>
                                    <div class="input-field col s12 m6">
                                        <i class="material-icons prefix">email</i>
                                        <input type="email" id="correo_cliente" name="correo_cliente" maxlength="100" class="validate" required/>
                                        <label for="correo_cliente">Email</label>
                                    </div>
                                    <div class="input-field col s12 m6">
                                        <i class="material-icons prefix">phone</i>
                                        <input type="text" id="telefono_cliente" name="telefono_cliente" placeholder="0000-0000" class="validate" required/>
                                        <label for="telefono_cliente">Phone</label>
                                    </div>
                                    <div class="input-field col s12 m12">
                                        <i class="material-icons prefix">cake</i>
                                        <input type="date" id="nacimiento_cliente" name="nacimiento_cliente" class="validate" required/>
                                        <label for="nacimiento_cliente">Birthday</label>
                                    </div>
                                    <div class="input-field col s12">
                                        <i class="material-icons prefix">place</i>
                                        <input type="text" id="direccion_cliente" name="direccion_cliente" maxlength="200" class="validate" required/>
                                        <label for="direccion_cliente"> Address </label>
                                    </div>
                                    <div class="input-field col s12 m6">
                                        <i class="material-icons prefix">security</i>
                                        <input type="password" id="clave_cliente" name="clave_cliente" class="validate" required/>
                                        <label for="clave_cliente">Password</label>
                                    </div>
                                    <div class="input-field col s12 m6">
                                        <i class="material-icons prefix">security</i>
                                        <input type="password" id="confirmar_clave" name="confirmar_clave" class="validate" required/>
                                        <label for="confirmar_clave">Confirm Password</label>
                                    </div>
                                    
                                </div>
                                <p class="center-align">
                                    <label>
                                        <input type="checkbox" class="filled-in" id="condicion" name="condicion" required/>
                                        <span>Before you login, you may read our <a href="#terminos" class="modal-trigger">term and conditions</a>.</span>
                                    </label>
                                </p>
                                <div class="row">
                                    <div class="col s12 center-align">
                                        <button class="btn waves-effect waves-light btn-large black" type="submit" data-tooltip="register">Create account<i class="material-icons right">send</i></button>
                                    </div>
                                </div>
                            </form> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>     
</main>

<!-- Componente Modal para mostrar los Términos y condiciones -->
            <div id="terminos" class="modal">
                <div class="modal-content">
                    <h3 class="center-align">TÉRMINOS Y CONDICIONES</h4>
                    <h5>INFORMACIÓN RELEVANTE</h5>
                    <p>Es requisito necesario para la adquisición de los productos que se ofrecen en este sitio, que lea y acepte los siguientes Términos y Condiciones que a continuación se redactan. El uso de nuestros servicios así como la compra de nuestros productos implicará que usted ha leído y aceptado los Términos y Condiciones de Uso en el presente documento. Todas los productos  que son ofrecidos por nuestro sitio web pudieran ser creadas, cobradas, enviadas o presentadas por una página web tercera y en tal caso estarían sujetas a sus propios Términos y Condiciones. En algunos casos, para adquirir un producto, será necesario el registro por parte del usuario, con ingreso de datos personales fidedignos y definición de una contraseña. El usuario puede elegir y cambiar la clave para su acceso de administración de la cuenta en cualquier momento, en caso de que se haya registrado y que sea necesario para la compra de alguno de nuestros productos. cuzcatlan.com no asume la responsabilidad en caso de que entregue dicha clave a terceros. Todas las compras y transacciones que se lleven a cabo por medio de este sitio web, están sujetas a un proceso de confirmación y verificación, el cual podría incluir la verificación del stock y disponibilidad de producto, validación de la forma de pago, validación de la factura (en caso de existir) y el cumplimiento de las condiciones requeridas por el medio de pago seleccionado. En algunos casos puede que se requiera una verificación por medio de correo electrónico. Los precios de los productos ofrecidos en esta Tienda Online es válido solamente en las compras realizadas en este sitio web.</p>
                    <h5>LICENCIA</h5>
                    <p>Cuzcatlan  a través de su sitio web concede una licencia para que los usuarios utilicen  los productos que son vendidos en este sitio web de acuerdo a los Términos y Condiciones que se describen en este documento.</p>
                    <h5>USO NO AUTORIZADO</h5>
                    <p>En caso de que aplique (para venta de software, templetes, u otro producto de diseño y programación) usted no puede colocar uno de nuestros productos, modificado o sin modificar, en un CD, sitio web o ningún otro medio y ofrecerlos para la redistribución o la reventa de ningún tipo.</p>
                    <h5>PROPIEDAD</h5>
                    <p>Usted no puede declarar propiedad intelectual o exclusiva a ninguno de nuestros productos, modificado o sin modificar. Todos los productos son propiedad  de los proveedores del contenido. En caso de que no se especifique lo contrario, nuestros productos se proporcionan  sin ningún tipo de garantía, expresa o implícita. En ningún esta compañía será  responsables de ningún daño incluyendo, pero no limitado a, daños directos, indirectos, especiales, fortuitos o consecuentes u otras pérdidas resultantes del uso o de la imposibilidad de utilizar nuestros productos.</p>
                    <h5>POLITICA DE REEMBOLSO Y GARANTÍA</h5>
                    <p>En el caso de productos que sean  mercancías irrevocables no-tangibles, no realizamos reembolsos después de que se envíe el producto, usted tiene la responsabilidad de entender antes de comprarlo.  Le pedimos que lea cuidadosamente antes de comprarlo. Hacemos solamente excepciones con esta regla cuando la descripción no se ajusta al producto. Hay algunos productos que pudieran tener garantía y posibilidad de reembolso pero este será especificado al comprar el producto. En tales casos la garantía solo cubrirá fallas de fábrica y sólo se hará efectiva cuando el producto se haya usado correctamente. La garantía no cubre averías o daños ocasionados por uso indebido. Los términos de la garantía están asociados a fallas de fabricación y funcionamiento en condiciones normales de los productos y sólo se harán efectivos estos términos si el equipo ha sido usado correctamente.</p>
                    <h5>PRIVACIDAD</h5>
                    <p>Este cuzcatlan.com garantiza que la información personal que usted envía cuenta con la seguridad necesaria. Los datos ingresados por usuario o en el caso de requerir una validación de los pedidos no serán entregados a terceros, salvo que deba ser revelada en cumplimiento a una orden judicial o requerimientos legales. La suscripción a boletines de correos electrónicos publicitarios es voluntaria y podría ser seleccionada al momento de crear su cuenta. Cuzcatlan reserva los derechos de cambiar o de modificar estos términos sin previo aviso.</p>
                </div>
                <div class="divider"></div>
                <div class="modal-footer">
                    <a href="#!" class="modal-action modal-close btn waves-effect"><i class="material-icons">done</i></a>
                </div>
            </div>

<!-- Importación del archivo para que funcione el reCAPTCHA. Para más información https://developers.google.com/recaptcha/docs/v3 -->
    <!--<script src="https://www.google.com/recaptcha/api.js?render=6LdBzLQUAAAAAJvH-aCUUJgliLOjLcmrHN06RFXT"></script>-->
<?php
Commerce::FooterTemplate('registrarse.js');
?>