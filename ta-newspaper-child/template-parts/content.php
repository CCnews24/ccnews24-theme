<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package TA Newspaper
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope itemtype="https://schema.org/Blog">
	<header class="entry-header">
		<?php
		if ( is_single() ) :
			the_title( '<h2 class="entry-title post-single_title">', '</h2>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;
		
		if( is_archive() ){
			$ta_newspaper_ed_feature_image = get_theme_mod('ta_newspaper_ed_archive_feature_image','enable');
		}else{
			$ta_newspaper_ed_feature_image = get_theme_mod('ta_newspaper_ed_feature_image','enable');
	        
	    }
        $ta_newspaper_post_image = wp_get_attachment_image_src(get_post_thumbnail_id(),'ta-newspapersingle-page');
        if( $ta_newspaper_ed_feature_image != 'disable' && $ta_newspaper_post_image ){
            ?><img class="post-page-image" src="<?php echo esc_url($ta_newspaper_post_image[0]) ?>" alt="<?php the_title_attribute()?>" title="<?php the_title_attribute()?>" /><?php
        }

       
        
		

		if ( 'post' === get_post_type() ) :
			if( is_archive() ){
				$ta_newspaper_ed_archive_author = get_theme_mod('ta_newspaper_ed_archive_author','enable');
				$ta_newspaper_ed_archive_date = get_theme_mod('ta_newspaper_ed_archive_date','enable');
				$ta_newspaper_ed_archive_comment_ed = get_theme_mod('ta_newspaper_ed_archive_comment_ed','enable');
				$author = true;
				$date = true;
				$comment_ed = true;
				if( $ta_newspaper_ed_archive_author =='disable' ){
					$author = false;
				}

				if( $ta_newspaper_ed_archive_date =='disable' ){
					$date = false;
				}
				if( $ta_newspaper_ed_archive_comment_ed =='disable' ){
					$comment_ed = false;
				}
			}else{
				$ta_newspaper_ed_author = get_theme_mod('ta_newspaper_ed_author','enable');
				$ta_newspaper_ed_date = get_theme_mod('ta_newspaper_ed_date','enable');
				$ta_newspaper_ed_comment_ed = get_theme_mod('ta_newspaper_ed_comment_ed','enable');
				$author = true;
				$date = true;
				$comment_ed = true;
				if( $ta_newspaper_ed_author =='disable' ){
					$author = false;
				}

				if( $ta_newspaper_ed_date =='disable' ){
					$date = false;
				}
				if( $ta_newspaper_ed_comment_ed =='disable' ){
					$comment_ed = false;
				}
			}
			ta_newspaper_entry_meta($author,$date,$comment_ed);
		endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content one-post-content">
		<?php
        if ( is_single() ) :
			the_content();
        else:
            the_excerpt();
            $ta_newspaper_archive_readmore_label = get_theme_mod('ta_newspaper_archive_readmore_label',esc_html__( 'Read More','ta-newspaper') );
            ?>
                <a class="read-more" href="<?php the_permalink() ?>"><?php echo esc_html($ta_newspaper_archive_readmore_label); ?><i class="fa fa-angle-right " aria-hidden="true"></i></a>
            <?php
        endif;
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'ta-newspaper' ),
				'after'  => '</div>',
			) );

			ta_newspaper_post_category();
		?>
	</div><!-- .entry-content -->

	<?php if( is_single() ): ?>
		<footer class="entry-footer">
			<?php ta_newspaper_entry_footer(); ?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>

</article><!-- #post-<?php the_ID(); ?> -->
