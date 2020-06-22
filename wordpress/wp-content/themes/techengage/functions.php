<?php
/**
 * techengage functions and definitions.
 *
 *
 * @package TechEngage
 */


	$techengage_theme_path = get_template_directory() . '/inc/';

	require( $techengage_theme_path . '/custom-navwalker.php' );
	require( $techengage_theme_path . '/font/font.php');

	/*-----------------------------------------------------------------------------------*/
	/*	Enqueue scripts and styles.
	/*-----------------------------------------------------------------------------------*/
	require( $techengage_theme_path .'/enqueue.php');
	/* ----------------------------------------------------------------------------------- */
	/* Customizer */
	/* ----------------------------------------------------------------------------------- */

	require( $techengage_theme_path . '/customize/customize_copyright_and_icons.php');
	require( $techengage_theme_path . '/customize/footer_settings.php');
	require( $techengage_theme_path . '/customize/header_settings.php');
	require( $techengage_theme_path . '/customize/customize_control/class-customize-alpha-color-control.php');
	require( $techengage_theme_path . '/customize/colors_copyright_and_icons.php');
	require( $techengage_theme_path . '/customize/colors_footer_settings.php');
	require( $techengage_theme_path . '/customize/colors_header_settings.php');
	require( $techengage_theme_path . '/customize/pagination_settings.php');

if ( ! function_exists( 'techengage_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function techengage_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on techengage, use a find and replace
	 * to change 'techengage' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'techengage', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __('Primary menu','techengage' )
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );
	
	//Custom Logo
	add_theme_support( 'custom-logo');

	function techengage_the_custom_logo() {
		the_custom_logo();
	}

	add_filter('get_custom_logo','techengage_logo_class');


	function techengage_logo_class($html)
	{
	$html = str_replace('custom-logo-link', 'navbar-brand', $html);
	return $html;
	}

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'techengage_custom_background_args', array(
		'default-color' => 'eeeeee',
		'default-image' => '',
	) ) );

}
endif;
add_action( 'after_setup_theme', 'techengage_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function techengage_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'techengage_content_width', 640 );
}
add_action( 'after_setup_theme', 'techengage_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function techengage_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'techengage' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="techengage-widget %2$s bounceInRight animated">',
		'after_widget'  => '</div>',
		'before_title'  => '<h6>',
		'after_title'   => '</h6>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget Area', 'techengage' ),
		'id'            => 'footer_widget_area',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="col-md-6 col-sm-6 rotateInDownLeft animated techengage-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h6>',
		'after_title'   => '</h6>',
	) );
}
add_action( 'widgets_init', 'techengage_widgets_init' );


function techengage_enqueue_customizer_controls_styles() {
  wp_register_style( 'techengage-customizer-controls', get_template_directory_uri() . '/css/customizer-controls.css', NULL, NULL, 'all' );
  wp_enqueue_style( 'techengage-customizer-controls' );
  }
add_action( 'customize_controls_print_styles', 'techengage_enqueue_customizer_controls_styles' );


/* Custom template tags for this theme. */
require get_template_directory() . '/inc/template-tags.php';

//Read more Button on slider & Post
function techengage_read_more() {
	
	global $post;
	
	$readbtnurl = '<br><a class="btn btn-tislider-two" href="' . esc_url(get_permalink()) . '">'.esc_html__('Read More','techengage').'</a>';
	
    return $readbtnurl;
}
add_filter( 'the_content_more_link', 'techengage_read_more' );

// Changing excerpt more
   	function techengage_excerpt_more($more) {
   	if ( is_admin() ){
		return $more;
	}
   	global $post;
   	return ' <br><a class="read-more-button" href="'. esc_url(get_permalink($post->ID)) . '">' . esc_html__('Read More &raquo;','techengage') . '</a>';
   	}
   	add_filter('excerpt_more', 'techengage_excerpt_more');

// Ajax Function

add_action('wp_ajax_techengage_load_more_fun', 'techengage_load_more_fun');
add_action('wp_ajax_nopriv_techengage_load_more_fun', 'techengage_load_more_fun');

function techengage_load_more_fun() {

	if( !empty($_POST['post_query_vars'])) {
		$args = json_decode( stripslashes( sanitize_text_field(wp_unslash($_POST['post_query_vars'])) ), true );
	}

	if( !empty($_POST['page'])) {
		$paged = sanitize_text_field( wp_unslash($_POST['page']));
		$next_page = $paged + 1 ;
	}
	else {
		die();
	}

	$args['paged'] = $next_page;
	$args['post_status'] = 'publish';

	query_posts( $args );

	// The Loop
	if ( have_posts() ) {

		while ( have_posts() ) {
				the_post();
				get_template_part('content','');
		}

	}

	wp_reset_query();
	
	die();

}