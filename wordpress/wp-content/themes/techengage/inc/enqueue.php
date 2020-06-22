<?php
function techengage_scripts() {

	wp_enqueue_style('bootstrap_style_min', get_template_directory_uri() . '/css/bootstrap.min.css');

	wp_enqueue_style( 'techengage-style', get_stylesheet_uri() );
	
	wp_enqueue_style('font-awesome-min',get_template_directory_uri().'/css/font-awesome.min.css');

	wp_enqueue_style('animate_min',get_template_directory_uri().'/css/animate.min.css');


	/* Js script */
/*
    wp_enqueue_script( 'techengage-navigation', get_template_directory_uri() . '/js/navigation.js', array('jquery'));*/

	wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/js/bootstrap.js', array('jquery'));

    wp_enqueue_script('smartmenus', get_template_directory_uri() . '/js/jquery.smartmenus.min.js' , array('jquery'));

    wp_enqueue_script('smartmenus_bootstrap', get_template_directory_uri() . '/js/jquery.smartmenus.bootstrap.js' , array('jquery'));

    wp_enqueue_script('techengage_custom', get_template_directory_uri() . '/js/custom.js' , array('jquery'));
	
	// Adding Dashicons in WordPress Front-end
  	wp_enqueue_style( 'dashicons' );

  	global $wp_query;
	wp_localize_script( 'techengage_custom', 'techengage_loadmore_params', array(
		'ajaxurl' => esc_url(admin_url('admin-ajax.php')), // WordPress AJAX
		'posts' => json_encode( $wp_query->query_vars ), // everything about your loop is here
		'max_page' => $wp_query->max_num_pages
	) );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action('wp_enqueue_scripts', 'techengage_scripts');

?>