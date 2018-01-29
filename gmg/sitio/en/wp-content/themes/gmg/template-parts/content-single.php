<?php
/**
 * The template part for displaying single posts
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?>
<script type="text/javascript" src="//platform-api.sharethis.com/js/sharethis.js#property=5942e63a19fdf8001169e92d&product=inline-share-buttons"></script>
<section class="imagenCompleta">
</section>
<section class="bac-interior">
  <div class="encabezado">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">


            <?php
$variable = get_the_ID();
        $categoria = get_the_category();
        $cat_padre="";

        $parent = get_cat_name($categoria[0]->category_parent);
        if (!empty($parent)) {
            $cat_padre = $parent;
        } else {
            $cat_padre = $categoria[1]->cat_name;
        }
      ?>
        </div>
      </div>
    </div>
  </div>

  <div class="imageAmplia container"></div>
    <div class="container interiores">

<?php 
$esteCat = single_cat_title("", false);
if ($esteCat != "Eventos" && $categoria[0]->cat_name!="Conócenos") :
?>
        <div class="col-lg-5 col-md-6 barraIzquierda hidden">
          <div class="sidebarPlantilla">

          <a href="<?php echo esc_url( home_url( '/formacion/' ) );?>"><h3>Formación <span>K</span></h3></a>
          <ul class="noticiasLateral interior">
            <?php

        $ban = false;
        $miCat = "";
        //Lista de hijos
        // Obtenemos la informacion de las subcategorias contenidas en la categoria "work"
        $idObj = get_category_by_slug($cat_padre); 
        $categories = get_categories(array('child_of' => $idObj->term_id, 'orderby' => 'id')); 
                   
        // Por ejemplo, imprimimos el nombre de las subcategorias
        foreach ($categories as $category) : 
          if($category->name!="Slider" && $category->name!="Formación K" && $category->name!="Eventos" && $category->name!="Galería" && $category->name!="Sin categoría" && $category->name!="Conócenos")
          {
            if(current_category() == $category->name){
              $miCat = 'hola';
            }
            else{
              $miCat = '';
            }
        ?>
        <li id="menu-item-318" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-318">
          <a href="<?php echo get_category_link( $category->term_id); #?>" class="interior <?php echo $miCat;?>"><?php echo $category->name; ?></a>
        </li>
        <?php
          } 
        endforeach;
        ?>
          </ul>
          </div>
        </div>

<?php 
endif;
?>

<?php 

/////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////

$esteCat = single_cat_title("", false);
if ($categoria[0]->cat_name=="Conócenos") :
?>
        <div class="col-lg-5 col-md-6 barraIzquierda hidden">
          <div class="sidebarPlantilla">
<style type="text/css">
.menu-item:first-child{
  display: none;
}
.bac-interior {
    margin-top: 106px !important;
}
</style>
          <h3>Conócenos</h3>
          <ul class="noticiasLateral interior">
<?php
query_posts('category_name=Conócenos&order=asc');
while ( have_posts() ):?>
<li id="menu-item-318" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-318">
  <a href="<?php the_permalink(); ?>" class="interior"><?php the_title(); ?></a>
</li>
<?php
    the_post();
endwhile;
wp_reset_query();
?>

          </ul>
          </div>
        </div>

<?php 
endif;
?>
        <div class="col-lg-24 col-md-24 contenidoCentral">
          <div class="blog-post">
      			<div id="primary" class="content-area">
      				<main id="main" class="site-main" role="main">
                    <?php
                    /***********Noticias************/
                    //echo $esteCat;
                    //if ($cat_padre != 'Multimedia')
                    //if ($esteCat == "Noticias" || $esteCat == "Audionotas") :
                    ?>


<?php
query_posts( 'p='.$variable );
if ( have_posts() ) :
  while ( have_posts() ) : the_post();
    ?>

                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                  <p class="dondeEsta"><?php echo current_category();?></p>
                  <header class="entry-header">
                    <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
                  </header><!-- .entry-header -->

                  <?php twentysixteen_post_thumbnail(); ?>
                  <?php twentysixteen_excerpt(); ?>
                  
                  <div class="entry-content<?php if(strcmp($cat_padre,"Noticias")==0) { ?> text-justify<?php }?>">
                    <?php
                      the_content();
                    ?>
                    <div class="sharethis-inline-share-buttons"></div>
                    <?php get_the_time(); ?>
                    
                  </div><!-- .entry-content -->
<!-- Go to www.addthis.com/dashboard to customize your tools --> <div class="addthis_inline_share_toolbox"></div>
                </article><!-- #post-## -->
<?php
  endwhile;
endif;
wp_reset_query();
?>






                  <script type="text/javascript">
                    $( document ).ready(function() {
                      $('.barraIzquierda').addClass('hidden');
                      $('.barraDerecha').removeClass('hidden');
                    });
                  </script>
                  <?php
                  //endif;?>
      				</main><!-- .site-main -->
      			</div><!-- .content-area -->
          </div><!-- /.blog-post -->
        </div><!-- /.blog-main -->



        <div class="col-lg-19 barraDerecha">
          <div class="sidebarPlantilla">
            <ul class="noticiasLateral interior">
              <?php
              $categorias = "";
              $categoria = "";
              foreach((get_the_category()) as $category){
              if(empty($categorias)){
                $categorias = $category->cat_name;
                $categoria = $category->cat_name;
              }
              else
                $categorias .=", ". $category->cat_name;
              }
              //echo $esteCat;
              //if ($esteCat != "Noticias")
              ?>
              <div class="row">
              <?php
                query_posts('category_name='.$esteCat.'&order=DESC&posts_per_page=3');
              ?>
              </div>
              <?php
              wp_reset_query();
              ?>

                <div class="row">
                </div><!-- .entry-content -->
                <?php
                query_posts('category_name='.$esteCat.'&order=DESC&posts_per_page=3');

              $m=0;
              if($cat_padre == 'Noticias'):
                  ?>
              <?php
                while (have_posts()) : the_post();
                  global $post;
                  global $more; $more = 0;
                  $thumbID = get_post_thumbnail_id( $post->ID );
                  $imgDestacada = wp_get_attachment_url( $thumbID );
                  $imageContent = get_the_content();
                  $stripped = strip_tags($imageContent, '<p> <a>');
                ?>

                <li id="menu-item-318" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-318">
                  <div class="row">
                    <div class="col-lg-5">
                      <a href="<?php the_permalink();?>">
                        <div class="imageLateralIzquierda" style="background: url(<?php echo $imgDestacada;?>)"></div>
                      </a>
                    </div>
                    <div class="col-lg-7">
                      <a href="<?php the_permalink();?>" class="col-lg-12">
                        <div class="tituloLateralDerecha">
                          <?php the_title();?>
                        </div>
                        <div class="textoLateralDerecha">
                          <?php echo $stripped;?>
                        </div>
                      </a>
                    </div>
                  </div>
                </li>
                <?php
                $m++;
                endwhile;
              endif;
              wp_reset_query();
              ?>
            </ul>
          </div>
          <?php
          // Get the ID of a given category
          $category_id = get_cat_ID( $cat_padre );

          // Get the URL of this category
          $category_link = get_category_link( $category_id ).current_category_link();
          ?>
<?php

if (current_category() == 'Eventos'){
$category_link = esc_url( home_url( '/category/eventos/' ) );
}
  ?>
          <!-- Print a link to this category -->


        </div>
    </div><!-- /.container -->
</section>

<style type="text/css">
.before {
    padding: 0;
	-webkit-box-shadow: 0px 17px 40px 15px rgba(0, 0, 0, 0.29);
    -moz-box-shadow: 0px 17px 40px 15px rgba(0, 0, 0, 0.29);
    box-shadow: 0px 17px 40px 15px rgba(0, 0, 0, 0.29);
}
.before-footer {
    margin: 60px 0;
}
.interiores {
    padding: 0;
}
.bac-interior {
    margin-top: 400px;
    padding-top: 0;
}
.post-thumbnail{
  display: none;
}
.barraIzquierda{
  margin-top: 45px;
}
</style>
<?php 
if(strcmp($categorias,"Ensayos") == 0)
  $categoria = "Ensayos"; 
elseif(strcmp($categorias,"Libros") == 0)
  $categoria = "Libros"; 
elseif(strcmp($categorias,"Artículos Informativos") == 0)
  $categoria = "Artículos Informativos"; 
elseif(strcmp($categorias,"Artículos Periodísticos") == 0)
  $categoria = "Artículos Periodísticos"; 
else
  $categoria = "No";
?>
<div class="hidden" id="categoria" data-categoria="<?php echo $categoria;?>"></div>
<?php //echo esc_url( home_url() );?>
<script type="text/javascript">
$( document ).ready(function() {
  var categoria = $('#categoria').attr('data-categoria');
  if(categoria != 'Ensayos' && categoria != 'Libros' && categoria != 'Artículos Informativos' && categoria != 'Artículos Periodísticos'){
    //$('.post-thumbnail').addClass('hidden');
    $('.imageAmplia').attr('style','background: url('+$('.post-thumbnail>img').attr('src')+') 100% no-repeat; background-size: 120% auto; background-position: 50%;');
  }
  else{
    $('.imageAmplia').addClass('hidden');
    $('.post-thumbnail').attr('style' , 'width: 40%; min-height: 135px; overflow: hidden; float: left; margin-right: 20px;').find('img').attr('style' , 'width: 100%; height: auto;');
  }
  $('.entry-content').find('a').addClass('btn btn-default ver-mas noticias')
  var pathname = 'http://joseantoniodelavega.com'+window.location.pathname;
  $('.btn-warning.interior[href="'+pathname+'"]').addClass('activo');
  //alert('http://gomserver.net'+pathname);
  link = $('.post-thumbnail').find('img').attr('src');
  $('.imagenCompleta').attr('style','background: url('+link+') no-repeat; height: 400px; position: fixed; width: 100%; z-index: -1; top: 0;');
});
</script>

          <?php
if ($category->name != 'Eventos'):?>
<script type="text/javascript">
$( document ).ready(function() {
  $('.barraIzquierda').removeClass('hidden');
  $('.contenidoCentral').removeClass('col-lg-24 col-md-24').addClass('col-lg-19 col-md-18');
  $('.barraDerecha').addClass('col-lg-19 col-md-18').addClass('col-lg-offset-5 col-md-offset-6').removeClass('col-lg-24 col-md-24');
});
</script>
<?php
endif;

if ($category->name == 'Eventos'):?>
<script type="text/javascript">
$( document ).ready(function() {
  $('.barraDerecha').removeClass('col-lg-19').removeClass('col-md-offset-5').addClass('col-lg-24');
});
</script>
<?php
endif;
          ?>

          <?php
if ($parent != 'Eventos'):?>
<script type="text/javascript">
$( document ).ready(function() {
  $('.barraIzquierda').removeClass('hidden');
  $('.contenidoCentral').removeClass('col-lg-24 col-md-24').addClass('col-lg-19 col-md-18');
  $('.barraDerecha').addClass('col-lg-19 col-md-18').addClass('col-lg-offset-5 col-md-offset-6').removeClass('col-lg-24 col-md-24');
});
</script>
<?php
endif;

if ($parent == 'Eventos'):?>
<script type="text/javascript">
$( document ).ready(function() {
  $('.barraDerecha').removeClass('col-lg-19').removeClass('col-md-offset-5').addClass('col-lg-24');
});
</script>
<?php
endif;
          ?>
<?php

if (current_category() == 'Eventos'):?>
<script type="text/javascript">
$( document ).ready(function() {
  $('.barraIzquierda').addClass('hidden');
  $('.contenidoCentral').addClass('col-lg-24 col-md-24').removeClass('col-lg-19 col-md-18');
  $('.barraDerecha').removeClass('col-lg-19 col-md-18').removeClass('col-lg-offset-5 col-md-offset-6').addClass('col-lg-24 col-md-24');
});
</script>
<?php
endif;
          ?>