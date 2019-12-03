<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package TA Newspaper
 */

get_header(); 
$sidebar_meta_option = get_theme_mod('ta_newspaper_archive_layout','right_sidebar'); ?>
<div class="tan-container clearfix">
	<?php if( $sidebar_meta_option == 'left_sidebar' || $sidebar_meta_option == 'both_sidebar' ){
		 get_sidebar( 'left' );
	} ?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php
		if ( have_posts() ) : ?>

			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_format() );

			endwhile;

			the_posts_pagination();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->


</div>
<?php get_footer();
