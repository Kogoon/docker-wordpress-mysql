<?php function techengage_header_settings_css() { 

	$techengage_title_color = get_theme_mod('techengage_title_color', '#ddd');
	$techengage_title_hover_color = get_theme_mod('techengage_title_hover_color', '#349bdc');

	$techengage_header_background = get_theme_mod('techengage_header_background', '#343e47');
	$techengage_submenu_background = get_theme_mod('techengage_submenu_background', '#fff');
	$techengage_menu_text_color = get_theme_mod('techengage_menu_text_color', '#fff');
	$techengage_menu_text_hover_color = get_theme_mod('techengage_menu_text_hover_color', '#34aaec');
	$techengage_active_tab_color = get_theme_mod('techengage_active_tab_color', '#e7e7e7');

?>

	<style type="text/css">

	/* Start Title Colors */				
		.navbar-brand .site-title, .navbar-brand .site-description, .navbar-brand span.site-description{
			color:<?php echo esc_attr( $techengage_title_color ); ?>;
		}

		.navbar-brand:hover .site-title, .navbar-brand:hover .site-description{
			color:<?php echo esc_attr( $techengage_title_hover_color ); ?>;
		}
	/* END Title Colors */

	/* Start Menu Colors */

		/* Main Menu Background Color */
		.techengage-main-nav{
			background: <?php echo esc_attr( $techengage_header_background ); ?>;
		}

		/* Sub-Menu Background Color */
		.navbar-wp .dropdown-menu{
			background: <?php echo esc_attr( $techengage_submenu_background ); ?>;
		}

		/* Menu Text Color */
		.navbar-wp .navbar-nav > li > a{
			color: <?php echo esc_attr( $techengage_menu_text_color ); ?>;
		}

		/* Menu Text Hover Color */
		.navbar-wp .navbar-nav > li > a:hover, .navbar-wp .navbar-nav > li > a:focus{
			color: <?php echo esc_attr( $techengage_menu_text_hover_color ); ?>;
		}

		/* Active Tab Color */
		.navbar-default .navbar-nav > .active > a{
			background: <?php echo esc_attr( $techengage_active_tab_color ); ?>;
		}

	/* END Menu Colors */


	</style>

<?php }

add_action('wp_head', 'techengage_header_settings_css');