<?php
/**
 * Create a metabox to added some custom filed in posts.
 *
 * @package TA Newspaper
 */

 add_action( 'add_meta_boxes', 'ta_newspaper_post_meta_options' );
 
 if( ! function_exists( 'ta_newspaper_post_meta_options' ) ):
 function  ta_newspaper_post_meta_options() {
    add_meta_box(
                'ta_newspaper_post_meta',
                esc_html__( 'Post Options', 'ta-newspaper' ),
                'ta_newspaper_post_meta_callback',
                'post', 
                'normal', 
                'high'
            );
            add_meta_box(
                'ta_newspaper_page_meta',
                esc_html__( 'Sidebar', 'ta-newspaper' ),
                'ta_newspaper_post_meta_callback',
                'page',
                'normal', 
                'high'
            ); 
 }
 endif;

 $ta_newspaper_post_sidebar_options = array(
        'left-sidebar' => array(
                        'id'        => 'post-right-sidebar',
                        'value'     => 'left_sidebar',
                        'label'     => esc_html__( 'Left sidebar', 'ta-newspaper' ),
                        'thumbnail' => get_template_directory_uri() . '/images/left-sidebar.png'
                    ), 
        'right-sidebar' => array(
                        'id'        => 'post-left-sidebar',
                        'value' => 'right_sidebar',
                        'label' => esc_html__( 'Right sidebar', 'ta-newspaper' ),
                        'thumbnail' => get_template_directory_uri() . '/images/right-sidebar.png'
                    ),
        'no-sidebar' => array(
                        'id'        => 'post-no-sidebar',
                        'value'     => 'no_sidebar',
                        'label'     => esc_html__( 'No sidebar', 'ta-newspaper' ),
                        'thumbnail' => get_template_directory_uri() . '/images/no-sidebar.png'
                    ),        
        'both-sidebar' => array(
                        'id'        => 'both-sidebar',
                        'value'     => 'both_sidebar',
                        'label'     => esc_html__( 'Both sidebar', 'ta-newspaper' ),
                        'thumbnail' => get_template_directory_uri() . '/images/both-sidebar.png'
                    )
    );

/**
 * Callback function for post option
 */
if( ! function_exists( 'ta_newspaper_post_meta_callback' ) ):
    function ta_newspaper_post_meta_callback() {
        global $post, $ta_newspaper_post_sidebar_options;
        wp_nonce_field( basename( __FILE__ ), 'ta_newspaper_post_meta_nonce' );
?>
        <table class="form-table">
<tr>
    <td colspan="4"><em class="f13"><?php esc_html_e('Choose Sidebar Template','ta-newspaper'); ?></em></td>
</tr>

<tr>
    <td>
    <?php  
       foreach ($ta_newspaper_post_sidebar_options as $ta_newspaper_post_sidebar_option) {
        
                    $ta_newspaper_post_sidebar = get_post_meta( $post->ID, 'ta_newspaper_post_sidebar_layout', true ); ?>
    
                    <div class="radio-image-wrapper" style="float:left; margin-right:30px;">
                        <label class="description">
                            <span><img src="<?php echo esc_url( $ta_newspaper_post_sidebar_option['thumbnail'] ); ?>" alt="" /></span></br>
                            <input type="radio" name="ta_newspaper_post_sidebar_layout" value="<?php echo esc_html( $ta_newspaper_post_sidebar_option['value'] ); ?>" <?php checked( $ta_newspaper_post_sidebar_option['value'], $ta_newspaper_post_sidebar ); if( empty( $ta_newspaper_post_sidebar ) && $ta_newspaper_post_sidebar_option['value']=='right-sidebar' ){ echo "checked='checked'"; } ?>/>&nbsp;<?php echo esc_html( $ta_newspaper_post_sidebar_option['label'] ); ?>
                        </label>
                    </div>
                    <?php } // end foreach 
                    ?>
                    <div class="clear"></div>
    </td>
</tr>
</table>
<?php       
    }
endif;

/*--------------------------------------------------------------------------------------------------------------*/
/**
 * Function for save value of meta opitons
 *
 * @since 1.0.0
 */
add_action( 'save_post', 'ta_newspaper_save_post_meta' );

if( ! function_exists( 'ta_newspaper_save_post_meta' ) ):

function ta_newspaper_save_post_meta( $post_id ) {

    global $post, $ta_newspaper_post_sidebar_options;

    // Verify the nonce before proceeding.
    if ( !isset( $_POST[ 'ta_newspaper_post_meta_nonce' ] ) || !wp_verify_nonce( wp_unslash($_POST['ta_newspaper_post_meta_nonce'] ), basename( __FILE__ ) ) )
        return;

    // Stop WP from clearing custom fields on autosave
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )  
        return;
        
    if ('page' == $_POST['post_type']) {  
        if (!current_user_can( 'edit_page', $post_id ) )  
            return $post_id;  
    } elseif (!current_user_can( 'edit_post', $post_id ) ) {  
            return $post_id;  
    }

    /*Page sidebar*/
    foreach ( $ta_newspaper_post_sidebar_options as $field ) {  
        //Execute this saving function
        $old = get_post_meta( $post_id, 'ta_newspaper_post_sidebar_layout', true ); 
        $new = sanitize_text_field( wp_unslash( $_POST['ta_newspaper_post_sidebar_layout'] ));
        if ( $new && $new != $old ) {  
            update_post_meta ( $post_id, 'ta_newspaper_post_sidebar_layout', $new );  
        } elseif ( '' == $new && $old ) {  
            delete_post_meta( $post_id,'ta_newspaper_post_sidebar_layout', $old );  
        }
    } // end foreach
}
endif;  