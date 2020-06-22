<?php function techengage_footer_settings_css() { 

	$techengage_footer_bk_color = get_theme_mod('techengage_footer_bk_color', '#4a4a4a');
	$techengage_footer_links_color = get_theme_mod('techengage_footer_links_color', '#fff');
	$techengage_footer_links_hover_color = get_theme_mod('techengage_footer_links_hover_color', '#fff');

?>

	<style type="text/css">

	/* Start Footer Colors */				

	footer{
		background:<?php echo esc_attr( $techengage_footer_bk_color);?>;
	}

	footer a{
		color:<?php echo esc_attr( $techengage_footer_links_color);?>;
	}

	footer .techengage-widget ul li a:hover{
		color:<?php echo esc_attr( $techengage_footer_links_hover_color);?>;
	}

	/* END Social Colors */

	</style>

<?php }

add_action('wp_head', 'techengage_footer_settings_css');