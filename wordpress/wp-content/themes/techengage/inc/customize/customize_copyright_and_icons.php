<?php
// Footer copyright Social section 
function techengage_footer_copyright( $wp_customize ) {
	$wp_customize->add_panel('techengage_copyright', array(
		'priority' => 50,
		'capability' => 'edit_theme_options',
		'title' => __('Footer Settings', 'techengage'),
	) );
	
    //Footer Copyright link Section
    $wp_customize->add_section('copyright_link_color', array(
        'title' => __('Footer Copyright Section','techengage'),
        'priority' => 46,
        'panel' => 'techengage_copyright',
    ) );


    //Change Copyright Text color
    $wp_customize->add_setting('techengage_copyright_text_color', array(
    'default' => '#FFF',
    'sanitize_callback' => 'sanitize_hex_color',
    ) );
    
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'techengage_copyright_text_color', array(
        'label'      => __('Copyright Text Color', 'techengage' ),
        'section'    => 'copyright_link_color',
        'settings'   => 'techengage_copyright_text_color',) 
    ) );

    //Change Copyright Link color
    $wp_customize->add_setting('techengage_copyright_link_color', array(
    'default' => '#FFF',
    'sanitize_callback' => 'sanitize_hex_color',
    ) );
    
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'techengage_copyright_link_color', array(
        'label'      => __('Copyright Link Color', 'techengage' ),
        'section'    => 'copyright_link_color',
        'settings'   => 'techengage_copyright_link_color',) 
    ) );

    //Change Copyright Link Hovor color
    $wp_customize->add_setting('techengage_copyright_link_hover_color', array(
    'default' => '#ddd',
    'sanitize_callback' => 'sanitize_hex_color',
    ) );   

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'techengage_copyright_link_hover_color', array(
        'label'      => __('Copyright Link Hover Color', 'techengage' ),
        'section'    => 'copyright_link_color',
        'settings'   => 'techengage_copyright_link_hover_color',) 
    ) );

	//Footer social Icons Section
	$wp_customize->add_section('copyright_social_icon', array(
        'title' => __('Manage Footer Social Link','techengage'),
        'priority' => 45,
		'panel' => 'techengage_copyright',
    ) );


	// Facebook link
	$wp_customize->add_setting('social_link_facebook', array(
        'sanitize_callback' => 'esc_url_raw',
		'default' => '#',
    ) );
	$wp_customize->add_control('social_link_facebook', array(
        'label' => __('Facebook URL','techengage'),
        'section' => 'copyright_social_icon',
        'type' => 'text',
    ) );

	$wp_customize->add_setting(
        'Social_link_facebook_tab',array(
        'sanitize_callback' => 'techengage_copyright_sanitize_checkbox',
	));
	$wp_customize->add_control('Social_link_facebook_tab', array(
        'type' => 'checkbox',
        'label' => __('Open Link New tab/window','techengage'),
        'section' => 'copyright_social_icon',
    ) );

    //Change icon backgorund color
    $wp_customize->add_setting('techengage_fb_icon_bk_color', array(
    'default' => '#6A9FDF',
    'sanitize_callback' => 'sanitize_hex_color',
    ) );
    
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'techengage_fb_icon_bk_color', array(
        'label'      => __('FB icon background Color', 'techengage' ),
        'section'    => 'copyright_social_icon',
        'settings'   => 'techengage_fb_icon_bk_color',) 
    ) );

    //Change icon color
    $wp_customize->add_setting('techengage_fb_icon_color', array(
    'default' => '#FFF',
    'sanitize_callback' => 'sanitize_hex_color',
    ) );
    
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'techengage_fb_icon_color', array(
        'label'      => __('FB icon color', 'techengage' ),
        'section'    => 'copyright_social_icon',
        'settings'   => 'techengage_fb_icon_color',) 
    ) );

    //Change icon hover color
    $wp_customize->add_setting('techengage_fb_icon_hover_color', array(
    'default' => '#3f51b5',
    'sanitize_callback' => 'sanitize_hex_color',
    ) );
    
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'techengage_fb_icon_hover_color', array(
        'label'      => __('FB icon hover color', 'techengage' ),
        'section'    => 'copyright_social_icon',
        'settings'   => 'techengage_fb_icon_hover_color',) 
    ) );

	//Twitter link
	$wp_customize->add_setting( 'social_link_twitter', array(
       'sanitize_callback' => 'esc_url_raw',
	   'default' => '#',
    ) );
	$wp_customize->add_control( 'social_link_twitter', array(
        'label' => __('Twitter URL','techengage'),
        'section' => 'copyright_social_icon',
        'type' => 'text',
    ) );

	$wp_customize->add_setting( 'Social_link_twitter_tab',array(
	   'sanitize_callback' => 'techengage_copyright_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'Social_link_twitter_tab', array(
        'type' => 'checkbox',
        'label' => __('Open Link New tab/window','techengage'),
        'section' => 'copyright_social_icon',
    ) );

   //Change icon backgorund color
    $wp_customize->add_setting('techengage_tw_icon_bk_color', array(
    'default' => '#6A9FDF',
    'sanitize_callback' => 'sanitize_hex_color',
    ) );
    
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'techengage_tw_icon_bk_color', array(
        'label'      => __('Twitter icon background Color', 'techengage' ),
        'section'    => 'copyright_social_icon',
        'settings'   => 'techengage_tw_icon_bk_color',) 
    ) );

    //Change icon color
    $wp_customize->add_setting('techengage_tw_icon_color', array(
    'default' => '#FFF',
    'sanitize_callback' => 'sanitize_hex_color',
    ) );
    
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'techengage_tw_icon_color', array(
        'label'      => __('Twitter icon color', 'techengage' ),
        'section'    => 'copyright_social_icon',
        'settings'   => 'techengage_tw_icon_color',) 
    ) );

    //Change icon hover color
    $wp_customize->add_setting('techengage_tw_icon_hover_color', array(
    'default' => '#3f51b5',
    'sanitize_callback' => 'sanitize_hex_color',
    ) );
    
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'techengage_tw_icon_hover_color', array(
        'label'      => __('Twitter icon hover color', 'techengage' ),
        'section'    => 'copyright_social_icon',
        'settings'   => 'techengage_tw_icon_hover_color',) 
    ) );


	//Linkdin link
	$wp_customize->add_setting( 'social_link_linkedin', array(
       'sanitize_callback' => 'esc_url_raw',
	   'default' => '#',
    ) );
	$wp_customize->add_control( 'social_link_linkedin', array(
        'label' => __('Linkedin URL','techengage'),
        'section' => 'copyright_social_icon',
        'type' => 'text',
    ) );

	$wp_customize->add_setting( 
        'Social_link_linkedin_tab',array(
        'sanitize_callback' => 'techengage_copyright_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'Social_link_linkedin_tab', array(
        'type' => 'checkbox',
        'label' => __('Open Link New tab/window','techengage'),
        'section' => 'copyright_social_icon',
    ) );

    //Change icon backgorund color
    $wp_customize->add_setting('techengage_link_icon_bk_color', array(
    'default' => '#6A9FDF',
    'sanitize_callback' => 'sanitize_hex_color',
    ) );
    
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'techengage_link_icon_bk_color', array(
        'label'      => __('Linkedin icon background Color', 'techengage' ),
        'section'    => 'copyright_social_icon',
        'settings'   => 'techengage_link_icon_bk_color',) 
    ) );

    //Change icon color
    $wp_customize->add_setting('techengage_link_icon_color', array(
    'default' => '#FFF',
    'sanitize_callback' => 'sanitize_hex_color',
    ) );
    
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'techengage_link_icon_color', array(
        'label'      => __('Linkedin icon color', 'techengage' ),
        'section'    => 'copyright_social_icon',
        'settings'   => 'techengage_link_icon_color',) 
    ) );

    //Change icon hover color
    $wp_customize->add_setting('techengage_link_icon_hover_color', array(
    'default' => '#3f51b5',
    'sanitize_callback' => 'sanitize_hex_color',
    ) );
    
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'techengage_link_icon_hover_color', array(
        'label'      => __('Linkedin icon hover color', 'techengage' ),
        'section'    => 'copyright_social_icon',
        'settings'   => 'techengage_link_icon_hover_color',) 
    ) );


	//Google-plus link
	$wp_customize->add_setting('social_link_google', array(
        'sanitize_callback' => 'esc_url_raw',
		'default' => '#',
    ) );
	$wp_customize->add_control('social_link_google', array(
        'label' => __('Google-plus URL','techengage'),
        'section' => 'copyright_social_icon',
        'type' => 'text',
    ) );

	$wp_customize->add_setting(
        'Social_link_google_tab',array(
        'sanitize_callback' => 'techengage_copyright_sanitize_checkbox',
	) );

	$wp_customize->add_control('Social_link_google_tab', array(
        'type' => 'checkbox',
        'label' => __('Open Link New tab/window','techengage'),
        'section' => 'copyright_social_icon',
    ) );

    //Change icon backgorund color
    $wp_customize->add_setting('techengage_google_icon_bk_color', array(
    'default' => '#6A9FDF',
    'sanitize_callback' => 'sanitize_hex_color',
    ) );
    
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'techengage_google_icon_bk_color', array(
        'label'      => __('Google-plus icon background Color', 'techengage' ),
        'section'    => 'copyright_social_icon',
        'settings'   => 'techengage_google_icon_bk_color',) 
    ) );

    //Change icon color
    $wp_customize->add_setting('techengage_google_icon_color', array(
    'default' => '#FFF',
    'sanitize_callback' => 'sanitize_hex_color',
    ) );
    
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'techengage_google_icon_color', array(
        'label'      => __('Google-plus icon color', 'techengage' ),
        'section'    => 'copyright_social_icon',
        'settings'   => 'techengage_google_icon_color',) 
    ) );

    //Change icon hover color
    $wp_customize->add_setting('techengage_google_icon_hover_color', array(
    'default' => '#3f51b5',
    'sanitize_callback' => 'sanitize_hex_color',
    ) );
    
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'techengage_google_icon_hover_color', array(
        'label'      => __('Google-plus icon hover color', 'techengage' ),
        'section'    => 'copyright_social_icon',
        'settings'   => 'techengage_google_icon_hover_color',) 
    ) );
        
	function techengage_footer_copyright_sanitize_text( $input ) {

    return wp_kses_post( force_balance_tags( $input ) );

	}
	
	function techengage_copyright_sanitize_checkbox( $checked ) {
	// Boolean check.
	return ( ( isset( $checked ) && true == $checked ) ? true : false );
	}
	
}
add_action( 'customize_register', 'techengage_footer_copyright' );
?>