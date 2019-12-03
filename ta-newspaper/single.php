<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package TA Newspaper
 */

get_header(); ?>
<div class="tan-container clearfix">
	<?php global $post;
	$sidebar_meta_option = 'right_sidebar';
    $sidebar_meta_option = get_post_meta( $post->ID, 'ta_newspaper_post_sidebar_layout', true );
    
    if($sidebar_meta_option == 'both_sidebar' || $sidebar_meta_option == 'left_sidebar'){
        get_sidebar( 'left' );
    } ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content', get_post_type() );

			

			$ta_newspaper_ed_author_section = get_theme_mod('ta_newspaper_ed_author_section','enable');
			if( $ta_newspaper_ed_author_section !='disable' && 'post' === get_post_type() ){ ?>

				<div class="author-bio clearfix">
					
					<div class="auther-avatar">
						<?php $avatar_image = get_avatar_url( get_the_author_meta( 'ID' ), array( 'size' => 100 ) ); ?>
						<img title="<?php esc_html_e('Author Image','ta-newspaper'); ?>" alt="<?php esc_html_e('Author Image','ta-newspaper'); ?>" src="<?php echo esc_url($avatar_image); ?>" >
					</div>
					
					<?php $author_desc = get_the_author_meta('description',get_the_author_meta( 'ID' )); ?>

					<div class="author-name-desc">
						<span><?php the_author(); ?></span>
						<?php if( $author_desc ){ ?><p><?php echo esc_html($author_desc); ?></p><?php } ?>
					</div>

				</div>

			<?php }

			the_post_navigation();

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
if( $sidebar_meta_option == 'right_sidebar' || $sidebar_meta_option == 'both_sidebar' || $sidebar_meta_option == '') {
        get_sidebar();
} ?>

</div>

<?php $ta_newspaper_ed_related_Posts_section = get_theme_mod('ta_newspaper_ed_related_Posts_section','enable');
if( $ta_newspaper_ed_related_Posts_section != 'disable'){ 
	ta_newspaper_single_related_post();
}

get_footer();