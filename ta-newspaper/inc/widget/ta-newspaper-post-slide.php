<?php
/**
 * @package TA Newspaper
 */

add_action('widgets_init', 'ta_newspaper_post_slide_register');

function ta_newspaper_post_slide_register() {
    register_widget('TA_Newspaper_Post_Slide_Widget');
}

class TA_Newspaper_Post_Slide_Widget extends WP_Widget {

    public function __construct() {
        parent::__construct(
                'TA_Newspaper_Post_Slide_Widget', esc_html__('TA : Home Post Slide', 'ta-newspaper'), array(
                'description' => esc_html__('This Widget show Single Post Slide', 'ta-newspaper')
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
            'tan_blog_title' => array(
                'ta_newspaper_widgets_name' => 'tan_blog_title',
                'ta_newspaper_widgets_title' => esc_html__('Title', 'ta-newspaper'),
                'ta_newspaper_widgets_field_type' => 'text',
            ),
            'ta_post_slide_category' => array(
                'ta_newspaper_widgets_name' => 'ta_post_slide_category',
                'ta_newspaper_widgets_title' => esc_html__('Post Slide Category', 'ta-newspaper'),
                'ta_newspaper_widgets_field_type' => 'select',
                'ta_newspaper_widgets_field_options' => $ta_newspaper_cat_list,
            ),
            'ta_post_slide_layout' => array(
                'ta_newspaper_widgets_name' => 'ta_post_slide_layout',
                'ta_newspaper_widgets_title' => esc_html__('Post Slide Layout', 'ta-newspaper'),
                'ta_newspaper_widgets_field_type' => 'radio',
                'ta_newspaper_widgets_field_options' => $ta_newspaper_layout_array,
            ),
            'ta_blog_posts' => array(
                'ta_newspaper_widgets_name' => 'ta_blog_posts',
                'ta_newspaper_widgets_title' => esc_html__('Blog Posts Number', 'ta-newspaper'),
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
        
        $tan_title_widget = apply_filters( 'widget_title', empty( $instance['tan_blog_title'] ) ? '' : $instance['tan_blog_title'], $instance, $this->id_base );
        $ta_post_slide_layout = isset( $instance['ta_post_slide_layout'] ) ? $instance['ta_post_slide_layout'] : '' ;
        $ta_post_slide_category = isset( $instance['ta_post_slide_category'] ) ? $instance['ta_post_slide_category'] : '' ;
        $ta_blog_posts = isset( $instance['ta_blog_posts'] ) ? $instance['ta_blog_posts'] : '' ;
        if($ta_blog_posts == ''){ $ta_blog_layout = '-1'; }
                
        $ta_post_slider_args = array(
            'poat_type' => 'post',
            'order' => 'DESC',
            'posts_per_page' => $ta_blog_posts,
            'post_status' => 'publish',
            'category_name' => $ta_post_slide_category
        ); 
        $ta_post_slide_query = new WP_Query($ta_post_slider_args);

        echo $before_widget;
        if (!empty($tan_title_widget)): ?>
            <div class="home-widget-title <?php if( $ta_post_slide_layout == 'layout-3'){echo "no-margin-title"; } ?>">     <?php echo $args['before_title'] . esc_html($tan_title_widget) . $args['after_title']; ?>
            </div>
        <?php endif; ?>

        <div class="slide-post-wrap">
            <div class="slide-post-contents">
                <?php
                if( $ta_post_slide_query->have_posts() ):
                    if( $ta_post_slide_layout == 'layout-3' ){ ?>

                        <div class="main-slider-wrap clearfix">
                            <div class="tan-container">
                                <div class="slide-feature-post-wrap">

                                    <div class="tan-slider-wrap">
                                        <div class="owl-carousel slider-all-contents-3-slide-post">
                                            <?php while( $ta_post_slide_query->have_posts() ){
                                                $ta_post_slide_query->the_post();
                                                $ta_newspaper_slider_image = wp_get_attachment_image_src( get_post_thumbnail_id(),'ta-newspaper-slider-img' );
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

                                                <?php } ?>

                                            <?php } ?>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                    <?php }elseif( $ta_post_slide_layout == 'layout-2' ){ ?>

                        <div class="owl-carousel post-slider-contents-2">
                            <?php while($ta_post_slide_query->have_posts()){
                                $ta_post_slide_query->the_post();

                                $ta_newspaper_slider_image = wp_get_attachment_image_src(get_post_thumbnail_id(),'ta-newspaper-slide-post-2'); 
                                if( $ta_newspaper_slider_image ){
                                  $img_link = $ta_newspaper_slider_image[0];
                                }else{
                                  $img_link = get_template_directory_uri().'/images/fallback-image/560X350.jpg';
                                } ?>
                                    
                                <div class="tan-post-slide-row">

                                    <div class="tan-ps-image-2">
                                        <img src="<?php echo  esc_url( $img_link ); ?>" alt="<?php the_title_attribute(); ?>" title="<?php the_title_attribute(); ?>"/>
                                    </div>

                                    <div class="tan-ps-content-2">
                                        
                                        <?php ta_newspaper_post_category();

                                        the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>

                                        <div class="slider-entry-meta">
                                            <?php ta_newspaper_entry_meta(); ?>
                                        </div><!-- .entry-meta -->

                                        <a class="read-more" href="<?php the_permalink() ?>">
                                            <?php esc_html_e('Read More','ta-newspaper'); ?><i class="fa fa-angle-right " aria-hidden="true"></i>
                                        </a>
                                        
                                    </div>
                                    
                                </div>
                            <?php } ?>
                        </div>

                    <?php }else{ ?>

                        <div class="owl-carousel post-slider-contents">
                            <?php while($ta_post_slide_query->have_posts()){
                                $ta_post_slide_query->the_post();

                                $ta_newspaper_slider_image = wp_get_attachment_image_src(get_post_thumbnail_id(),'ta-newspaper-slide-post-image'); 
                                if( $ta_newspaper_slider_image ){
                                  $img_link = $ta_newspaper_slider_image[0];
                                }else{
                                  $img_link = get_template_directory_uri().'/images/fallback-image/560X350.jpg';
                                } ?>
                                    
                                <div class="tan-post-slide-raw tan-display-flex">

                                    <div class="tan-ps-content">
                                        
                                        <?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );

                                        ta_newspaper_post_category();

                                        the_excerpt();?>

                                        <a class="read-more" href="<?php the_permalink() ?>">
                                            <?php esc_html_e('Read More','ta-newspaper'); ?><i class="fa fa-angle-right " aria-hidden="true"></i>
                                        </a>
                                        
                                    </div>

                                    <div class="tan-ps-image">
                                        <img src="<?php echo  esc_url( $img_link ); ?>" alt="<?php the_title_attribute(); ?>" title="<?php the_title_attribute(); ?>"/>
                                    </div>
                                    
                                </div>
                            <?php } ?>
                        </div>

                    <?php }
                wp_reset_postdata();
                endif; ?>
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
