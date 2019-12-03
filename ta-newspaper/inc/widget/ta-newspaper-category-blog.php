<?php
/**
 * @package TA Newspaper
 */

add_action('widgets_init', 'ta_newspaper_blog_category_register');

function ta_newspaper_blog_category_register() {
    register_widget('TA_Newspaper_Blog_Category_Widget');
}

class TA_Newspaper_Blog_Category_Widget extends WP_Widget {

    public function __construct() {
        parent::__construct(
                'TA_Newspaper_Blog_Category_Widget', esc_html__('TA : Home Category Blog', 'ta-newspaper'), array(
                'description' => esc_html__('This Widget show Category Blogs', 'ta-newspaper')
                )
        );
    }

    /**
     * Helper function that holds widget fields
     * Array is used in update and form functions
     */
    private function widget_fields() {
        $ta_newspaper_cat_list = ta_newspaper_Category_list_2();
        $fields = array(
            'ta_newspaper_blog_cat_category' => array(
                  'ta_newspaper_widgets_name' => 'ta_newspaper_blog_cat_category',
                  'ta_newspaper_widgets_title' => esc_html__('Select Category', 'ta-newspaper'),
                  'ta_newspaper_widgets_field_type' => 'multicheckboxes',
                  'ta_newspaper_widgets_field_options' => $ta_newspaper_cat_list
              ),
            'ta_newspaper_blog_posts' => array(
                'ta_newspaper_widgets_name' => 'ta_newspaper_blog_posts',
                'ta_newspaper_widgets_title' => esc_html__('Posts Per Section', 'ta-newspaper'),
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
               
        $ta_newspaper_blog_cat_category = isset( $instance['ta_newspaper_blog_cat_category'] ) ? $instance['ta_newspaper_blog_cat_category'] : '' ;
        $ta_newspaper_blog_posts = isset( $instance['ta_newspaper_blog_posts'] ) ? $instance['ta_newspaper_blog_posts'] : '' ;
        if($ta_newspaper_blog_posts == ''){ $ta_newspaper_blog_posts = '5'; }
        
        echo $before_widget;
        if( $ta_newspaper_blog_cat_category ){ ?>
          <div class="multiple-cat-main-wrap clearfix">
          <?php
            foreach($ta_newspaper_blog_cat_category as $cat_slug => $ta_newspaper_blog_cat){ 
              $cat_attr = get_category_by_slug( $cat_slug ); ?>
              <div class="main-multiple-cat-wrap">

              
                <div class="posts-cat-title">
                  <h2><?php echo esc_html( $cat_attr->cat_name ); ?></h2>
                </div>

                <?php $ta_newspaper_blog_cat_category_query = new WP_Query(
                    array(
                      'poat_type' => 'post',
                      'order' => 'DESC',
                      'posts_per_page' => $ta_newspaper_blog_posts,
                      'post_status' => 'publish',
                      'category_name' => $cat_slug
                    )
                  );

                if( $ta_newspaper_blog_cat_category_query->have_posts()){ ?>
                  <div class="fc-multiple-cat-posts">
                    <?php
                    $fc_blog_post_count = 1;
                    while( $ta_newspaper_blog_cat_category_query->have_posts()){

                      $ta_newspaper_blog_cat_category_query->the_post();
                      if($fc_blog_post_count != 1){

                        $image_multiple_img = wp_get_attachment_image_src( get_post_thumbnail_id(),'ta-newspaper-sidebar-recent-post-image' ); ?>
                        <div class="multipal-cat-post clearfix">
                          <div class="multipal-post-image">
                            <?php if( $image_multiple_img[0] ){ ?>
                              <img src="<?php echo esc_url($image_multiple_img[0]); ?>" alt="<?php the_title_attribute(); ?>" title="<?php the_title_attribute(); ?>">
                            <?php }else{
                              $img_link = get_template_directory_uri().'/images/fallback-image/150X130.jpg'; ?>
                              <img src="<?php echo esc_url( $img_link ); ?>" alt="<?php the_title_attribute(); ?>" title="<?php the_title_attribute(); ?>">
                            <?php } ?>
                            
                          </div>
                          <div class="multiple-post-content">
                            <?php 
                            the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );

                            $author = true;
                            $date = true;
                            $comment_meta = false;
                            ta_newspaper_entry_meta($author,$date,$comment_meta); ?>

                          </div>
                        </div>

                      <?php
                      }else{

                        $first_image_multiple_posts = wp_get_attachment_image_src( get_post_thumbnail_id(),'ta-newspaper-first-multiple-cat-post' ); ?>
                        <div class="first-multipal-cat-post">
                          
                          <div class="first-multipal-post-image ta-post-formate">

                            <?php if( $first_image_multiple_posts[0] ){ ?>
                            <img src="<?php echo esc_url($first_image_multiple_posts[0]); ?>" alt="<?php the_title_attribute(); ?>" title="<?php the_title_attribute(); ?>">
                            <?php }else{
                            $img_link = get_template_directory_uri().'/images/fallback-image/400X300.jpg'; ?>
                            <img src="<?php echo esc_url( $img_link ); ?>" alt="<?php the_title_attribute(); ?>" title="<?php the_title_attribute(); ?>">
                            <?php } ?>

                            <?php ta_newspaper_post_formate(); ?>
                              
                          </div>

                          <div class="first-multiple-post-content">
                            <?php
                            ta_newspaper_post_category();
                            
                            the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );

                            $author = true;
                            $date = true;
                            $comment_meta = false;
                            ta_newspaper_entry_meta($author,$date,$comment_meta); ?>
                            
                          </div>

                        </div>

                      <?php }

                    $fc_blog_post_count++;
                  } ?>

                  </div>

                <?php } ?>

              </div>
            <?php
            }?>
          </div>
        <?php
        }
        echo $after_widget;
    }
    
    
    public function update($new_instance, $old_instance) {
          $instance = $old_instance;
          $widget_fields = $this->widget_fields();
          foreach ($widget_fields as $widget_field) {
              extract($widget_field);
              $instance[$ta_newspaper_widgets_name] = ta_newspaper_widgets_updated_field_value($widget_field, $new_instance[$ta_newspaper_widgets_name]);
          }
          return $instance;
      }

      public function form($instance) {
          $widget_fields = $this->widget_fields();
          foreach ($widget_fields as $widget_field) {
              extract($widget_field);
              $ta_newspaper_widgets_field_value = !empty($instance[$ta_newspaper_widgets_name]) ? $instance[$ta_newspaper_widgets_name] : '';
              ta_newspaper_widgets_show_widget_field($this, $widget_field, $ta_newspaper_widgets_field_value);
          }
      }

}
