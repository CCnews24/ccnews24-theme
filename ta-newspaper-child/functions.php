<?php 

function ta_newspaper_scripts1() {
	wp_enqueue_style( 'ta-newspaper-style', get_stylesheet_uri() );
	wp_enqueue_style( 'ta-newspaper-slick', get_stylesheet_directory_uri() . '/assets/css/slick.css' );
	wp_enqueue_style( 'ta-newspaper-slicktheme', get_stylesheet_directory_uri() . '/assets/css/slick-theme.css' );
	wp_enqueue_style( 'ta-newspaper-bootstrap', get_stylesheet_directory_uri() . '/assets/css/bootstrap.min.css' );
	wp_enqueue_style( 'ta-newspaper-main', get_stylesheet_directory_uri() . '/assets/css/style.css' );
  
	wp_enqueue_script('jQuery');
	
	wp_enqueue_script( 'blue-owl-jQuery', get_stylesheet_directory_uri() . '/assets/js/jquery-3.2.1.min.js', array(), '20151215', true );
	wp_enqueue_script( 'ta-newspaper-slick', get_stylesheet_directory_uri() . '/assets/js/slick.min.js', array(), '20151215', true );
	wp_enqueue_script( 'ta-newspaper-main', get_stylesheet_directory_uri() . '/assets/js/main.js', array(), '20151215', true );
	wp_enqueue_script( 'ta-newspaper-custom', get_stylesheet_directory_uri() . '/assets/js/custom.js', array(), '20151215', true );

}
add_action( 'wp_enqueue_scripts', 'ta_newspaper_scripts1',100 );

add_theme_support( 'post-thumbnails' ); 

