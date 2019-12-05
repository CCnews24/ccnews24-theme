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
                    <!-- <div class="main-slider">
                        <div class="slide d-flex">
                            <div class="slide-img">
                                <img src="https://s2.coinmarketcap.com/static/img/coins/64x64/1.png">
                            </div>
                           <div class="slide-text d-flex">
                                <a href="#" target="_blank" class="slide-text_name"> <?php the_field('slidename1'); ?></a>
                                <span style="font-size: 16px;"><?php the_field('currensy'); ?>
                                  <span style="color:#d94040"><?php the_field('percent'); ?></span>
                                </span> 
                           </div>                  
                        </div>
                        <div class="slide d-flex">
                            <div class="slide-img">
                                <img src="https://s2.coinmarketcap.com/static/img/coins/64x64/2.png">
                            </div>
                            <div class="slide-text d-flex">
                                <a href="#" target="_blank" class="slide-text_name">Litecoin (lTC)</a>
                                <span style="font-size: 16px;">47,60 USD
                                    <span style="color:#d94040">(-2,96%)</span>
                                </span> 
                            </div>                  
                        </div>
                        <div class="slide d-flex">
                                <div class="slide-img">
                                    <img src="https://s2.coinmarketcap.com/static/img/coins/64x64/328.png">
                                </div>
                                <div class="slide-text d-flex">
                                    <a href="#" target="_blank" class="slide-text_name">Monero (XMR)</a>
                                    <span style="font-size: 16px;">53,32 USD
                                        <span style="color:#d94040">(-2,69%)</span>
                                    </span> 
                                </div>                  
                        </div>
                        <div class="slide d-flex">
                            <div class="slide-img">
                                 <img src="https://s2.coinmarketcap.com/static/img/coins/64x64/1027.png">
                            </div>
                            <div class="slide-text d-flex">
                                <a href="#" target="_blank" class="slide-text_name">Ethereum (ETH) </a>
                                 <span style="font-size: 16px;">150,78 USD
                                    <span style="color:#d94040">(-1,96%)</span>
                                </span> 
                            </div>                  
                        </div>
                        <div class="slide d-flex">
                                <div class="slide-img">
                                    <img src="https://s2.coinmarketcap.com/static/img/coins/64x64/328.png">
                                </div>
                                <div class="slide-text d-flex">
                                    <a href="#" target="_blank" class="slide-text_name">Monero (XMR)</a>
                                    <span style="font-size: 16px;">53,32 USD
                                        <span style="color:#d94040">(-2,69%)</span>
                                    </span> 
                                </div>                  
                        </div>
                        
                    </div> -->
                    <!-- <i class="headline-articles__navigation headline-articles__navigation--prev headline-slider__navigation headline-slider__navigation--prev material-icons"></i>
                        <i class="headline-articles__navigation headline-articles__navigation--next headline-slider__navigation headline-slider__navigation--next material-icons"></i> -->
                        <?php echo do_shortcode('[ccpw id="88"]'); ?>
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

<?php $blog_query = new WP_Query( array ( 'post_type' => 'post', 'order' => 'ASC', ) ); ?>

<?php while ( $blog_query->have_posts() ) : $blog_query->the_post(); ?>

	<div class="blog-post post-box d-flex">
		
		<?php if ( has_post_thumbnail() ) {  ?>
			<div class="blog-featured-image post-box_img">
				<a class="post-box_img" href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'blog-featured-image' ); ?></a>
			</div>
        <?php } ?>
        <div class="post-box_text">
                                        <div class="post-box_cat d-flex">
                                           <?php the_category(); ?>
                                            <span class="has-dropdown post-has-dropdown share-dropdown" data-target="share-dropdown--315" data-align="right-bottom"><i class="material-icons"></i></span>
                                        </div>
                                        
                                        <h2 class="post-box_title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                        
                                        <hr class="post-hr">
                                        <div class="post-box_date d-flex">
                                        
                                         <?php the_time('j M , H:i'); ?> 
                                                <a class="author-link" href="#" title="<?php the_author() ?>">
                                                <span class="dashicons dashicons-admin-users">@ <?php the_author() ?> </span></a>
                                        </div>
                                    </div>
		
		
		<!-- <div class="post-excerpt">
			<?php the_excerpt(); ?>
			<span class='read-more'><a class="read-more"  href="<?php the_permalink(); ?>"> More... </a></span>
		</div> -->
    </div><!-- end .blog-post -->
    
    

<?php endwhile; ?>

<?php wp_reset_postdata(); ?>


        <!-- end posts -->
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
if( $sidebar_meta_option == 'right_sidebar' || $sidebar_meta_option == 'both_sidebar' || $sidebar_meta_option == '') {
        get_sidebar();
} ?>

</div>
<?php get_footer();
