<?php

function techengage_footer_settings( $wp_customize ){

	//Footer Settings Section
    $wp_customize->add_section('footer_setting', array(
        'title' => __('Footer Colors','techengage'),
        'priority' => 44,
        'panel' => 'techengage_copyright',
    ) );

    //Change Footer Backgorund Color
    $wp_customize->add_setting('techengage_footer_bk_color', array(
    'default' => '#4a4a4a',
    'sanitize_callback' => 'sanitize_hex_color',
    ) );
    
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'techengage_footer_bk_color', array(
        'label'      => __('Footer Backgorund Color', 'techengage' ),
        'section'    => 'footer_setting',
        'settings'   => 'techengage_footer_bk_color',) 
    ) );   	 

    //Change Links Color
    $wp_customize->add_setting('techengage_footer_links_color', array(
    'default' => '#FFF',
    'sanitize_callback' => 'sanitize_hex_color',
    ) );
    
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'techengage_footer_links_color', array(
        'label'      => __('Links Color', 'techengage' ),
        'section'    => 'footer_setting',
        'settings'   => 'techengage_footer_links_color',) 
    ) );

    //Change Links Hover Color
    $wp_customize->add_setting('techengage_footer_links_hover_color', array(
    'default' => '#FFF',
    'sanitize_callback' => 'sanitize_hex_color',
    ) );
    
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'techengage_footer_links_hover_color', array(
        'label'      => __('Links Hover Color', 'techengage' ),
        'section'    => 'footer_setting',
        'settings'   => 'techengage_footer_links_hover_color',) 
    ) );

}

	add_action( 'customize_register', 'techengage_footer_settings' );
?>