<?php
/**
 * @package TA Newspaper
 */

add_action('widgets_init', 'ta_newspaper_blog_register');

function ta_newspaper_blog_register() {
    register_widget('TA_Newspaper_Blog_Widget');
}

class TA_Newspaper_Blog_Widget extends WP_Widget {

    public function __construct() {
        parent::__construct(
                'TA_Newspaper_Blog_Widget', esc_html__('TA : Home Blog List', 'ta-newspaper'), array(
                'description' => esc_html__('This Widget show Blogs', 'ta-newspaper')
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
            'tan_blog_category' => array(
                'ta_newspaper_widgets_name' => 'tan_blog_category',
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
            'tan_blog_posts' => array(
                'ta_newspaper_widgets_name' => 'tan_blog_posts',
                'ta_newspaper_widgets_title' => esc_html__('Blog Posts Number', 'ta-newspaper'),
                'ta_newspaper_widgets_field_type' => 'number',
            ),
            'tan_blog_posts_excerpt' => array(
                'ta_newspaper_widgets_name' => 'tan_blog_posts_excerpt',
                'ta_newspaper_widgets_title' => esc_html__('Exerpt Content', 'ta-newspaper'),
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
        $tan_blog_category = isset( $instance['tan_blog_category'] ) ? $instance['tan_blog_category'] : '' ;
        $tan_blog_posts_excerpt = isset( $instance['tan_blog_posts_excerpt'] ) ? $instance['tan_blog_posts_excerpt'] : '50' ;
        $tan_blog_posts = isset( $instance['tan_blog_posts'] ) ? $instance['tan_blog_posts'] : '' ; ?>

        <?php
        $tan_blog_args = array(
            'poat_type' => 'post',
            'order' => 'DESC',
            'posts_per_page' => $tan_blog_posts,
            'post_status' => 'publish',
            'category_name' => $tan_blog_category
        ); 
        $tan_blog_query = new WP_Query($tan_blog_args);

        echo $before_widget;  ?>

        <div class="blog-wrap">
            <div class="blog-contents">

                <?php if (!empty($tan_title_widget)): ?>
                    <div class="home-widget-title">
                        <?php echo $args['before_title'] . esc_html($tan_title_widget) . $args['after_title']; ?>
                        </div>
                <?php endif;

                if($tan_blog_query->have_posts()):
                    if( $ta_post_slide_layout == 'layout-3' ){ ?>
                        <div class="blog-main-wrap clearfix">
                            <div class="blog-loop-wrap">
                                <?php $tan_count_post = 1;
                                
                                while($tan_blog_query->have_posts()){
                                        $tan_blog_query->the_post();
                                        $tan_blog_image = wp_get_attachment_image_src(get_post_thumbnail_id(),'ta-newspaper-blog-list-3'); ?>

                                    <div class="tab-simple-blog-list-3">
                                        <div class="tab-simple-blog-3 clearfix">
                                            <div class="tab-sb-image-3 ta-post-formate">

                                                <?php if( $tan_blog_image[0] ){ ?>
                                                <img src="<?php echo esc_url($tan_blog_image[0]); ?>" alt="<?php the_title_attribute(); ?>" title="<?php the_title_attribute(); ?>">
                                                <?php }else{
                                                $img_link = get_template_directory_uri().'/images/fallback-image/550X450.jpg'; ?>
                                                <img src="<?php echo esc_url($img_link); ?>" alt="<?php the_title_attribute(); ?>" title="<?php the_title_attribute(); ?>">
                                                <?php } ?>

                                                <?php ta_newspaper_post_formate(); ?>
                                                
                                            </div>
                                            <div class="tab-sb-content-3">

                                                <?php ta_newspaper_post_category(); ?>

                                                <?php
                                                the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );

                                                $author = true;
                                                $date = true;
                                                $comment_meta = false;
                                                ta_newspaper_entry_meta($author,$date,$comment_meta);

                                                if( has_excerpt() ){
                                                        
                                                    the_excerpt();

                                                }else{ ?>
                                                
                                                    <p><?php echo esc_html( wp_trim_words( get_the_content(),$tan_blog_posts_excerpt,'...') ); ?></p>
                                                
                                                <?php
                                                } ?>

                                            </div>
                                        </div>
                                    </div>

                                <?php $tan_count_post ++; } ?>
                            </div>
                        </div>
                    <?php }elseif( $ta_post_slide_layout == 'layout-2' ){ ?>
                        <div class="blog-main-wrap clearfix">
                            <div class="blog-loop-wrap">
                                <?php $tan_count_post = 1;
                                
                                while($tan_blog_query->have_posts()){
                                    $tan_blog_query->the_post();
                                    $tan_blog_image = wp_get_attachment_image_src(get_post_thumbnail_id(),'ta-newspaper-related-post'); ?>

                                    <div class="tab-simple-blog-list">
                                        <div class="tab-simple-blog clearfix">
                                            <div class="tab-sb-image ta-post-formate">

                                                <?php if( $tan_blog_image[0] ){ ?>
                                                <img src="<?php echo esc_url($tan_blog_image[0]); ?>" alt="<?php the_title_attribute(); ?>" title="<?php the_title_attribute(); ?>">
                                                <?php }else{
                                                $img_link = get_template_directory_uri().'/images/fallback-image/550X450.jpg'; ?>
                                                <img src="<?php echo esc_url($img_link); ?>" alt="<?php the_title_attribute(); ?>" title="<?php the_title_attribute(); ?>">
                                                <?php } ?>

                                                <?php ta_newspaper_post_formate(); ?>
                                                
                                            </div>
                                            <div class="tab-sb-content">

                                                <?php ta_newspaper_post_category(); ?>

                                                <?php
                                                the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );

                                                $author = true;
                                                $date = true;
                                                $comment_meta = false;
                                                ta_newspaper_entry_meta($author,$date,$comment_meta);

                                                if( has_excerpt() ){
                                                
                                                    the_excerpt();

                                                }else{ ?>
                                                
                                                    <p><?php echo esc_html( wp_trim_words( get_the_content(),$tan_blog_posts_excerpt,'...') ); ?></p>
                                                
                                                <?php
                                                } ?>

                                            </div>
                                        </div>
                                    </div>

                                    <?php $tan_count_post ++; } ?>
                            </div>
                        </div>
                    <?php }else{ ?>
                        <div class="blog-main-wrap-1 clearfix">
                            <div class="blog-loop-wrap-1">
                                <?php $tan_count_post = 1;
                                
                                while($tan_blog_query->have_posts()){
                                        $tan_blog_query->the_post();
                                        $tan_blog_image = wp_get_attachment_image_src(get_post_thumbnail_id(),'ta-newspaper-single-page'); ?>

                                            <div class="tab-simple-blog-list-1">
                                                <div class="tab-simple-blog-1 clearfix">
                                                    <div class="tab-sb-image-1 ta-post-formate">

                                                        <?php if( $tan_blog_image[0] ){ ?>
                                                        <img src="<?php echo esc_url($tan_blog_image[0]); ?>" alt="<?php the_title_attribute(); ?>" title="<?php the_title_attribute(); ?>">
                                                        <?php }else{
                                                        $img_link = get_template_directory_uri().'/images/fallback-image/550X450.jpg'; ?>
                                                        <img src="<?php echo esc_url($img_link); ?>" alt="<?php the_title_attribute(); ?>" title="<?php the_title_attribute(); ?>">
                                                        <?php } ?>
                                                        
                                                        <?php ta_newspaper_post_formate(); ?>

                                                    </div>
                                                    <div class="tab-sb-content-1">

                                                        <?php ta_newspaper_post_category(); ?>
                                                        
                                                        <?php
                                                        the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );

                                                        $author = true;
                                                        $date = true;
                                                        $comment_meta = false;
                                                        ta_newspaper_entry_meta($author,$date,$comment_meta);

                                                        if( has_excerpt() ){
                                                        
                                                            the_excerpt();

                                                        }else{ ?>
                                                        
                                                            <p><?php echo esc_html( wp_trim_words( get_the_content(),$tan_blog_posts_excerpt,'...') ); ?></p>
                                                        
                                                        <?php
                                                        } ?>

                                                        <a class="read-more" href="<?php the_permalink() ?>"><?php esc_html_e('Read More','ta-newspaper'); ?><i class="fa fa-angle-right " aria-hidden="true"></i></a>

                                                    </div>
                                                </div>
                                            </div>

                                        <?php $tan_count_post ++; } ?>
                            </div>
                        </div>
                    <?php }
                wp_reset_postdata();endif; ?>
                
            </div>
        </div>

        <?php echo $after_widget;
    }

    /**
     * Sanitize widget form values as they are saved.
     *
     * @see WP_Widget::update()
     *
     * @param   array   $new_instance   Values just sent to be saved.
     * @param   array   $old_instance   Previously saved values from database.
     *
     * @uses    ta_newspaper_widgets_updated_field_value()        defined in widget-fields.php
     *
     * @return  array Updated safe values to be saved.
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
     * @param   array $instance Previously saved values from database.
     *
     * @uses    ta_newspaper_widgets_show_widget_field()      defined in widget-fields.php
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
