<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @package TechEngage
 */ ?>
<!--==================== techengage-FOOTER AREA ====================-->
<footer> 
  <div class="overlay"> 
  <!--Start techengage-footer-widget-area-->
  <?php if ( is_active_sidebar( 'footer_widget_area' ) ) { ?>
  <div class="techengage-footer-widget-area">
    <div class="container">
      <div class="row">
        <?php  dynamic_sidebar( 'footer_widget_area' ); ?>
      </div>
    </div>
  </div>
  <?php } ?>
  <!--End techengage-footer-widget-area-->
  <div class="techengage-footer-copyright">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 col-sm-6 copy-right-line">
  		    <p>&copy; <?php echo esc_html(date_i18n( 'Y' )).' ';bloginfo('name'); ?> | <?php printf( esc_html__( 'Designed by %1$s' , 'techengage'), '<a href="'.esc_url('https://en.wikipedia.org/wiki/Techengage').'" >TechEngage</a>.') ?> | <?php printf( esc_html__( 'Powered by %1$s', 'techengage' ),  '<a href="'.esc_url('http://wordpress.org/').'" rel="designer">WordPress</a>.' ); ?>   
      		</p>
		    </div>
        <div class="col-lg-6 col-sm-6 text-right">
			    <ul class="techengage-social">
                       <?php if(get_theme_mod('social_link_facebook','#')) { ?>
            <li><span class="icon-soci fb"> <a href="<?php echo esc_url(get_theme_mod('social_link_facebook')); ?>" <?php if(get_theme_mod('Social_link_facebook_tab')==1){ echo "target='_blank'"; } ?> ><i class="fa fa-facebook"></i></a></span></li>
            <?php } if(get_theme_mod('social_link_twitter','#')) { ?>
            <li><span class="icon-soci twitter"><a href="<?php echo esc_url(get_theme_mod('social_link_twitter')); ?>" <?php if(get_theme_mod('Social_link_twitter_tab')==1){ echo "target='_blank'"; } ?> ><i class="fa fa-twitter"></i></a></span></li>
            <?php } if(get_theme_mod('social_link_linkedin','#')) { ?>
            <li><span class="icon-soci linkedin"><a href="<?php echo esc_url(get_theme_mod('social_link_linkedin')); ?>" <?php if(get_theme_mod('Social_link_linkedin_tab')==1){ echo "target='_blank'"; } ?> ><i class="fa fa-linkedin"></i></a></span></li>
            <?php } if(get_theme_mod('social_link_google','#')) { ?>
            <li><span class="icon-soci google"><a href="<?php echo esc_url(get_theme_mod('social_link_google')); ?>" <?php if(get_theme_mod('Social_link_google_tab')==1){ echo "target='_blank'"; } ?> ><i class="fa fa-google-plus"></i></a></span></li>
            <?php } ?>
          </ul>
        </div>
      </div>
    </div>
  </div>
  </div>
</footer>
</div>
<!--Scroll To Top--> 
<a href="#" class="ti_scroll bounceInRight  animated"><i class="fa fa-angle-double-up"></i></a> 
<!--/Scroll To Top-->
<?php wp_footer(); ?>
</body>
</html>