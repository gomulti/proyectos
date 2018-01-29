<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Misión K
 * @since Misión K 2.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link href="https://fonts.googleapis.com/css?family=Arvo:400,400i,700,700i" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo esc_url( home_url( '/wp-content/themes/gmg/css/' ) );?>fonts.css" type="text/css"/>
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; ?>
	<script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js?ver=2.0.3'></script>
	<?php wp_head(); ?>
  
  	<link rel="shortcut icon" href="<?php echo esc_url( home_url( '/wp-content/themes/gmg/img/' ) );?>favicon.png" />
</head>

<body <?php body_class(); ?> id="inicio" data-spy="scroll" data-target=".navbar" data-offset="200">

    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
		  <div class="row Header">
		    <div class="col-lg-5 col-md-4 col-sm-4 col-xs-15">
		      <div class="top">
				<a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">
					<div class="logoVisible"></div>
				</a>
		      </div>
		    </div>
		    <div class="col-xs-24 col-lg-19 col-md-15 col-sm-15 text-center menuheader Header-Menu">
		        <div id="navbar" class="navbar-collapse collapse" aria-expanded="false" style="height: 0px;">
		          <?php if ( has_nav_menu( 'primary' ) ) : ?>
		                <?php
		                  wp_nav_menu( array(
		                  	'menu' => 'top_menu',
		                  	'depth' => 5,
		                    'theme_location' => 'primary',
		                    'menu_class'     => 'nav navbar-nav navbar-right',
		                    'container'      => false
		                   ) );
		                ?>
		            <?php endif; ?>
		        </div><!--/.nav-collapse -->
		    </div>
		  </div>
      </div>
    </nav>

    <script type="text/javascript">
	$('#navbar a').click(function(e){
		e.preventDefault();		//evitar el eventos del enlace normal
		var strAncla=$(this).attr('href'); //id del ancla
		var pathname = window.location.pathname;
		var estePathname = pathname.split('/');
		if(estePathname.length == 4){
			$('body,html').stop(true,true).animate({
				scrollTop: $(strAncla).offset().top - 120
			},1000);
		}
		else{
			var miPathname = strAncla.split('/');
			if (miPathname.pop() == '#contacto') {
				$('body,html').stop(true,true).animate({
					scrollTop: $(strAncla).offset().top - 120
				},1000);
			}
			else{
				miPathname = strAncla.split('/');
				window.location.href = 'http://gomserver.net/pruebas/gmg/en/'+miPathname.pop();
			}
		}
	}); 
    </script>