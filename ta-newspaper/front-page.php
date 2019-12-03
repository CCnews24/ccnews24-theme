<?php
/**
 * @package TA Newspaper
 */
 
$home_sections = ta_newspaper_home_sections_ed();

if ( 'posts' == get_option( 'show_on_front' ) ) {
    
    include( get_home_template() );

}elseif( $home_sections ){ 

    get_header();

    foreach( $home_sections as $section ){
        get_template_part( 'template-parts/sections/' . esc_attr( $section ) );
    }

	get_footer();

}
else {

    include( get_page_template() );
    
}
