<?php

function techengage_header_settings($wp_customize){

	/* Header Panel */
	$wp_customize->add_panel('techengage_header_panel', array(
		'priority' => 20,
		'capability' => 'edit_theme_options',
		'title' => __('Header Settings', 'techengage'),
	) );


	//Title Section
    $wp_customize->add_section('title_setting', array(
        'title' => __('Change Title Color','techengage'),
        'priority' => 44,
        'panel' => 'techengage_header_panel',
    ) );

    //Change Title Color
    $wp_customize->add_setting('techengage_title_color', array(
    'default' => '#ddd',
    'sanitize_callback' => 'sanitize_hex_color',
    ) );
    
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'techengage_title_color', array(
        'label'      => __('Title Color', 'techengage' ),
        'section'    => 'title_setting',
        'settings'   => 'techengage_title_color',) 
    ) );

    //Change Title Hover Color
    $wp_customize->add_setting('techengage_title_hover_color', array(
    'default' => '#349bdc',
    'sanitize_callback' => 'sanitize_hex_color',
    ) );
    
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'techengage_title_hover_color', array(
        'label'      => __('Title Hover Color', 'techengage' ),
        'section'    => 'title_setting',
        'settings'   => 'techengage_title_hover_color',) 
    ) );


	// Menu Section
    $wp_customize->add_section('menu_setting', array(
        'title' => __('Menu Colors','techengage'),
        'priority' => 44,
        'panel' => 'techengage_header_panel',
    ) );

	//Main Menu background color
	$wp_customize->add_setting('techengage_header_background', array(
	'default' => '#343e47',
	'sanitize_callback' => 'sanitize_hex_color',
    ) );
	
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'techengage_header_background', array(
		'label'      => __('Header Background Color', 'techengage' ),
		'section'    => 'menu_setting',
		'settings'   => 'techengage_header_background',) 
	) );

	// Sub Menu background color
	$wp_customize->add_setting('techengage_submenu_background', array(
	'default' => '#fff',
	'sanitize_callback' => 'sanitize_hex_color',
    ) );
	
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'techengage_submenu_background', array(
		'label'      => __('SubMenu Background Color', 'techengage' ),
		'section'    => 'menu_setting',
		'settings'   => 'techengage_submenu_background',) 
	) );

	// Menu Text Color
	$wp_customize->add_setting('techengage_menu_text_color', array(
	'default' => '#fff',
	'sanitize_callback' => 'sanitize_hex_color',
    ) );
	
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'techengage_menu_text_color', array(
		'label'      => __('Menu Text Color', 'techengage' ),
		'section'    => 'menu_setting',
		'settings'   => 'techengage_menu_text_color',) 
	) );

	// Menu Text Hover Color
	$wp_customize->add_setting('techengage_menu_text_hover_color', array(
	'default' => '#34aaec',
	'sanitize_callback' => 'sanitize_hex_color',
    ) );
	
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'techengage_menu_text_hover_color', array(
		'label'      => __('Menu Text Hover Color', 'techengage' ),
		'section'    => 'menu_setting',
		'settings'   => 'techengage_menu_text_hover_color',) 
	) );	

	// Active Tab Color
	$wp_customize->add_setting('techengage_active_tab_color', array(
	'default' => '#e7e7e7',
	'sanitize_callback' => 'sanitize_hex_color',
    ) );
	
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'techengage_active_tab_color', array(
		'label'      => __('Current Menu Tab Color', 'techengage' ),
		'section'    => 'menu_setting',
		'settings'   => 'techengage_active_tab_color',) 
	) );	

}

	add_action( 'customize_register', 'techengage_header_settings' );
?>