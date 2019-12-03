<?php
/**
 * @package TA Newspaper
 */

add_action('widgets_init', 'ta_newspaper_post_category_register');

function ta_newspaper_post_category_register() {
    register_widget('TA_Newspaper_Post_Category_Widget');
}

class TA_Newspaper_Post_Category_Widget extends WP_Widget {

    public function __construct() {
        parent::__construct(
                'TA_Newspaper_Post_Category_Widget', esc_html__('TA : Post Category', 'ta-newspaper'), array(
                'description' => esc_html__('This Widget show Post Category Profile', 'ta-newspaper')
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
     
         $ta_newspaper_blog_cat_categorys = isset( $instance['ta_newspaper_blog_cat_category'] ) ? $instance['ta_newspaper_blog_cat_category'] : '' ;

        echo $before_widget;
        if( $ta_newspaper_blog_cat_categorys ){ ?>
            <div class="ta-post-category">

                <div class="ta-secondary-post-cat clearfix">
                    
                    <?php foreach( $ta_newspaper_blog_cat_categorys as $cat_slug => $ta_newspaper_blog_cat_category ){ 
                        $cat_attr = get_category_by_slug( $cat_slug );

                        $term_name = $cat_attr->name;
                        $term_desc = $cat_attr->description;
                        $term_id = $cat_attr->term_id;
                        if( function_exists('z_taxonomy_image_url' ) ){
                            $image = z_taxonomy_image_url($term_id);
                        }
                        $cat_link = get_category_link( $term_id );

                    ?>
                    <div class="cat-image-content-loop">
                        <?php if( function_exists('z_taxonomy_image_url' ) && $image ){ ?>
                            <div class="pc-img-wraper"><img src="<?php echo esc_url($image); ?>"></div>
                        <?php } ?>
                        <div class="pc-title-desc">
                            <?php if( $term_name ){ ?>
                                <h4><a href="<?php echo esc_url( $cat_link ); ?>"><?php echo esc_html( $term_name ); ?></a></h4>
                            <?php } ?>
                            <?php if( $term_desc ){ ?>
                                <p><?php echo esc_html( $term_desc ); ?></p>
                            <?php } ?>
                        </div>
                    </div>
                        
                    <?php } ?>

                </div>

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
