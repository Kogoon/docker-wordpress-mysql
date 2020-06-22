<?php

function techengage_pagination_settings($wp_customize) {

    $wp_customize->add_section('pagination_setting', array(
        'title' => __('Pagination Style','techengage'),
        'priority' => 30
    ) );

    $wp_customize->add_setting(
    'techengage_pagination_style',array(
    'sanitize_callback' => 'techengage_copyright_sanitize_checkbox',
    ) );

    $wp_customize->add_control('techengage_pagination_style', array(
    'type' => 'checkbox',
    'label' => __('Use Ajax pagination','techengage'),
    'section' => 'pagination_setting',
    'settings'   => 'techengage_pagination_style',
    ) );

}

add_action( 'customize_register', 'techengage_pagination_settings' );

?>