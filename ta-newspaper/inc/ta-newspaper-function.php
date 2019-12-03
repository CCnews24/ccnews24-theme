<?php
/** Breadcrumb Function **/
function ta_newspaper_header_banner_x() {
	if( !is_home() && !is_front_page() ) :
    $ta_newspaper_breadcrumb_image = get_theme_mod('ta_newspaper_breadcrumb_image') 
		?>
			<div class="header-banner-container" <?php if($ta_newspaper_breadcrumb_image){ ?>style="background-image: url(<?php echo esc_url($ta_newspaper_breadcrumb_image); ?>);" <?php } ?> itemscope itemtype="http://schema.org/BreadcrumbList" >
                <div class="tan-container">
    				<div class="page-title-wrap">
    					<?php ta_newspaper_breadcrumbs(); ?>
    				</div>
                </div>
			</div>
		<?php
	endif;
}
add_action('ta_newspaper_header_banner', 'ta_newspaper_header_banner_x');

function ta_newspaper_post_formate(){

    $post_formate = esc_html( get_post_format( get_the_ID() ) );

    if( $post_formate == 'gallery' ){
        $icon_class = 'fa-picture-o';
    }elseif( $post_formate == 'link' ){
        $icon_class = 'fa-link';
    }elseif( $post_formate == 'image' ){
        $icon_class = 'fa-picture-o';
    }elseif( $post_formate == 'video' ){
        $icon_class = 'fa-play';
    }elseif( $post_formate == 'quote' ){
        $icon_class = 'fa-quote-left';
    }elseif( $post_formate == 'audio' ){
        $icon_class = 'fa-music';
    }elseif( $post_formate == 'aside' ){
        $icon_class = 'fa-file-text-o';
    }else{
        $icon_class = '';
    }
    if( $icon_class ){
    ?>
        <div class="post-formate-icon">
            <i class="fa <?php echo esc_attr( $icon_class ); ?>"></i>
        </div>
    <?php
    }

}

/** Header Banner Function **/
function ta_newspaper_home_banner_x(){

    $ta_newspaper_banner_enable_disable = get_theme_mod('ta_newspaper_banner_enable_disable');
    $ta_newspaper_slider_cat = get_theme_mod('ta_newspaper_slider_cat');

    if( $ta_newspaper_banner_enable_disable == 'enable' && $ta_newspaper_slider_cat ){

        $ta_newspaper_slider_args = array(
            'post_type' => 'post',
            'order' => 'DESC',
            'post_status' => 'publish',
            'category_name' => $ta_newspaper_slider_cat
        );
        $ta_newspaper_slider_query = new WP_Query( $ta_newspaper_slider_args );
        $ta_newspaper_slider_layout = get_theme_mod('ta_newspaper_slider_layout','layout-1');

        if( $ta_newspaper_slider_query->have_posts() ){ 
            
            get_template_part( 'template-parts/slider/' . esc_attr( $ta_newspaper_slider_layout ) );

            wp_reset_postdata();
        }
    }
}
add_action('ta_newspaper_home_slider_banner','ta_newspaper_home_banner_x');

/** Post Category List **/
function ta_newspaper_Category_list(){
    $ta_newspaper_cat_lists = get_categories(
        array(
            'hide_empty' => '0',
            'exclude' => '1',
        )
    );
    $ta_newspaper_cat_array = array();
    $ta_newspaper_cat_array[] = esc_html__('--Choose--','ta-newspaper');
    foreach( $ta_newspaper_cat_lists as $ta_newspaper_cat_list ){
        $ta_newspaper_cat_array[$ta_newspaper_cat_list->slug] = $ta_newspaper_cat_list->name;
    }
    return $ta_newspaper_cat_array;
}

/** Post Category List **/
function ta_newspaper_Category_list_2(){
    $ta_newspaper_cat_lists = get_categories(
        array(
            'hide_empty' => '0',
            'exclude' => '1',
        )
    );
    $ta_newspaper_cat_array = array();
    foreach($ta_newspaper_cat_lists as $ta_newspaper_cat_list){
        $ta_newspaper_cat_array[$ta_newspaper_cat_list->slug] = $ta_newspaper_cat_list->name;
    }
    return $ta_newspaper_cat_array;
}

/** Post Category List **/
function ta_newspaper_post_lists(){
    $posts = get_posts();
    $post_lists = array();
    $post_lists[''] = esc_html__('Select post', 'ta-newspaper'); 
    foreach($posts as $post) :
        $post_lists[$post->ID] = $post->post_title;
    endforeach;
    return $post_lists;
}

/** TA Newspaper Entry Meta **/
function ta_newspaper_entry_meta($author = true,$date = true,$comment = true){ ?>
    <div class="entry-meta">
        <div class="comment-author-date">
            <?php if( $author ){ ta_newspaper_posted_by(); } ?>
            
            <?php if( $date ){ ta_newspaper_posted_on(); } ?>
            
            <?php if( $comment ){ ?>
            <span class="post-comment"><a href="<?php comments_link(); ?>"><i class="fa fa-comment-o" aria-hidden="true"></i><?php echo absint(get_comments_number()); esc_html_e(' comment','ta-newspaper'); ?></a></span>
            <?php } ?>
        </div>
    </div><!-- .entry-meta -->

<?php }

if( ! function_exists( 'ta_newspaper_social_icon' ) ) :

    /** Social Links **/
    function ta_newspaper_social_icon(){

        $ta_newspaper_facebook_link  = get_theme_mod('ta_newspaper_facebook_link');
        $ta_newspaper_twitter_link   = get_theme_mod('ta_newspaper_twitter_link');
        $ta_newspaper_youtube_link   = get_theme_mod('ta_newspaper_youtube_link');
        $ta_newspaper_google_link    = get_theme_mod('ta_newspaper_google_link');
        $ta_newspaper_linkedin_link  = get_theme_mod('ta_newspaper_linkedin_link');
        $ta_newspaper_pinterest_link = get_theme_mod('ta_newspaper_pinterest_link');

        if( $ta_newspaper_facebook_link || $ta_newspaper_twitter_link || $ta_newspaper_youtube_link || 
        $ta_newspaper_google_link || $ta_newspaper_linkedin_link || $ta_newspaper_pinterest_link ){ ?>
            <div class="social-links">
                <?php if( $ta_newspaper_facebook_link ){ ?><a href="<?php echo esc_url( $ta_newspaper_facebook_link ); ?>"><i class="fa fa-facebook" aria-hidden="true"></i></a><?php }
                if( $ta_newspaper_twitter_link ){ ?><a href="<?php echo esc_url( $ta_newspaper_twitter_link ); ?>"><i class="fa fa-twitter" aria-hidden="true"></i></a><?php }
                if( $ta_newspaper_youtube_link ){ ?><a href="<?php echo esc_url( $ta_newspaper_youtube_link ); ?>"><i class="fa fa-youtube" aria-hidden="true"></i></a><?php }
                if( $ta_newspaper_google_link ){ ?><a href="<?php echo esc_url( $ta_newspaper_google_link ); ?>"><i class="fa fa-google-plus" aria-hidden="true"></i></a><?php }
                if( $ta_newspaper_linkedin_link ){ ?><a href="<?php echo esc_url( $ta_newspaper_linkedin_link ); ?>"><i class="fa fa-linkedin" aria-hidden="true"></i></a><?php }
                if( $ta_newspaper_pinterest_link ){ ?><a href="<?php echo esc_url( $ta_newspaper_pinterest_link ); ?>"><i class="fa fa-pinterest" aria-hidden="true"></i></a><?php } ?>
            </div>
        <?php }
    }
endif;

if( ! function_exists( 'ta_newspaper_home_sections_ed' ) ) :

    /** Returns Home Sections  **/
    function ta_newspaper_home_sections_ed(){
        
        $sections = array(
            'right-sidebar'   => array( 'sidebar' => 'ta-newspaper-home-with-sidebar' ),
            'no-sidebar'  => array( 'sidebar' => 'ta-newspaper-home-full-width' ),
        );
        
        $ed_section = array();
        
        foreach( $sections as $key => $value ){
            if( is_active_sidebar( $value['sidebar'] ) ) array_push( $ed_section, $key );
        }  
        
        return $ed_section;
    }

endif;

if( ! function_exists( 'ta_newspaper_single_related_post' ) ) :
    /** Get Related Posts **/
    function ta_newspaper_single_related_post(){
        global $post;
        $cats = get_the_category( $post->ID );        
        if( $cats ){
            $list_cats = array();
            foreach( $cats as $cat ){
                $list_cats[] = $cat->term_id; 
            }
        }  
        $related_posts_query = new WP_Query( array( 'post_type' => 'post','posts_per_page' => 3,'post__not_in' => array( $post->ID, 'category__in' => $list_cats ) ) );

        if( $related_posts_query->have_posts() ): 
            
            $ta_newspaper_related_posts_section_title = get_theme_mod('ta_newspaper_related_posts_section_title',esc_html__( 'Related Posts','ta-newspaper' ) ); ?>
            <div class="single-related-posts clearfix">
                <div class="tan-container">
                    <?php if( $ta_newspaper_related_posts_section_title ){ ?>
                        <div class="related-sec-title">
                            <h2><?php echo esc_html( $ta_newspaper_related_posts_section_title ); ?></h2>
                        </div>
                    <?php } ?>

                    <div class="wrapr-related-posts">
                        <?php while( $related_posts_query->have_posts() ){
                            $related_posts_query->the_post();

                            $ta_newspaper_related_image = wp_get_attachment_image_src( get_post_thumbnail_id(),'ta-newspaper-related-post' ); ?>

                            <div class="loop-related-conents">
                                <div class="related-img-contents">

                                    <div class="related-image">
                                        <a href="<?php the_permalink(); ?>">
                                            <?php if( $ta_newspaper_related_image[0] ){ ?>

                                              <img src="<?php echo  esc_url( $ta_newspaper_related_image[0]); ?>" alt="<?php the_title_attribute(); ?>" title="<?php the_title_attribute(); ?>"/>

                                            <?php }else{
                                              $img_link = get_template_directory_uri().'/images/fallback-image/380X230.jpg'; ?>
                                              <img src="<?php echo esc_url( $img_link ); ?>" alt="<?php the_title_attribute(); ?>" title="<?php the_title_attribute(); ?>"/>

                                            <?php } ?>
                                            
                                        </a>
                                    </div>

                                    <div class="related-title-cat-date">

                                        <?php if( get_the_title() ){
                                            the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
                                        } ?>

                                        <div class="related-entry-meta">
                                            <?php ta_newspaper_entry_meta(); ?>
                                        </div><!-- .entry-meta -->

                                    </div>
                                </div>
                            </div>

                        <?php } wp_reset_postdata(); ?>
                    </div>
                </div>
            </div>
        <?php endif;
    }

endif;

if( ! function_exists( 'ta_newspaper_post_category' ) ) :

    // Post Category Lists
    function ta_newspaper_post_category(){

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
        <?php }

    }
endif;

if( ! function_exists( 'ta_newspaper_dynamic_style' ) ) :

add_action('wp_enqueue_scripts','ta_newspaper_dynamic_style',200);

    function ta_newspaper_dynamic_style(){


        $ta_newspaper_dynamic_style = '';

         $ta_newspaper_show_sub_menu_respnsive = get_theme_mod('ta_newspaper_show_sub_menu_respnsive','disable');

        if( $ta_newspaper_show_sub_menu_respnsive == 'enable' ){
            $ta_newspaper_dynamic_style .= "@media(max-width:823px) {.main-navigation ul ul, .top-main-navigation ul ul {display: block !important;}span.tab-submenu {display: none !important;}}";
        }
        
        wp_add_inline_style( 'ta-newspaper-style', $ta_newspaper_dynamic_style );
    }

endif;