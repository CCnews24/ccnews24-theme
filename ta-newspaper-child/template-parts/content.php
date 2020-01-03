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
	<header class="entry-header one-post">

		<?php
		if ( is_single() ) :
			the_title( '<h2 class="entry-title post-single_title-top post-single_title">', '</h2>');
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
				$date = true;
			    $author = true;
				?>
				<div class="category-article"><a class="post-box_img" href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail( 'blog-featured-image' ); ?></a>
				<div class="category-article_text">
				<div class="modal-overlay"></div>
				<span class="has-dropdown hiden post-has-dropdown share-dropdown" data-target="share-dropdown--315" data-align="right-bottom"><i class="fa fa-ellipsis-v"></i></span>
                                            <div class="share-dropdown share-dropdown-soc  dropdown-container">
                                               

                                                <ul class="the_champ_sharing_ul">
                                                    <li class="theChampSharingRound" alt="Facebook" 
                                                        title="Facebook"
                                                        onclick="theChampPopup(&quot;https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Flocalhost%2Fcc-news%2F2019%2F06%2F10%2Ftrade-wars-impact-on-the-blockchain-and-crypto-industry%2F&quot;)">
                                                        <i  class="theChampSharing theChampFacebookBackground"  style="width:30px;height:30px;border-radius:999px;" >
                                                        <ss style="display:block;border-radius:999px;" class="theChampSharingSvg theChampFacebookSvg"></ss>
                                                        </i><i class="fa fa-facebook-f"></i> Facebook
                                                        
                                                        <ss class="the_champ_square_count the_champ_facebook_count">&nbsp;</ss>
                                                    </li>
                                                    <li class="theChampSharingRound"   onclick="theChampPopup(&quot;http://twitter.com/intent/tweet?text=Trade%20Wars%3A%20Impact%20on%20the%20Blockchain%20and%20Crypto%20Industry&amp;url=http%3A%2F%2Flocalhost%2Fcc-news%2F2019%2F06%2F10%2Ftrade-wars-impact-on-the-blockchain-and-crypto-industry%2F&quot;)"><i style="width:30px;height:30px;border-radius:999px;" alt="Twitter" title="Twitter"
                                                     class="theChampSharing theChampTwitterBackground">
                                                     <ss style="display:block;border-radius:999px;" class="theChampSharingSvg theChampTwitterSvg"></ss></i><i class="fa fa-twitter"></i>Twitter
                                                     <ss class="the_champ_square_count the_champ_twitter_count">&nbsp;</ss>
                                                    </li>
                                                    <li class="theChampSharingRound" onclick="window.open('mailto:?subject=' + decodeURIComponent('Trade%20Wars%3A%20Impact%20on%20the%20Blockchain%20and%20Crypto%20Industry' ).replace('&amp;', '%26') + '&amp;body=' + decodeURIComponent('http%3A%2F%2Flocalhost%2Fcc-news%2F2019%2F06%2F10%2Ftrade-wars-impact-on-the-blockchain-and-crypto-industry%2F' ), '_blank')"><i style="width:30px;height:30px;border-radius:999px;" alt="Email" title="Email" 
                                                    class="theChampSharing theChampEmailBackground">
                                                    <ss style="display:block" class="theChampSharingSvg theChampEmailSvg"></ss></i>   <i class="fa fa-envelope"></i>Email
                                                    <ss class="the_champ_square_count the_champ_email_count">&nbsp;</ss>
                                                    </li>
                                                    <li class="theChampSharingRound"><i style="width:30px;height:30px;border-radius:999px;" alt="Google Bookmarks" 
                                                    title="Google Bookmarks" class="theChampSharing theChampGoogleBookmarksBackground"
                                                    onclick="theChampPopup(&quot;https://www.google.com/bookmarks/mark?op=edit&amp;bkmk=http%3A%2F%2Flocalhost%2Fcc-news%2F2019%2F06%2F10%2Ftrade-wars-impact-on-the-blockchain-and-crypto-industry%2F&amp;title=Trade%20Wars%3A%20Impact%20on%20the%20Blockchain%20and%20Crypto%20Industry&amp;annotation=&quot;)">
                                                    <ss style="display:block;border-radius:999px;" class="theChampSharingSvg theChampGoogleBookmarksSvg"></ss>
                                                    </i><i class="fa fa-google"></i>Google<ss class="the_champ_square_count the_champ_Google_Bookmarks_count">&nbsp;</ss>
                                                    </li>
                                            
                                                </ul>
                                            </div>
				<?php 
				// the_category('<span class="category"></span>');
				the_title( '<h2 class="cat-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a> 
				</h2> ') . 
				 
			       
				'<a class="author-link" href="#" title="<?php the_author() ?>">
				<span class="dashicons dashicons-admin-users">@ </span></a>
		</div>
				</div>' ;
				
				
				if( is_archive() ){
					$ta_newspaper_ed_feature_image = get_theme_mod('ta_newspaper_ed_archive_feature_image','enable');
				}else{
					$ta_newspaper_ed_feature_image = get_theme_mod('ta_newspaper_ed_feature_image','enable');
					
				}
				$ta_newspaper_post_image = wp_get_attachment_image_src(get_post_thumbnail_id(),'ta-newspapersingle-page');
				if( $ta_newspaper_ed_feature_image != 'disable' && $ta_newspaper_post_image ){
					?><?php
				}
			
				$ta_newspaper_ed_archive_date = get_theme_mod('ta_newspaper_ed_archive_date','enable');
				$ta_newspaper_ed_archive_comment_ed = get_theme_mod('ta_newspaper_ed_archive_comment_ed','enable');
				
				
				if( $ta_newspaper_ed_archive_author =='disable' ){
					$author = true;
				}

				if( $ta_newspaper_ed_archive_date =='disable' ){
					$date = true;
				}
				if( $ta_newspaper_ed_archive_comment_ed =='disable' ){
					$comment_ed = true;
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
			ta_newspaper_entry_meta(
				$author,$date,$comment_ed);?>
				<hr class="post-hr">
				<a class="author-link" href="#" title="<?php the_author() ?>">
				<?php the_time('j M Y , H:i'); ?>
				<span class="new dashicons dashicons-admin-users">@</span>
				<?php
				the_author();?></a><?php
		endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content one-post-content">
		
		<?php
			
		if ( is_single() ) :
			ta_newspaper_post_category();
			the_title( '<h1 class="entry-title post-single_title">', '</h1>');
			?><?php
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
             ?>
			<div class="author-bio clearfix">
					
			<div class="auther-avatar">
				<?php $avatar_image = get_avatar_url( get_the_author_meta( 'ID' ), array( 'size' => 100 ) ); ?>
				<img title="<?php esc_html_e('Author Image','ta-newspaper'); ?>" alt="<?php esc_html_e('Author Image','ta-newspaper'); ?>" src="<?php echo esc_url($avatar_image); ?>" >
			</div>
		
			<?php $author_desc = get_the_author_meta('description',get_the_author_meta( 'ID' )); ?>
			
			<div class="author-name-desc g">
				
				<?php the_author_posts_link(); ?>
				<?php if( $author_desc ){ ?><p><?php echo esc_html($author_desc); ?></p><?php } ?>
				<div><i class="fa fa-calendar" aria-hidden="true"></i> <?php the_date(); ?></div>
				
			</div>

		</div>
		

	</div><!-- .entry-content -->

	<?php if( is_single() ): ?>
		<footer class="entry-footer">
			<?php ta_newspaper_entry_footer(); ?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>

</article><!-- #post-<?php the_ID(); ?> -->
