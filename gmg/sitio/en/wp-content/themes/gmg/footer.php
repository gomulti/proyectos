<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?>

  <section class="formulario" id="contacto">
    <h2 class="text-center tituloSeccion contacto" style="">Contact Us</h2>
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-lg-offset-6 Contacto-DatosContacto">
          <div class="row">
          	<?php
			  query_posts('p=98');				

			  while (have_posts()) : the_post();
				the_content();
			  endwhile;
			  wp_reset_query();
			?>
           
            <!--<div class="col-lg-11 Contacto-TxtSolicita">
              <img class="img-responsive" src="<?php echo esc_url( home_url( '/wp-content/themes/gmg/img/' ) );?>servicio24.png" />
              <h4>Request a <br>service</h4>
              <p>We operate <strong>throughout the country</strong>, no matter the origin or destination, <strong>we are experts in movement.</strong></p>
            </div>
            <div class="col-lg-11 col-lg-offset-2 Contacto-List">
              <p class="textoMail"><a href="mailto:ventas@grumasmoviles.mx" class="emailContacto textContacto">ventas@grumasmoviles.mx</a></p>
              <p class="localizacion textDireccion">Priv. El Tamborcito s/n <br>Km. 4 +500,  Cd. del Carmen, <br>Campeche, México </p>
              <p class="tituloTelefono textContacto">Tels.</p>
              <p class="primerTelefono textContacto">+52 938 286 4628</p>
              <p class=" textContacto">+52 938 118 9379</p>
              <p class="whatsapp textContacto">+52 938 118 9379</p>
            </div>-->
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-24">
          <div class="row">
            <div class="col-lg-16 col-lg-offset-3 ">
                <form id="contact-form" name="contact-form" method="post" class="Contacto-Form">
                  <?php //Comprobamos si el formulario ha sido enviado
                  if (isset( $_POST['btn-submit'] )) {
					?>
						<script type="text/javascript">
							$(document).ready(function()
							{
								$('html, body').animate(
								{
									scrollTop: ($("#contact-form").offset().top)
								}, 400, 'swing');
							});
						</script>
                	<?php
                    //Creamos una variable para almacenar los errores
                    global $reg_errors;
                    $reg_errors = new WP_Error;
     
                    //Recogemos en variables los datos enviados en el formulario y los sanitizamos.
                    //Si detectamos algún error, podremos más abajo rellenar los campos del formulario con los datos enviados para no tener que empezar el formulario de cero
                    $f_name = sanitize_text_field($_POST['f_name']);
                    $f_email = sanitize_email($_POST['f_email']);
                    $f_phone = sanitize_text_field($_POST['f_phone']);
					$f_empresa = sanitize_text_field($_POST['f_empresa']);
                    $f_message = sanitize_text_field($_POST['f_message']);
     
                    //El campo Nombre es obligatorio, comprobamos que no esté vacío y en caso contrario creamos un registro de error
                    if ( empty( $f_name ) ) {
                      $reg_errors->add("empty-name", "The field name is required");
                    }
                    //El campo Email es obligatorio, comprobamos que no esté vacío y en caso contrario creamos un registro de error
                    if ( empty( $f_email ) ) {
                      $reg_errors->add("empty-email", "The e-mail field is mandatory");
                    }
                    //Comprobamos que el dato tenga formato de e-mail con la función de WordPress "is_email" y en caso contrario creamos un registro de error
                    if ( !is_email( $f_email ) ) {
                      $reg_errors->add( "invalid-email", "The e-mail does not have a valid format" );
                    }
					//El campo teléfono es obligatorio, comprobamos que no esté vacío y en caso contrario creamos un registro de error
                    if ( empty( $f_phone ) ) {
                      $reg_errors->add("empty-phone", "The telephone field is required");
                    }
					//El campo empresa es obligatorio, comprobamos que no esté vacío y en caso contrario creamos un registro de error
                    if ( empty( $f_empresa ) ) {
                      $reg_errors->add("empty-empresa", "The company field is mandatory");
                    }
                    //El campo Mensaje es obligatorio, comprobamos que no esté vacío y en caso contrario creamos un registro de error
                    if ( empty( $f_message ) ) {
                      $reg_errors->add("empty-message", "The detail field of your request is required");
                    }
     
                    //Si no hay errores enviamos el formulario
                    if (count($reg_errors->get_error_messages()) == 0) {
                      //Destinatario
                      $recipient = "ventas@grumasmoviles.mx";
     
                      //Asunto del email
                      $subject = 'Contact Form ' . get_bloginfo( 'name' );
     
                      //La dirección de envio del email es la de nuestro blog por lo que agregando este header podremos responder al remitente original
                      $headers = "Reply-to: " . $f_name . " <" . $f_email . ">\r\n";
     
                      //Montamos el cuerpo de nuestro e-mail
                      $message = "Name: " . $f_name . "<br>";
                      $message .= "E-mail: " . $f_email . "<br>";
					  $message .= "Telephone: " . $f_phone . "<br>";	
					  $message .= "Company: " . $f_empresa . "<br>";
                      $message .= "Message: " . nl2br($f_message) . "<br>";
                                       
                      //Filtro para indicar que email debe ser enviado en modo HTML
                      add_filter('wp_mail_content_type', create_function('', 'return "text/html";'));
                                        
                      //Por último enviamos el email
                      $envio = wp_mail( $recipient, $subject, $message, $headers, $attachments);

                      ?><?php
     
                      //Si el e-mail se envía correctamente mostramos un mensaje y vaciamos las variables con los datos. En caso contrario mostramos un mensaje de error
                      if ($envio) {
                        unset($f_name);
                        unset($f_email);
                        unset($f_phone);
						unset($f_empresa);
                        unset($f_message);?>
                        <div class="alert alert-success alert-dismissable">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                          The form has been sent correctly.
                        </div>
                      <?php }else {?>
                        <div class="alert alert-danger alert-dismissable">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                          An error has occurred sending the form. You can try it later.
                        </div>
                      <?php }?><?php
                    }
                  }?>
                  <div class="row">
                    <div class="col-lg-24">
                      <div class="row">
                        <div class="col-lg-12 Contacto-Col">
                          <div class="form-group">
                            <input type="text" id="f_name" name="f_name" class="form-control nombreContacto formulariomisionk" value="<?php echo $f_name;?>" placeholder="Full name" required aria-required="true">
                            <?php //Comprobamos si hay errores en la validación del campo Nombre
                            if ( is_wp_error( $reg_errors ) ) {
                              if ($reg_errors->get_error_message("empty-name")) {?>
                              <br class="clearfix" />
                              <div class="alert alert-danger alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <p><?php echo $reg_errors->get_error_message("empty-name");?></p>
                              </div>
                              <?php }
                            }?>
                          </div>
                        </div>
                        <div class="col-lg-12 Contacto-Col">
                          <div class="form-group">
                            <input type="email" id="f_email" name="f_email" class="form-control inputEmail formulariomisionk" value="<?php echo $f_email;?>" placeholder="Email" required aria-required="true">
                            <?php //Comprobamos si hay errores en la validación del campo E-mail
                            if ( is_wp_error( $reg_errors ) ) {
                              if ($reg_errors->get_error_message("empty-email")) {?>
                              <br class="clearfix" />
                              <div class="alert alert-danger alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <p><?php echo $reg_errors->get_error_message("empty-email");?></p>
                              </div>
                              <?php }
                            }
                            //Comprobamos si hay errores en el formato del campo E-mail
                            if ( is_wp_error( $reg_errors ) ) {
                              if ($reg_errors->get_error_message("invalid-email")) {?>
                              <br class="clearfix" />
                              <div class="alert alert-warning alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <p><?php echo $reg_errors->get_error_message("invalid-email");?></p>
                              </div>
                              <?php }
                            }?>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-24">
                      <div class="row">
                        <div class="col-lg-12 Contacto-Col">
                          <div class="form-group">
                            <input type="text" id="f_phone" name="f_phone" class="form-control inputEmail formulariomisionk" value="<?php echo $f_phone;?>" placeholder="Telephone" required aria-required="true">
                            <?php //Comprobamos si hay errores en la validación del campo Nombre
                            if ( is_wp_error( $reg_errors ) ) {
                              if ($reg_errors->get_error_message("empty-phone")) {?>
                              <br class="clearfix" />
                              <div class="alert alert-danger alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <p><?php echo $reg_errors->get_error_message("empty-phone");?></p>
                              </div>
                              <?php }
                            }?>
                          </div>
                        </div>
                        <div class="col-lg-12 Contacto-Col">
                          <div class="form-group">
                            <input type="text" id="f_empresa" name="f_empresa" class="form-control" value="<?php echo $f_empresa;?>" placeholder="Company" required aria-required="true">
                            <?php //Comprobamos si hay errores en la validación del campo Nombre
                            if ( is_wp_error( $reg_errors ) ) {
                              if ($reg_errors->get_error_message("empty-empresa")) {?>
                              <br class="clearfix" />
                              <div class="alert alert-danger alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <p><?php echo $reg_errors->get_error_message("empty-empresa");?></p>
                              </div>
                              <?php }
                            }?>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-24 col-md-24">
                      <div class="form-group">
                        <textarea id="f_message" name="f_message" rows="7" class="form-control Form-TextArea" placeholder="Details of your request" required aria-required="true"><?php echo $f_message;?></textarea>
         
                        <?php //Comprobamos si hay errores en la validación del campo Mensaje
                        if ( is_wp_error( $reg_errors ) ) {
                          if ($reg_errors->get_error_message("empty-message")) {?>
                          <br class="clearfix" />
                          <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <p><?php echo $reg_errors->get_error_message("empty-message");?></p>
                          </div>
                          <?php }
                        }?>
                      </div>
                    </div>

                  </div>
                  <div class="row">
                    <div class="col-lg-24 col-md-24 text-right">
                      <button type="submit" id="btn-submit" name="btn-submit" class="btn btn-danger btnEnviar btn_vermas btnSolicitud">Send</button>
                    </div>
                  </div>
                </form>
            </div>
          </div>
        </div>
      </div>
    </div>

    <footer class="site-footer" role="contentinfo">
      <p>© 2017. All rights reserved. Grúas Móviles del Golfo. Design and development by <a href="http://gomultimedios.com/" target="_blanck">GO multimedios</a>.</p>
    </footer><!-- .site-footer -->
  </section>

</section>

	</div><!-- .site-inner -->
</div><!-- .site -->
<script type="text/javascript">
$(window).scroll(function(){
 if ($(window).scrollTop() == $(document).height() - $(window).height()){
 	$('footer').removeClass('');
 }
 else{
 	$('footer').addClass('');
 }
 
    AOS.init({
      easing: 'ease-in-out-sine'
    });
});
</script>
<?php wp_footer(); ?>
</body>
</html>
