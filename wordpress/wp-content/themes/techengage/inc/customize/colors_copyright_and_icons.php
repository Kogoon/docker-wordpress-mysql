<?php function techengage_copyright_and_icons_css() { 

	$techengage_copyright_text_color = get_theme_mod('techengage_copyright_text_color', '#fff');
	$techengage_copyright_link_color = get_theme_mod('techengage_copyright_link_color', '#fff');
	$techengage_copyright_link_hover_color = get_theme_mod('techengage_copyright_link_hover_color', '#ddd');

	$techengage_fb_icon_bk_color = get_theme_mod('techengage_fb_icon_bk_color', 'rgba(55, 165, 235, 0.3)');
	$techengage_fb_icon_color = get_theme_mod('techengage_fb_icon_color', '#fff');
	$techengage_fb_icon_hover_color = get_theme_mod('techengage_fb_icon_hover_color', '#3f51b5');

	$techengage_tw_icon_bk_color = get_theme_mod('techengage_tw_icon_bk_color', 'rgba(55, 165, 235, 0.3)');
	$techengage_tw_icon_color = get_theme_mod('techengage_tw_icon_color', '#fff');
	$techengage_tw_icon_hover_color = get_theme_mod('techengage_tw_icon_hover_color', '#3f51b5');

	$techengage_link_icon_bk_color = get_theme_mod('techengage_link_icon_bk_color', 'rgba(55, 165, 235, 0.3)');
	$techengage_link_icon_color = get_theme_mod('techengage_link_icon_color', '#fff');
	$techengage_link_icon_hover_color = get_theme_mod('techengage_link_icon_hover_color', '#3f51b5');

	$techengage_google_icon_bk_color = get_theme_mod('techengage_google_icon_bk_color', 'rgba(55, 165, 235, 0.3)');
	$techengage_google_icon_color = get_theme_mod('techengage_goolge_icon_color', '#fff');
	$techengage_google_icon_hover_color = get_theme_mod('techengage_google_icon_hover_color', '#3f51b5');

?>

	<style type="text/css">

	/* Start Copyright Section Colors */

		/*Copyright Text Color*/
		footer .techengage-footer-copyright .copy-right-line p{
			color:<?php echo esc_attr( $techengage_copyright_text_color);?>;
		}
		
		/*Copyright Link Color*/
		footer .techengage-footer-copyright .copy-right-line a{
			color:<?php echo esc_attr( $techengage_copyright_link_color);?>;
		}

		/*Copyright Link Hover Color*/
		footer .techengage-footer-copyright .copy-right-line a:hover{
			color:<?php echo esc_attr( $techengage_copyright_link_hover_color);?>;
		}

	/* END Copyright Section Colors */

	/* Start Social Icons Colors */

		/* FB Icon Colors*/
		.techengage-social li span.fb a{
			background:<?php echo esc_attr( $techengage_fb_icon_bk_color);?>;
		}

		.techengage-social li span.fb a i{
			color:<?php echo esc_attr( $techengage_fb_icon_color);?>;
		}

		.techengage-social li span.fb a:hover{
			background:<?php echo esc_attr( $techengage_fb_icon_hover_color);?>;
		}
		/* END FB Icon Colors*/

		/* Twitter Icon Colors*/
		.techengage-social li span.twitter a{
			background:<?php echo esc_attr( $techengage_tw_icon_bk_color);?>;
		}

		.techengage-social li span.twitter a i{
			color:<?php echo esc_attr( $techengage_tw_icon_color);?>;
		}

		.techengage-social li span.twitter a:hover{
			background:<?php echo esc_attr( $techengage_tw_icon_hover_color);?>;
		}
		/* END Twitter Icon Colors*/

		/* Linkedin Icon Colors*/
		.techengage-social li span.linkedin a{
			background:<?php echo esc_attr( $techengage_link_icon_bk_color);?>;
		}

		.techengage-social li span.linkedin a i{
			color:<?php echo esc_attr( $techengage_link_icon_color);?>;
		}

		.techengage-social li span.linkedin a:hover{
			background:<?php echo esc_attr( $techengage_link_icon_hover_color);?>;
		}
		/* END Linkedin Icon Colors*/

		/* Goolge-Plus Icon Colors*/
		.techengage-social li span.google a{
			background:<?php echo esc_attr( $techengage_google_icon_bk_color);?>;
		}

		.techengage-social li span.google a i{
			color:<?php echo esc_attr( $techengage_google_icon_color);?>;
		}

		.techengage-social li span.google a:hover{
			background:<?php echo esc_attr( $techengage_google_icon_hover_color);?>;
		}
		/* END Goolge-Plus Icon Colors*/				

	/* END Social Icons Colors */

	</style>

<?php }

add_action('wp_head', 'techengage_copyright_and_icons_css');