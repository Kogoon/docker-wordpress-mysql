<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @package TechEngage
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div class="wrapper">
  <header>
    <div class="clearfix"></div>
    <div class="techengage-main-nav">
        <div class="container">
          <div class="row">
              <div class="col-xs-12 col-sm-3">
                <div class="navbar-header">
                <!-- Logo -->
                <?php
                if(has_custom_logo())
                {
                // Display the Custom Logo
                the_custom_logo();
                }
                 else { ?>
                <a class="navbar-brand" href="<?php echo esc_url(home_url( '/' )); ?>"><span class="site-title"><?php bloginfo('name'); ?></span>
    			      <br>
                <span class="site-description"><?php echo  esc_html(get_bloginfo( 'description', 'display' )); ?></span>   
                </a>      
                <?php } ?>
                <!-- Logo -->
                </div>
              </div>
              <div class="col-xs-12 col-sm-9 main-menu<?php if( get_bloginfo( 'description') != "" ){echo ' adjust-margin'; } ?>" >
                <nav class="navbar navbar-default navbar-static-top navbar-wp">
                  <!-- navbar-toggle -->
                  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-wp"> <span class="sr-only"><?php __('Toggle Navigation','techengage'); ?></span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                  <!-- /navbar-toggle --> 
                  <!-- Navigation -->
                  
                  <div class="collapse navbar-collapse" id="navbar-wp">
                    <?php wp_nav_menu( array( 'theme_location' => 'primary', 'container' => false, 'menu_class' => 'nav navbar-nav', 'fallback_cb' => 'techengage_custom_navwalker::fallback' , 'walker' => new techengage_custom_navwalker() ) ); ?>

                  </div>
                  <!-- /Navigation -->
                </nav>
              </div>
          </div>
        </div>
    </div>
  </header>
  <!-- #masthead --> 