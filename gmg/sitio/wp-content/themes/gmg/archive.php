<?php
/**
 * The template for displaying archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each one. For example, tag.php (Tag archives),
 * category.php (Category archives), author.php (Author archives), etc.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); ?>

<section class="bac-interior">
  <div class="encabezado">
    <div class="container">
        <div class="col-lg-12">

			<?php
				$categoria = get_the_category();
				$cat_padre="";

				$parent = get_cat_name($categoria[0]->category_parent);
				if (!empty($parent)) {
				    $cat_padre = $parent;
				} else {
				    $cat_padre = $categoria[0]->cat_name;
				}
			?>
        </div>
    </div>
  </div>
	<div class="container interiores">

<?php 
$esteCat = single_cat_title("", false);
if ($esteCat != "Eventos") :
?>
	    <div class="col-lg-5 col-md-6">
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
						if($esteCat == $category->name){
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
		$esteCat = single_cat_title("", false);
		if ($esteCat == "Eventos") :
		?>
		<script type="text/javascript">
		$(document).ready(function()
		{
			$('.contenidoLista').removeClass('col-lg-18').addClass('col-lg-24')
		});
		</script>
		<?php 
		endif;
		?>


	    <div class="col-lg-18 col-md-18 contenidoLista">
	      <div class="blog-post">
	        <div id="primary" class="content-area">
	          <main id="main" class="site-main" role="main">

	        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	          <header class="entry-header">
	          	<?php $urlRedirect = esc_url( home_url('category/trabajo-legislativo/iniciativas/') );?>
	            <h1 class="entry-title"><?php echo $esteCat;?></h1>
	          </header><!-- .entry-header -->
	          
	          <div class="entry-content">
	              <div class="row">
	                <?php 
	                $var = get_the_category();
	                query_posts('category_name='.$var[0]->slug );
	                if (have_posts()) : 
	                	query_posts('category_name='.$var[0]->slug );
		                $i=1;
		                ?>
		                <?php
		                while (have_posts()) : 
			                the_post();
			                // Ruta de la imagen destacada (tamaño completo)
			                global $post;
			                global $more; $more = 0;
			                $thumbID = get_post_thumbnail_id( $post->ID );
			                $imgDestacada = wp_get_attachment_url( $thumbID );
			                ?>
			                <?php
			                $imageContent = get_the_content();
			                $stripped = strip_tags($imageContent, '<p> <a>'); //replace <p> and <a> with whatever tags you want to keep after the strip
			                
			                ?>
			                <div class="col-lg-8 col-md-8">
			                  <div class="thumbnail">
			                    <a href="<?php the_permalink();?>">
			                      <div class="imageDestacada" style="background: url(<?php echo $imgDestacada;?>); background-size: 100%;"></div>
				                    <div class="caption">
					                    <h3><?php the_title();?></h3>
					                    <p class="texto"><?php echo $stripped; ?></p>
				                    </div>
			                    </a>
			                  </div>
			                </div>
			                <?php
			                
		                   if ($i % 3 == 0) {echo '</div><div class="row">';}
		                $i++;
		                endwhile;
	                else :
	                  echo 'Por el momento no tenemos :'. print_r(get_the_category()) ;
	                endif;?>


	          </div><!-- .entry-content -->

	        </article><!-- #post-## -->

	          </main><!-- .site-main -->
	        </div><!-- .content-area -->
	      </div><!-- /.blog-post -->
	    </div><!-- /.blog-main -->
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
    margin-top: 0;
}
</style>

<script type="text/javascript">
$( document ).ready(function() {
  var pathname = 'http://joseantoniodelavega.com'+window.location.pathname;
  $('.btn-warning.interior[href="'+pathname+'"]').addClass('activo');
});
</script>


<?php get_sidebar(); ?>
<?php get_footer(); ?>
