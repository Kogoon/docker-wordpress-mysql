<?php 
/**
 * The template for displaying the content.
 * @package TechEngage
 */
?>
<div class="col-lg-12">
	<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="techengage-blog-post-box">
			<article class="small">
				<h1>
					<a title="<?php the_title_attribute(); ?>" href="<?php the_permalink(); ?>">
						<?php the_title(); ?>
					</a>
				</h1>
				<div class="techengage-blog-category post-meta-data"> 
					<i class="fa fa-user meta-fa-icon-user"></i>
					<a class="meta-user-des" href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ) ));?>">
						<?php the_author(); ?>
					</a> 
					<?php $cat_list = get_the_category_list();
						if(!empty($cat_list)) {
					?>
					<i class="fa fa-folder meta-fa-icons"></i>
					<a href="#">
					  <?php if(!empty($cat_list)) { ?>
					  <?php the_category(', '); ?>
					</a>
					<?php }} ?>
					<i class="fa fa-calendar meta-fa-icons"></i>
					<span class="meta-data-date"><?php echo get_the_date( 'F j, Y' ); ?></span>
				</div>
				<div class="row">
					<?php if(has_post_thumbnail()): ?>
						<div class="col-lg-4 col-md-4 col-xs-12">
							<?php if(has_post_thumbnail()): ?>
								<a href="<?php the_permalink(); ?>" class="dfmblog-thumb">
									<?php if(has_post_thumbnail()): ?>
									<?php $defalt_arg =array('class' => "img-responsive tile-img-height"); ?>
									<?php the_post_thumbnail('', $defalt_arg); ?>
									<?php endif; ?>
								</a>
							<?php endif; ?>
						</div>
						<div class="col-lg-8 col-md-8 col-xs-12">
					<?php else: ?>
						<div class="col-lg-12 col-md-12 col-xs-12">
					<?php endif; ?>
					
						<p>
							<?php
								echo wp_kses_post(get_the_excerpt());
							?>
						</p>
						<?php wp_link_pages( array( 'before' => '<div class="link">' . __( 'Pages:', 'techengage' ), 'after' => '</div>' ) ); ?>
					</div>
				</div>
			</article>
		</div>
	</div>
</div>