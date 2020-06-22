<?php
/**
 * The template for displaying search results pages.
 *
 * @package TechEngage
 */

get_header(); 
?>
<div class="clearfix"></div>
<main id="content">
  <div class="container">
    <div class="row">
      <div class="<?php if( !is_active_sidebar('sidebar-1')) { echo "col-lg-12 col-md-12"; } else { echo "col-lg-9 col-md-9"; } ?>">
        <div class="content-container ajax-posts-container">
	        <div class="row posts-container">
		        <?php 
					global $i;
					if ( have_posts() ) : ?>
					<h2 class="search-result">
						<?php printf( esc_html__( "Search Results for: %s", 'techengage' ), '<span>' . get_search_query() . '</span>' );?>	
					</h2>
					<?php while ( have_posts() ) : the_post();  
					 get_template_part('content','');
					 endwhile; else : ?>
					<h2><?php esc_html_e('Not Found','techengage'); ?></h2>
					<div class="">
					<p><?php esc_html_e('Sorry, Do Not match.','techengage' ); ?>
					</p>
					<?php get_search_form(); ?>
					</div><!-- .blog_con_mn -->
					<?php endif; ?>
	         </div>

			<?php if($wp_query->max_num_pages > 1) { //if max page > 1 then show pagination ?>

			<?php if( get_theme_mod('techengage_pagination_style', false) == false ) { // Pagination style  ?>

			<div class="col-lg-12 text-center">
	          	<?php
					//Previous / next page navigation
					the_posts_pagination( array(
					'prev_text'          => '<i class="fa fa-long-arrow-left"></i>',
					'next_text'          => '<i class="fa fa-long-arrow-right"></i>',
					'screen_reader_text' => ' ',
					) );
				?>
     		</div>

     		<?php } else { ?>

     		<?php $current_page =  get_query_var( 'paged' ) ? get_query_var('paged') : 1; 
	          	if( ($current_page == $wp_query->max_num_pages) || ($current_page >= $wp_query->max_num_pages) ) {
	          	}
	          	else { 
	        ?>

	     	<div class="row te_ajax_button">
	            <div class="col-lg-12">
	              <center>
	                <button id="load-more-btn" data-paged="1">
	                  <span class="dashicons dashicons-image-rotate"></span>
	                  <?php esc_html_e('Load more','techengage'); ?>
	                </button>
	              </center>
	            </div>
  			</div>

  			<?php }
  				} // END Pagination style
  			} // END show pagination 
  			?>

     	</div>

      </div>
	  <aside class="col-md-3 col-lg-3">
        <?php get_sidebar(); ?>
      </aside>
    </div>
  </div>
</main>
<?php
get_footer();
?>