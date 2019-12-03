<?php
/**
 * @package TA Newspaper
 */

add_action('widgets_init', 'ta_newspaper_recent_blog_register');

function ta_newspaper_recent_blog_register() {
    register_widget('TA_Newspaper_Recent_Blog_Widget');
}

class TA_Newspaper_Recent_Blog_Widget extends WP_Widget {

    public function __construct() {
        parent::__construct(
                'TA_Newspaper_Recent_Blog_Widget', esc_html__('TA : Sidebar Recent Blog', 'ta-newspaper'), array(
                'description' => esc_html__('This Widget show Recent Blogs', 'ta-newspaper')
                )
        );
    }

    /**
     * Helper function that holds widget fields
     * Array is used in update and form functions
     */
    private function widget_fields() {
        $ta_newspaper_cat_list = ta_newspaper_Category_list();
        $ta_newspaper_layout_array = array(
            'layout-1' => esc_html__('Layout One','ta-newspaper'),
            'layout-2' => esc_html__('Layout Two','ta-newspaper'),
            'layout-3' => esc_html__('Layout Three','ta-newspaper'),
            );
        $fields = array(
            'ta_newspaper_recent_blog_title' => array(
                'ta_newspaper_widgets_name' => 'ta_newspaper_recent_blog_title',
                'ta_newspaper_widgets_title' => esc_html__('Title', 'ta-newspaper'),
                'ta_newspaper_widgets_field_type' => 'text',
            ),
            'ta_newspaper_recent_blog_category' => array(
                'ta_newspaper_widgets_name' => 'ta_newspaper_recent_blog_category',
                'ta_newspaper_widgets_title' => esc_html__('Blog Category', 'ta-newspaper'),
                'ta_newspaper_widgets_field_type' => 'select',
                'ta_newspaper_widgets_field_options' => $ta_newspaper_cat_list,
            ),
            'ta_post_slide_layout' => array(
                'ta_newspaper_widgets_name' => 'ta_post_slide_layout',
                'ta_newspaper_widgets_title' => esc_html__('Post Slide Layout', 'ta-newspaper'),
                'ta_newspaper_widgets_field_type' => 'radio',
                'ta_newspaper_widgets_field_options' => $ta_newspaper_layout_array,
            ),
            'ta_newspaper_recent_blog_posts' => array(
                'ta_newspaper_widgets_name' => 'ta_newspaper_recent_blog_posts',
                'ta_newspaper_widgets_title' => esc_html__('Recent Blog Posts Number', 'ta-newspaper'),
                'ta_newspaper_widgets_field_type' => 'number',
            ),
        );

        return $fields;
    }

    /**
     * Front-end display of widget.
     *
     * @see WP_Widget::widget()
     *
     * @param array $args     Widget arguments.
     * @param array $instance Saved values from database.
     */
    public function widget($args, $instance) {
        extract($args);
        
        $ta_newspaper_title_widget = apply_filters( 'widget_title', empty( $instance['ta_newspaper_recent_blog_title'] ) ? '' : $instance['ta_newspaper_recent_blog_title'], $instance, $this->id_base );        
        $ta_post_slide_layout = isset( $instance['ta_post_slide_layout'] ) ? $instance['ta_post_slide_layout'] : '' ;
        $ta_newspaper_recent_blog_category = isset( $instance['ta_newspaper_recent_blog_category'] ) ? $instance['ta_newspaper_recent_blog_category'] : '' ;
        $ta_newspaper_recent_blog_posts = isset( $instance['ta_newspaper_recent_blog_posts'] ) ? $instance['ta_newspaper_recent_blog_posts'] : '' ;
        if($ta_newspaper_recent_blog_posts == ''){ $ta_newspaper_recent_blog_posts = '4'; }

        $ta_newspaper_recent_blog_args = array(
            'poat_type' => 'post',
            'order' => 'DESC',
            'posts_per_page' => $ta_newspaper_recent_blog_posts,
            'post_status' => 'publish',
            'category_name' => $ta_newspaper_recent_blog_category
        ); 
        $ta_newspaper_recent_blog_query = new WP_Query($ta_newspaper_recent_blog_args);

        echo $before_widget;
        ?>
            <div class="recent-blog-wrap">
                <div class="recent-blog-contents">
                    <?php
                    
                    if (!empty($ta_newspaper_title_widget)): ?>
                        <?php echo $args['before_title'] . esc_html($ta_newspaper_title_widget) . $args['after_title']; ?>
                    <?php endif;
                    if( $ta_newspaper_recent_blog_query->have_posts() ): 
                        if( $ta_post_slide_layout == 'layout-3' ){ ?>
                            
                            <div class="recent-blog-main-wrap-3">
                                <div class="recent-blog-loop-wrap-3">
                                    <?php $ta_newspaper_count_post = 1;
                                    
                                    while( $ta_newspaper_recent_blog_query->have_posts() ){
                                            $ta_newspaper_recent_blog_query->the_post();

                                            $ta_newspaper_recent_blog_image = wp_get_attachment_image_src(get_post_thumbnail_id(''),'ta-newspaper-related-post');
                                            if( $ta_newspaper_recent_blog_image ){
                                              $img_link = $ta_newspaper_recent_blog_image[0];
                                            }?>
                                                <div class="loop-posts-blog-recent clearfix">
                                                    <?php if( $ta_newspaper_count_post == 1 ){ ?>
                                                        <div class="recent-post-image layout-3">
                                                            <a href="<?php the_permalink(); ?>">
                                                                <img src="<?php echo esc_url($img_link); ?>" alt="<?php the_title_attribute(); ?>" title="<?php the_title_attribute(); ?>" />
                                                            </a>
                                                            <?php if( get_the_title() ){ ?>
                                                                <div class="wrap-meta-title">

                                                                    <div class="title-recent-post">
                                                                        <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></h4></a>
                                                                    </div>

                                                                    <div class="slider-entry-meta">
                                                                        <?php ta_newspaper_entry_meta(); ?>
                                                                    </div><!-- .entry-meta -->

                                                                </div>
                                                            <?php } ?>
                                                        </div>
                                                    <?php } ?>
                                                    
                                                    <?php if( get_the_title() ){ ?>
                                                        <div class="wrap-meta-title">

                                                            <div class="title-recent-post">
                                                                <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></h4></a>
                                                            </div>

                                                            <p><?php echo esc_html( wp_trim_words( get_the_content(),10,'...') ); ?></p>

                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            <?php
                                    $ta_newspaper_count_post ++; } ?>
                                </div>
                            </div>
                            
                        <?php }elseif( $ta_post_slide_layout == 'layout-2' ){ ?>

                            <div class="recent-blog-main-wrap">
                                <div class="owl-carousel recent-blog-loop-wrap-2">
                                    <?php $ta_newspaper_count_post = 1;
                                    
                                    while($ta_newspaper_recent_blog_query->have_posts()){
                                        $ta_newspaper_recent_blog_query->the_post();
                                        $ta_newspaper_slider_image = wp_get_attachment_image_src( get_post_thumbnail_id(),'ta-newspaper-slider-blog-list-image' );
                                            if( $ta_newspaper_slider_image[0] ){ ?>

                                                <div class="loop-slider-conents">
                                                    <div class="img-titl-contents">

                                                        <div class="slider-image">
                                                            <a href="<?php the_permalink(); ?>"><img src="<?php echo  esc_url($ta_newspaper_slider_image[0]); ?>" alt="<?php the_title_attribute(); ?>" title="<?php the_title_attribute(); ?>"/></a>
                                                        </div>

                                                        <div class="title-cat-date">

                                                            <?php ta_newspaper_post_category(); ?>

                                                            <?php if( get_the_title() ){
                                                                the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
                                                            } ?>

                                                            <div class="slider-entry-meta">
                                                                <?php ta_newspaper_entry_meta(); ?>
                                                            </div><!-- .entry-meta -->

                                                        </div>
                                                    </div>
                                                </div>

                                            <?php }
                                    $ta_newspaper_count_post ++; } ?>
                                </div>
                            </div>

                        <?php }else{ ?>

                            <div class="recent-blog-main-wrap">
                                <div class="recent-blog-loop-wrap">
                                    <?php $ta_newspaper_count_post = 1;
                                    
                                    while($ta_newspaper_recent_blog_query->have_posts()){
                                            $ta_newspaper_recent_blog_query->the_post();

                                            $ta_newspaper_recent_blog_image = wp_get_attachment_image_src(get_post_thumbnail_id(''),'ta-newspaper-sidebar-recent-post-image');
                                            if( $ta_newspaper_recent_blog_image ){
                                              $img_link = $ta_newspaper_recent_blog_image[0];
                                            }else{
                                              $img_link = get_template_directory_uri().'/images/fallback-image/150X130.jpg';
                                            } ?>
                                                <div class="loop-posts-blog-recent clearfix">
                                                
                                                    <div class="recent-post-image">
                                                        <a href="<?php the_permalink(); ?>">
                                                            <img src="<?php echo esc_url( $img_link ); ?>" alt="<?php the_title_attribute(); ?>" title="<?php the_title_attribute(); ?>" />
                                                        </a>
                                                    </div>
                                                    
                                                    <?php if(get_the_title()){ ?>
                                                        <div class="wrap-meta-title">

                                                            <div class="title-recent-post">
                                                                <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></h4></a>
                                                            </div>

                                                            <p><?php echo esc_html( wp_trim_words( get_the_content(),10,'...') ); ?></p>

                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            <?php
                                    $ta_newspaper_count_post ++; } ?>
                                </div>
                            </div>

                        <?php }
                    wp_reset_postdata();endif; ?>
                    
                    
                </div>
            </div>
        <?php
        echo $after_widget;
    }

    /**
     * Sanitize widget form values as they are saved.
     *
     * @see WP_Widget::update()
     *
     * @param	array	$new_instance	Values just sent to be saved.
     * @param	array	$old_instance	Previously saved values from database.
     *
     * @uses	ta_newspaper_widgets_updated_field_value()		defined in widget-fields.php
     *
     * @return	array Updated safe values to be saved.
     */
    public function update($new_instance, $old_instance) {
        $instance = $old_instance;

        $widget_fields = $this->widget_fields();

        // Loop through fields
        foreach ($widget_fields as $widget_field) {

            extract($widget_field);

            // Use helper function to get updated field values
            $instance[$ta_newspaper_widgets_name] = ta_newspaper_widgets_updated_field_value($widget_field, $new_instance[$ta_newspaper_widgets_name]);
        }

        return $instance;
    }

    /**
     * Back-end widget form.
     *
     * @see WP_Widget::form()
     *
     * @param	array $instance Previously saved values from database.
     *
     * @uses	ta_newspaper_widgets_show_widget_field()		defined in widget-fields.php
     */
    public function form($instance) {
        $widget_fields = $this->widget_fields();

        // Loop through fields
        foreach ($widget_fields as $widget_field) {

            // Make array elements available as variables
            extract($widget_field);
            $ta_newspaper_widgets_field_value = !empty($instance[$ta_newspaper_widgets_name]) ? esc_attr($instance[$ta_newspaper_widgets_name]) : '';
            ta_newspaper_widgets_show_widget_field($this, $widget_field, $ta_newspaper_widgets_field_value);
        }
    }

}
