<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package TA Newspaper
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function ta_newspaper_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}
	global $post;

	$home_sections = ta_newspaper_home_sections_ed();
	$sidebar_meta_option = 'right_sidebar';

    if( ( !is_front_page() ) && ( is_single() || is_page() ) ) {
        $sidebar_meta_option = esc_attr( get_post_meta( $post->ID, 'ta_newspaper_post_sidebar_layout', true ) );
        $classes[] = $sidebar_meta_option;
    }elseif( is_front_page() ){
        $classes[] = $sidebar_meta_option;
    }elseif( is_archive() ){
        $sidebar_meta_option = get_theme_mod('ta_newspaper_archive_layout','right_sidebar');
         $classes[] = $sidebar_meta_option;
    }else{
    	$classes[] = $sidebar_meta_option;
    }

    if( is_front_page() && is_page() && empty( $home_sections ) ){
    	$sidebar_meta_option = esc_attr( get_post_meta( $post->ID, 'ta_newspaper_post_sidebar_layout', true ) );
        $classes[] = $sidebar_meta_option;
    }

    $ta_newspaper_enable_disable_boxed_layout = get_theme_mod('ta_newspaper_enable_disable_boxed_layout','disable');
    if( $ta_newspaper_enable_disable_boxed_layout == 'enable' ){
        $classes[] = 'boxed-layout';
    }
	return $classes;
}
add_filter( 'body_class', 'ta_newspaper_body_classes' );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function ta_newspaper_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'ta_newspaper_pingback_header' );
