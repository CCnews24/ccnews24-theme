<?php
/**
 * TA Newspaper Theme Customizer
 *
 * @package TA Newspaper
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function ta_newspaper_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
    $wp_customize->get_section( 'background_image' )->panel = 'ta_newspaper_general_panel';
    $wp_customize->get_section( 'header_image' )->panel = 'ta_newspaper_general_panel';  
    $wp_customize->get_section( 'colors' )->panel = 'ta_newspaper_general_panel';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title',
			'render_callback' => 'ta_newspaper_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'ta_newspaper_customize_partial_blogdescription',
		) );
	}
}
add_action( 'customize_register', 'ta_newspaper_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function ta_newspaper_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function ta_newspaper_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function ta_newspaper_customize_preview_js() {
	wp_enqueue_script( 'ta-newspaper-customizer', get_template_directory_uri() . '/inc/customizer/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'ta_newspaper_customize_preview_js' );

function ta_newspaper_customizer_enqueue(){
    wp_enqueue_script( 'jquery-ui-button' );
    wp_enqueue_style( 'ta-newspaper-customizer-style', get_template_directory_uri() . '/inc/customizer/css/customizer-style.css' );
    wp_enqueue_script( 'ta-newspaper-customizer-script', get_template_directory_uri() . '/inc/customizer/js/customizer-script.js', array( 'jquery', 'customize-controls' ), '20160714', true );
    $array = array(
        'home_url'     => get_home_url(),
    );
    wp_localize_script( 'ta-newspaper-customizer-script', 'ta_newspaper_customize_data', $array );
}
add_action('customize_controls_enqueue_scripts','ta_newspaper_customizer_enqueue');