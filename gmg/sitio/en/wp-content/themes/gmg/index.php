<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); ?>
<section class="slider">
	<!-- Carousel
	================================================== -->
  <div class="imagenFuerza"></div>
	<div id="myCarousel" class="carousel slide carousel-fade" data-ride="carousel">
	  <div class="carousel-inner" role="listbox">
		<?php
		if (have_posts()) :
			query_posts('category_name=Slider&posts_per_page=5' );
			$theItem = 0;
			$theActive = "active";
			while (have_posts()) : 
				the_post();
				// Ruta de la imagen destacada (tamaño completo)
				global $post;
				global $more; $more = 0;
				$thumbID = get_post_thumbnail_id( $post->ID );
				$imgDestacada = wp_get_attachment_url( $thumbID );
				if($theItem != 0){
					$theActive = "";
				}
				$imageContent = get_the_content();
				$stripped = strip_tags($imageContent, '<p> <a>'); //replace <p> and <a> with whatever tags you want to keep after the strip
				?>
		        <div class="item <?php echo $theActive;?>" style="background: url(<?php echo $imgDestacada;?>); background-size: 100%; background-position: 50%; height: 100vh;">
		          <div class="container">
		            <div class="carousel-caption">
		            </div>
		          </div>
		        </div>
			<?php
			$imageContent = get_the_content();
			$stripped = strip_tags($imageContent, '<p> <a>'); //replace <p> and <a> with whatever tags you want to keep after the strip
			?>
			<?php
			$theItem++;
		endwhile;
		endif;?>
		</div>
	  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
	    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
	    <span class="sr-only">Previous</span>
	  </a>
	  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
	    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
	    <span class="sr-only">Next</span>
	  </a>
	</div><!-- /.carousel -->
</section>

  <section class="conocenos" id="equipos" style="background: url('<?php echo esc_url( home_url( '/wp-content/uploads/2017/09/' ) );?>tractocamiones-1.jpg');">
    <h2 class="text-center tituloSeccion" style="">Equipment and services</h2>

    <section class="tabs">
        <!-- Custom Tabs -->
        <div class="nav-tabs-custom">
          <div class="container" id="contenidosTabs">
          <ul class="nav nav-tabs">
            <li class="active col-lg-6 col-md-6 col-sm-6 col-xs-24">
              <a class="linksTab" href="#tab_1" data-toggle="tab">
                Tractors
              </a>
            </li>
            <li class="col-lg-6 col-md-6 col-sm-6 col-xs-24">
              <a class="linksTab" href="#tab_2" data-toggle="tab">
               Articulated cranes
              </a>
            </li>
            <li class="col-lg-6 col-md-6 col-sm-6 col-xs-24">
              <a class="linksTab" href="#tab_3" data-toggle="tab">
                Telescopic Cranes
              </a>
            </li>
            <li class="col-lg-6 col-md-6 col-sm-6 col-xs-24">
              <a class="linksTab" href="#tab_4" data-toggle="tab">
                Forklift
              </a>
            </li>
          </ul>
          </div>
          <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
                <div class="container">
                  <div class="col-lg-24 contenidoTab">
                    <div class="espacio">
                    <?php query_posts('p=65');
                    if (have_posts()) : ?>
                    <?php 
                      query_posts('p=65');?>

                    <?php
                      while (have_posts()) : 
                        the_post();
                        // Ruta de la imagen destacada (tamaño completo)
                        global $post;
                        global $more; $more = 0;
                        $thumbID = get_post_thumbnail_id( $post->ID );
                        $imgDestacada = wp_get_attachment_url( $thumbID );
                        $resumen = get_post_meta( $post->ID, 'Resumen', true );
                        ?>
                      <?php
                      $imageContent = get_the_content();
                      $stripped = strip_tags($imageContent, '<p> <a>'); //replace <p> and <a> with whatever tags you want to keep after the strip
                      $enlace = get_permalink();
                      $subtituloEquipo = get_post_meta($post->ID, "subtituloEquipo", $single = true);
                      $descripcionEquipo = get_post_meta($post->ID, "descripcionEquipo", $single = true);
                      ?>
                      <div class="row">
                        <div class="col-lg-18 col-lg-offset-3">
                          <div class="row">
                            <div class="col-lg-9">
                              <h3 class="tituloSeccionContenido"><?php echo the_title();?></h3>
                              <p class="subtituloSeccionContenido"><?php echo $subtituloEquipo;?></p>
                            </div>
                            <div class="col-lg-14 col-lg-offset-1">
                              <p><?php echo $descripcionEquipo;?></p>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row elContenido">
                        <div class="col-lg-24">
                          <?php the_content();?>
                        </div>
                      </div>
                      <div class="hidden" data-imagenseccion="<?php echo $imgDestacada;?>" id="imgDestacada"></div>
                      <?php
                    endwhile;
                    endif;?>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_2">
                <div class="container">
                  <div class="col-lg-24 contenidoTab">
                    <div class="espacio">
                    <?php query_posts('p=69');
                    if (have_posts()) : ?>
                    <?php 
                      query_posts('p=69');?>

                    <?php
                      while (have_posts()) : 
                        the_post();
                        // Ruta de la imagen destacada (tamaño completo)
                        global $post;
                        global $more; $more = 0;
                        $thumbID = get_post_thumbnail_id( $post->ID );
                        $imgDestacada = wp_get_attachment_url( $thumbID );
                        $resumen = get_post_meta( $post->ID, 'Resumen', true );
                        ?>
                      <?php
                      $imageContent = get_the_content();
                      $stripped = strip_tags($imageContent, '<p> <a>'); //replace <p> and <a> with whatever tags you want to keep after the strip
                      $enlace = get_permalink();
                      $subtituloEquipo = get_post_meta($post->ID, "subtituloEquipo", $single = true);
                      $descripcionEquipo = get_post_meta($post->ID, "descripcionEquipo", $single = true);
                      ?>
                      <div class="row">
                        <div class="col-lg-18 col-lg-offset-3">
                          <div class="row">
                            <div class="col-lg-9">
                              <h3 class="tituloSeccionContenido"><?php echo the_title();?></h3>
                              <p class="subtituloSeccionContenido"><?php echo $subtituloEquipo;?></p>
                            </div>
                            <div class="col-lg-14 col-lg-offset-1">
                              <p><?php echo $descripcionEquipo;?></p>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row elContenido">
                        <div class="col-lg-12 col-lg-offset-11">
                          <?php the_content();?>
                        </div>
                      </div>
                      <div class="hidden" data-imagenseccion="<?php echo $imgDestacada;?>" id="imgDestacada"></div>
                      <?php
                    endwhile;
                    endif;?>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_3">
                <div class="container">
                  <div class="col-lg-24 contenidoTab">
                    <div class="espacio">
                    <?php query_posts('p=73');
                    if (have_posts()) : ?>
                    <?php 
                      query_posts('p=73');?>

                    <?php
                      while (have_posts()) : 
                        the_post();
                        // Ruta de la imagen destacada (tamaño completo)
                        global $post;
                        global $more; $more = 0;
                        $thumbID = get_post_thumbnail_id( $post->ID );
                        $imgDestacada = wp_get_attachment_url( $thumbID );
                        $resumen = get_post_meta( $post->ID, 'Resumen', true );
                        ?>
                      <?php
                      $imageContent = get_the_content();
                      $stripped = strip_tags($imageContent, '<p> <a>'); //replace <p> and <a> with whatever tags you want to keep after the strip
                      $enlace = get_permalink();
                      $subtituloEquipo = get_post_meta($post->ID, "subtituloEquipo", $single = true);
                      $descripcionEquipo = get_post_meta($post->ID, "descripcionEquipo", $single = true);
                      ?>
                      <div class="row">
                        <div class="col-lg-18 col-lg-offset-3">
                          <div class="row">
                            <div class="col-lg-9">
                              <h3 class="tituloSeccionContenido"><?php echo the_title();?></h3>
                              <p class="subtituloSeccionContenido"><?php echo $subtituloEquipo;?></p>
                            </div>
                            <div class="col-lg-14 col-lg-offset-1">
                              <p><?php echo $descripcionEquipo;?></p>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row elContenido">
                        <div class="col-lg-12 col-lg-offset-11">
                          <?php the_content();?>
                        </div>
                      </div>
                      <div class="hidden" data-imagenseccion="<?php echo $imgDestacada;?>" id="imgDestacada"></div>
                      <?php
                    endwhile;
                    endif;?>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_4">
                <div class="container">
                  <div class="col-lg-24 contenidoTab">
                    <div class="espacio">
                    <?php query_posts('p=77');
                    if (have_posts()) : ?>
                    <?php 
                      query_posts('p=77');?>

                    <?php
                      while (have_posts()) : 
                        the_post();
                        // Ruta de la imagen destacada (tamaño completo)
                        global $post;
                        global $more; $more = 0;
                        $thumbID = get_post_thumbnail_id( $post->ID );
                        $imgDestacada = wp_get_attachment_url( $thumbID );
                        $resumen = get_post_meta( $post->ID, 'Resumen', true );
                        ?>
                      <?php
                      $imageContent = get_the_content();
                      $stripped = strip_tags($imageContent, '<p> <a>'); //replace <p> and <a> with whatever tags you want to keep after the strip
                      $enlace = get_permalink();
                      $subtituloEquipo = get_post_meta($post->ID, "subtituloEquipo", $single = true);
                      $descripcionEquipo = get_post_meta($post->ID, "descripcionEquipo", $single = true);
                      ?>
                      <div class="row">
                        <div class="col-lg-18 col-lg-offset-3">
                          <div class="row">
                            <div class="col-lg-9">
                              <h3 class="tituloSeccionContenido"><?php echo the_title();?></h3>
                              <p class="subtituloSeccionContenido"><?php echo $subtituloEquipo;?></p>
                            </div>
                            <div class="col-lg-14 col-lg-offset-1">
                              <p><?php echo $descripcionEquipo;?></p>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row elContenido">
                        <div class="col-lg-12 col-lg-offset-11">
                          <?php the_content();?>
                        </div>
                      </div>
                      <div class="hidden" data-imagenseccion="<?php echo $imgDestacada;?>" id="imgDestacada"></div>
                      <?php
                    endwhile;
                    endif;?>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.tab-pane -->
          </div>
          <!-- /.tab-content -->
        </div>
        <!-- nav-tabs-custom -->
    </section>
  </section>

  <section class="nosotros" id="nosotros">
    <h2 class="text-center tituloSeccion" style="">About us</h2>
    <div class="container">
      <div class="row">
        <div class="col-lg-18 col-lg-offset-3">
          <div class="row textoNosotros">
           
           	 <?php
			  query_posts('p=81');				

			  while (have_posts()) : the_post();
			?>
           
            <div class="col-lg-9 Nosotros-ColSomos">
              <h3 class="Nosotros-Somos"><?php echo get_the_excerpt();  ?></h3>
            </div>
            <div class="Nosotros-Text col-lg-14 col-lg-offset-1">
              	<?php
	            	the_content();
				?>
            </div>
            
            <?php
			  endwhile;
			  wp_reset_query();
			?>                        
            
          </div>
        </div>
      </div>
      <div class="espacioImagen"></div>
      <!--<h4 class="clientes">Our costumers recommend us</h4>-->
      <div class="row">
        <div class="col-lg-18 col-lg-offset-3 clientesTodos">
          <?php
		  	query_posts('p=83');				

		  	while (have_posts()) : the_post();
			?>

				<div class="row">
				<?php
					the_content();
				?>
			</div>

		<?php
		  	endwhile;
		  	wp_reset_query();
		?>
        </div>
      </div>
    </div>
  </section>


<script src="http://cdnjs.cloudflare.com/ajax/libs/highlight.js/8.6/highlight.min.js"></script>
<script src="https://www.youtube.com/iframe_api"></script>

<script type="text/javascript">

var player,
    time_update_interval = 0;

function onYouTubeIframeAPIReady() {
    player = new YT.Player('video-placeholder', {
        width: 600,
        height: 300,
        videoId: 'DapUtht-qfw',
        playerVars: {
            color: 'white',
            playlist: 'taJ60kskkns,FG0fTKAqZ5g'
        },
        events: {
            onReady: initialize
        }
    });
}

function initialize(){

    // Update the controls on load
    updateTimerDisplay();
    updateProgressBar();

    // Clear any old interval.
    clearInterval(time_update_interval);

    // Start interval to update elapsed time display and
    // the elapsed part of the progress bar every second.
    time_update_interval = setInterval(function () {
        updateTimerDisplay();
        updateProgressBar();
    }, 1000);


    $('#volume-input').val(Math.round(player.getVolume()));
}
// This function is called by initialize()
function updateTimerDisplay(){
    // Update current time text display.
    /*
    $('#current-time').text(formatTime( player.getCurrentTime() ));
    $('#duration').text(formatTime( player.getDuration() ));*/
}
// This function is called by initialize()
function updateProgressBar(){
    // Update the value of our progress bar accordingly.
    /*
    $('#progress-bar').val((player.getCurrentTime() / player.getDuration()) * 100);*/
}

$( document ).ready(function() {
  $('a.linksTab').click(function(){
    idClick = $(this).attr('href');
    link = $(idClick).find('#imgDestacada').data('imagenseccion');
    $('#equipos').css('background','url('+link+')')
  });
  $('a[href="#contact-form"]')
  .addClass('botonServicio')
  .html('<button type="button" class="btn btn-danger btnSolicitud">Request a service</button>')
  .before('<div class="contenedor"><div class="contenedorDIV"><a href="<?php echo esc_url( home_url( "../" ) );?>"><img class="imgIdioma" src="<?php echo esc_url( home_url( "/wp-content/themes/gmg/img/" ) );?>banderaMX.png"/></a></div><div class="contenedorDIV"><a href="<?php echo esc_url( home_url( "/" ) );?>"><img class="imgIdioma" src="<?php echo esc_url( home_url( "/wp-content/themes/gmg/img/" ) );?>banderaUK.png"/></a></div></div>');
  $('.btnConocenosvmas').click(function(){
    if($('.txtConocenos').hasClass("clicado")){
      $('.txtConocenos').removeClass('clicado');
    }
    else{
      $('.txtConocenos').addClass('clicado');
    }
  });


  // Playback

  $('#play').on('click', function () {
      //player.playVideo();
  });
  $('#myModal').on('shown.bs.modal', function (e) {
    alert('.');
    //player.pauseVideo();
  });

});

</script>
<!--
-->
<?php //get_sidebar(); ?>
<?php get_footer(); ?>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <div class="modal-body" id="video-placeholder">
        <!--
        <iframe width="560" height="315" src="https://www.youtube.com/embed/DapUtht-qfw" frameborder="0" allowfullscreen></iframe>-->
      </div>
    </div>
  </div>
</div>

<!-- Modal2 -->
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button><br>
      <div class="modal-body">
        Por el momento no tenemos información
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
$(document).on("scroll", function(){
  if($(document).scrollTop() == 0){
    $('.navbar').removeClass('fondoNegro');
  }
  else{
    $('.navbar').addClass('fondoNegro');
  }
});
$( document ).ready(function() {
  //$('#carousel-example-generic').carousel('pause');

  $('a.linksTab').click(function(e){
    $('body,html').stop(true,true).animate({
      scrollTop: $('#contenidosTabs').offset().top - 180
    },1000);
  });
});
jQuery(function($) {

    $('a.thePanel').click(function() {
        var $target = $($(this).attr('href')),
            $other = $target.siblings('.active');
        
        if (!$target.hasClass('active')) {
            $other.each(function(index, self) {
                var $this = $(this);
                $this.removeClass('active').animate({
                    left: $this.width()
                }, 500);
            });

            $target.addClass('active').show().css({
                left: -($target.width())
            }).animate({
                left: 0
            }, 500);
        }
    });
    $('#collapseOneBtn').click(function(){
      if($(this).hasClass('collapsed'))
        $(this).html('Cerrar');
      else
        $(this).html('Ver más');
    });
});
</script>