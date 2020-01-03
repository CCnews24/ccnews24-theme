<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package TA Newspaper
 */

get_header(); ?>


<!-- slider -->

     
<!-- end slider -->
<div class="tan-container clearfix">

	<?php global $post;
	$sidebar_meta_option = 'right_sidebar';
    $sidebar_meta_option = get_post_meta( $post->ID, 'ta_newspaper_post_sidebar_layout', true );
    
    if($sidebar_meta_option == 'both_sidebar' || $sidebar_meta_option == 'left_sidebar'){
        get_sidebar( 'left' );
	} ?>
	


	<div id="primary" class="front-page content-area">
		<main id="main" class="site-main">
<!-- posts -->

<?php if ( have_posts() ) :
  while ( have_posts() ) : the_post();
             
              the_content();
        endwhile;
endif; ?>


        <!-- end posts -->
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
if( $sidebar_meta_option == 'right_sidebar' || $sidebar_meta_option == 'both_sidebar' || $sidebar_meta_option == '') {
        get_sidebar();
} ?>

</div>
<?php get_footer();
