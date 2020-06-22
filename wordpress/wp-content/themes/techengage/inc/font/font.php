<?php

/*--------------------------------------------------------------------*/
/*     Register Google Fonts
/*--------------------------------------------------------------------*/
function techengage_fonts_url() {
	
    $fonts_url = '';
		
    $font_families = array();
 
	$font_families = array('Poppins:300,400,500,600,700','Lato:100,100i,300,300i,400,400i,700,700i,900,900i','Montserrat:400,700');
 
        $query_args = array(
            'family' => urlencode( implode( '|', $font_families ) ),
            'subset' => urlencode( 'latin,latin-ext' ),
        );
 
        $fonts_url = add_query_arg( $query_args, '//fonts.googleapis.com/css' );

    return esc_url( $fonts_url );
	
}
function techengage_scripts_styles() {
    wp_enqueue_style( 'techengage-fonts', techengage_fonts_url(), array(), null );
}
add_action( 'wp_enqueue_scripts', 'techengage_scripts_styles' );
?>