<?php

/**
    Slider Layout One
**/
$ta_newspaper_slider_cat = get_theme_mod('ta_newspaper_slider_cat');
$ta_newspaper_slider_feature_post_1 = get_theme_mod('ta_newspaper_slider_feature_post_1');
$ta_newspaper_slider_feature_post_2 = get_theme_mod('ta_newspaper_slider_feature_post_2');
$ta_newspaper_slider_feature_post_3 = get_theme_mod('ta_newspaper_slider_feature_post_3');
$ta_newspaper_slider_feature_post_4 = get_theme_mod('ta_newspaper_slider_feature_post_4');

$ta_newspaper_slider_args = array(
            'post_type' => 'post',
            'order' => 'DESC',
            'post_status' => 'publish',
            'category_name' => $ta_newspaper_slider_cat
        );

$ta_newspaper_slider_args_featured = array(
            'post_type' => 'post',
            'order' => 'DESC',
            'posts_per_page' => 4,
            'post_status' => 'publish',
            'post__in' => array(
                $ta_newspaper_slider_feature_post_1,
                $ta_newspaper_slider_feature_post_2,
                $ta_newspaper_slider_feature_post_3,
                $ta_newspaper_slider_feature_post_4 )
        );

$ta_newspaper_slider_query = new WP_Query( $ta_newspaper_slider_args );
$ta_newspaper_slider_query_featured = new WP_Query( $ta_newspaper_slider_args_featured );
$ta_newspaper_slider_layout = get_theme_mod('ta_newspaper_slider_layout','layout-1');

?>
    <div class="main-slider-wrap clearfix">
        <div class="slide-feature-post-wrap <?php echo esc_attr($ta_newspaper_slider_layout); ?>">
            <div class="tan-container">
                <div class="tan-slider-wrap">

                    <?php if( $ta_newspaper_slider_query->have_posts() ){ ?>

                        <div class="first-post-slide">
                            <div class="owl-carousel slider-all-contents-3">
                                
                                <?php
                                while( $ta_newspaper_slider_query->have_posts() ){
                                    $ta_newspaper_slider_query->the_post();

                                    $ta_newspaper_slider_image = wp_get_attachment_image_src( get_post_thumbnail_id(),'extra_larg' ); ?>
                                    <div style="background-image: url(<?php echo esc_url( $ta_newspaper_slider_image[0] ); ?>);" class="layout-three-loop-wrap clearfix">
                                        <div class="loop-slider-conents">
                                            <div class="img-titl-contents">

                                                <div class="title-cat-date">

                                                    <?php
                                                    $ta_newspaper_slider_cats = get_the_category( get_the_ID() );
                                                    $ta_newspaper_cat_count = 1;
                                                    if($ta_newspaper_slider_cats){ ?>
                                                        <div class="slider-cat">
                                                            <?php foreach($ta_newspaper_slider_cats as $ta_newspaper_slider_cat){
                                                            if($ta_newspaper_cat_count != '1'){ echo esc_html(', '); }?>
                                                                <a class="<?php echo ' cat_'.esc_attr($ta_newspaper_slider_cat->slug); ?>" href="<?php echo esc_url(get_category_link(absint($ta_newspaper_slider_cat->cat_ID))); ?>">
                                                                    <?php echo esc_html($ta_newspaper_slider_cat->name);?>
                                                                </a>
                                                            <?php  $ta_newspaper_cat_count++; } ?>
                                                        </div>
                                                    <?php } ?>

                                                    <?php if( get_the_title() ){
                                                        the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
                                                    } ?>

                                                    <div class="slider-entry-meta">
                                                        <?php ta_newspaper_entry_meta(); ?>
                                                    </div><!-- .entry-meta -->

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                <?php } wp_reset_postdata(); ?>
                                
                            </div>
                        </div>
                    <?php } ?>

                    <?php if( $ta_newspaper_slider_query_featured->have_posts() ){ ?>
                        <div class="slider-featured-posts">
                            
                            <?php
                            while( $ta_newspaper_slider_query_featured->have_posts() ){
                                $ta_newspaper_slider_query_featured->the_post();
                                $ta_newspaper_slider_image = wp_get_attachment_image_src( get_post_thumbnail_id(),'large' );
                                ?>

                                <div style="background-image: url(<?php echo  esc_url($ta_newspaper_slider_image[0]); ?>);" class="loop-slider-conents">
                                    <div class="img-titl-contents">

                                        <div class="title-cat-date">

                                            <?php if( get_the_title() ){
                                                the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
                                            } ?>

                                            <div class="slider-entry-meta">
                                                <?php ta_newspaper_entry_meta(); ?>
                                            </div><!-- .entry-meta -->

                                        </div>
                                    </div>
                                </div>

                            <?php } ?>

                        </div>
                    <?php wp_reset_postdata(); } ?>

                </div>
            </div>
        </div>
    </div>
