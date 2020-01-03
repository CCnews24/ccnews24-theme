<?php
/**
 * Template name: Home page
 */

get_header(); ?>


<!-- slider -->
<section class="slider" id="slider">
        <div class="container">
            <div class="row">
                <div class="col-12">
                 
                    <!-- <i class="headline-articles__navigation headline-articles__navigation--prev headline-slider__navigation headline-slider__navigation--prev material-icons"></i>
                        <i class="headline-articles__navigation headline-articles__navigation--next headline-slider__navigation headline-slider__navigation--next material-icons"></i> -->
                         <?/*php echo do_shortcode('[ccpw id="88"]'); */?>
                        <?php echo do_shortcode('[cryptopack id="1799"]'); ?>
                      
                </div>
               
            </div>
            <hr class="slider-hr">
        </div>
        
    </section> 
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

<?php global $wp_query;

if ( get_query_var('paged') ) { $paged = get_query_var('paged'); }
elseif ( get_query_var('page') ) { $paged = get_query_var('page'); }
else { $paged = 1; }
 $wp_query = new WP_Query( array ('posts_per_page' => 25, 'post_type' => 'post', 'order' => 'DESC', 'paged' => $paged ) ); ?>

<?php while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>

	<div class="blog-post post-box d-flex">
		
		<?php if ( has_post_thumbnail() ) {  ?>
			<div class="blog-featured-image post-box_img">
				<a class="post-box_img" href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'blog-featured-image' ); ?></a>
			</div>
        <?php } ?>
        <div class="post-box_text">
                                        <div class="post-box_cat d-flex">
                                           <?php the_category(); ?>
                                           <div class="modal-overlay"></div>
                                            <span class="has-dropdown hiden post-has-dropdown share-dropdown" data-target="share-dropdown--315" data-align="right-bottom"><i class="fa fa-ellipsis-v"></i></span>
                                            <div class="share-dropdown share-dropdown-soc  dropdown-container" style="">
                                               

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
                                        </div>
                                        
                                        <h2 class="post-box_title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                        
                                        <hr class="post-hr">
                                        <div class="post-box_date d-flex">
                                        
                                         <?php the_time('j M Y , H:i'); ?> 
                                         <a class="author-link" title="<?php the_author() ?>">
                                        
                                                <span class="dashicons dashicons-admin-users">@  <?php the_author_posts_link(); ?> </span></a>
                                        </div>
                                    </div>
		
		
		<!-- <div class="post-excerpt">
			<?php the_excerpt(); ?>
			<span class='read-more'><a class="read-more"  href="<?php the_permalink(); ?>"> More... </a></span>
		</div> -->
    </div><!-- end .blog-post -->
   
  
<?php endwhile;
 ?>
<?php wp_reset_postdata(); ?>

<?php the_posts_pagination( array(
	'end_size' => 2,
) );?>

        <!-- end posts -->
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
if( $sidebar_meta_option == 'right_sidebar' || $sidebar_meta_option == 'both_sidebar' || $sidebar_meta_option == '') {
        get_sidebar();
} ?>
<!-- form -->

<!-- form -->
</div>
<?php get_footer();
