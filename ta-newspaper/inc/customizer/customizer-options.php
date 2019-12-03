<?php
/** Customizer Options
 */
 add_action('customize_register','ta_newspaper_customizer_options');
 function ta_newspaper_customizer_options($wp_customize){
    $ta_newspaper_Category_list = ta_newspaper_Category_list();
    $ta_newspaper_post_lists = ta_newspaper_post_lists();
    
    $wp_customize->get_section( 'title_tagline' )->panel = 'ta_newspaper_header_panel';
    $wp_customize->get_section( 'header_image' )->panel = 'ta_newspaper_header_panel';
    
    /** Header Image Link **/
    $wp_customize->add_setting(
        'ta_newspaper_header_image_link',
        array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw'
        )
    );
    $wp_customize->add_control(
    'ta_newspaper_header_image_link',
        array(
            'label' => esc_html__('Header Image Link','ta-newspaper'),
            'priority' => 20,
            'type' => 'text',
            'section' => 'header_image'
        )
    );
    
    /** Header Pannel */
	$wp_customize->add_panel(
        'ta_newspaper_header_panel', 
    	array(
    		'priority'       => 4,
        	'capability'     => 'edit_theme_options',
        	'theme_supports' => '',
        	'title'          => esc_html__( 'Header Settings', 'ta-newspaper' ),
        ) 
    );
    
    /** General Pannel */
	$wp_customize->add_panel(
        'ta_newspaper_general_panel', 
    	array(
    		'priority'       => 5,
        	'capability'     => 'edit_theme_options',
        	'theme_supports' => '',
        	'title'          => esc_html__( 'General Settings', 'ta-newspaper' ),
        ) 
    );
    
    /** Home Pannel */
	$wp_customize->add_panel(
        'ta_newspaper_home_panel', 
    	array(
    		'priority'       => 5,
        	'capability'     => 'edit_theme_options',
        	'theme_supports' => '',
        	'title'          => esc_html__( 'Front Page Settings', 'ta-newspaper' ),
        ) 
    );
    
    /** Layout Pannel */
    $wp_customize->add_panel(
        'ta_newspaper_layout_setting', 
        array(
            'priority'       => 5,
            'capability'     => 'edit_theme_options',
            'theme_supports' => '',
            'title'          => esc_html__( 'Theme Options', 'ta-newspaper' ),
        ) 
    );
    
    /** Banner Section **/
    $wp_customize->add_section(
        'ta_newspaper_home_banner_section',
        array(
            'title'		=> esc_html__( 'Banner Settings', 'ta-newspaper' ),
            'panel'     => 'ta_newspaper_home_panel',
            'priority'  => 15,
        )
    );

    $wp_customize->add_setting(
        'ta_newspaper_banner_enable_disable',
        array(
            'default' => 'disable',
            'sanitize_callback' => 'ta_newspaper_sanitize_enable_disable',
            )
    );
    $wp_customize->add_control( new ta_newspaper_Customize_Switch_Control(
        $wp_customize, 
        'ta_newspaper_banner_enable_disable', 
        array(
            'type' 		=> 'switch',
            'label' 	=> esc_html__( 'Enable / Disable Banner', 'ta-newspaper' ),
            'description' 	=> esc_html__( 'Home Page Header Banner', 'ta-newspaper' ),
            'section' 	=> 'ta_newspaper_home_banner_section',
            'choices'   => array(
                'enable' 	=> esc_html__( 'Enable', 'ta-newspaper' ),
                'disable' 	=> esc_html__( 'Disable', 'ta-newspaper' )
                ),
            'priority'  => 4,
        )
        )
    );
    
    $wp_customize->add_setting(
        'ta_newspaper_slider_cat',
        array(
            'default' => '',
            'sanitize_callback' => 'ta_newspaper_sanitize_post_cat_list',
        )
    );
    $wp_customize->add_control(
        'ta_newspaper_slider_cat',
        array(
            'label' => esc_html__('Slider Category','ta-newspaper'),
            'priority' => 6,
            'type' => 'select',
            'choices' => $ta_newspaper_Category_list,
            'section' => 'ta_newspaper_home_banner_section'
        )
    );

    $wp_customize->add_setting(
        'ta_newspaper_slider_layout',
        array(
            'default' => 'layout-1',
            'sanitize_callback' => 'ta_newspaper_sanitize_slider_layout'
        )
    );
    $wp_customize->add_control(
        new TA_Newspaper_Custom_Radio_Image_Control( 
            $wp_customize,
            'ta_newspaper_slider_layout',
            array(
                'settings'      => 'ta_newspaper_slider_layout',
                'section'       => 'ta_newspaper_home_banner_section',
                'label'         => esc_html__( 'Slider Layout', 'ta-newspaper' ),
                'priority'  => 6,
                'choices'       => array(
                    'layout-1'  => get_template_directory_uri() . '/images/slider-1.png',
                    'layout-2'  => get_template_directory_uri() . '/images/slider-2.png',
                    'layout-3'  => get_template_directory_uri() . '/images/slider-3.png',
                )
            )
        )
    );

    $wp_customize->add_setting(
        'ta_newspaper_slider_feature_post_1',
        array(
            'default' => '',
            'sanitize_callback' => 'ta_newspaper_sanitize_post_list',
        )
    );
    $wp_customize->add_control(
        'ta_newspaper_slider_feature_post_1',
        array(
            'label' => esc_html__('Slider Feature Post 1','ta-newspaper'),
            'priority' => 6,
            'type' => 'select',
            'choices' => $ta_newspaper_post_lists,
            'section' => 'ta_newspaper_home_banner_section',
            'active_callback' => 'ta_newspaper_slider_feature_post_callback'
        )
    );

    $wp_customize->add_setting(
        'ta_newspaper_slider_feature_post_2',
        array(
            'default' => '',
            'sanitize_callback' => 'ta_newspaper_sanitize_post_list',
        )
    );
    $wp_customize->add_control(
        'ta_newspaper_slider_feature_post_2',
        array(
            'label' => esc_html__('Slider Feature Post 2','ta-newspaper'),
            'priority' => 6,
            'type' => 'select',
            'choices' => $ta_newspaper_post_lists,
            'section' => 'ta_newspaper_home_banner_section',
            'active_callback' => 'ta_newspaper_slider_feature_post_callback'
        )
    );

    $wp_customize->add_setting(
        'ta_newspaper_slider_feature_post_3',
        array(
            'default' => '',
            'sanitize_callback' => 'ta_newspaper_sanitize_post_list',
        )
    );
    $wp_customize->add_control(
        'ta_newspaper_slider_feature_post_3',
        array(
            'label' => esc_html__('Slider Feature Post 3','ta-newspaper'),
            'priority' => 6,
            'type' => 'select',
            'choices' => $ta_newspaper_post_lists,
            'section' => 'ta_newspaper_home_banner_section',
            'active_callback' => 'ta_newspaper_slider_feature_post_callback'
        )
    );

    $wp_customize->add_setting(
        'ta_newspaper_slider_feature_post_4',
        array(
            'default' => '',
            'sanitize_callback' => 'ta_newspaper_sanitize_post_list',
        )
    );
    $wp_customize->add_control(
        'ta_newspaper_slider_feature_post_4',
        array(
            'label' => esc_html__('Slider Feature Post 4','ta-newspaper'),
            'priority' => 6,
            'type' => 'select',
            'choices' => $ta_newspaper_post_lists,
            'section' => 'ta_newspaper_home_banner_section',
            'active_callback' => 'ta_newspaper_slider_feature_post_callback'
        )
    );
    
    /** Top Header Section **/
    $wp_customize->add_section(
        'ta_newspaper_top_header_section',
        array(
            'title'		=> esc_html__( 'Top Header', 'ta-newspaper' ),
            'panel'     => 'ta_newspaper_header_panel',
            'priority'  => 1,
        )
    );
    
    /** Top Header Setting **/
    $wp_customize->add_setting(
        'ta_newspaper_top_header_enable_disable',
        array(
            'default' => 'disable',
            'sanitize_callback' => 'ta_newspaper_sanitize_enable_disable',
            )
    );

    $wp_customize->add_control( new ta_newspaper_Customize_Switch_Control(
        $wp_customize, 
        'ta_newspaper_top_header_enable_disable', 
        array(
            'type' 		=> 'switch',
            'label' 	=> esc_html__( 'Enable / Disable Top Header', 'ta-newspaper' ),
            'section' 	=> 'ta_newspaper_top_header_section',
            'choices'   => array(
                'enable' 	=> esc_html__( 'Enable', 'ta-newspaper' ),
                'disable' 	=> esc_html__( 'Disable', 'ta-newspaper' )
                ),
            'priority'  => 1,
        )
        )
    );

    $wp_customize->add_setting(
        'ta_newspaper_top_header_sicail_link_ed',
        array(
            'default' => 'enable',
            'sanitize_callback' => 'ta_newspaper_sanitize_enable_disable',
            )
    );

    $wp_customize->add_control( new ta_newspaper_Customize_Switch_Control(
        $wp_customize, 
        'ta_newspaper_top_header_sicail_link_ed', 
        array(
            'type'      => 'switch',
            'label'     => esc_html__( 'Enable / Disable Social Link', 'ta-newspaper' ),
            'section'   => 'ta_newspaper_top_header_section',
            'choices'   => array(
                'enable'    => esc_html__( 'Enable', 'ta-newspaper' ),
                'disable'   => esc_html__( 'Disable', 'ta-newspaper' )
                ),
            'priority'  => 1,
        )
        )
    );

    /** Main Header Section **/
    $wp_customize->add_section(
        'ta_newspaper_main_header_section',
        array(
            'title'     => esc_html__( 'Main Header', 'ta-newspaper' ),
            'panel'     => 'ta_newspaper_header_panel',
            'priority'  => 1,
        )
    );
    
    /** Menu Align Header Setting **/
    $wp_customize->add_setting(
        'ta_newspaper_main_header_center_align',
        array(
            'default' => 'disable',
            'sanitize_callback' => 'ta_newspaper_sanitize_enable_disable',
            )
    );

    $wp_customize->add_control( new ta_newspaper_Customize_Switch_Control(
        $wp_customize, 
        'ta_newspaper_main_header_center_align', 
        array(
            'type'      => 'switch',
            'label'     => esc_html__( 'Enable Header Menu Center Align', 'ta-newspaper' ),
            'section'   => 'ta_newspaper_main_header_section',
            'choices'   => array(
                'enable'    => esc_html__( 'Enable', 'ta-newspaper' ),
                'disable'   => esc_html__( 'Disable', 'ta-newspaper' )
                ),
            'priority'  => 1,
        )
        )
    );

    /** Menu Align Header Setting **/
    $wp_customize->add_setting(
        'ta_newspaper_show_sub_menu_respnsive',
        array(
            'default' => 'disable',
            'sanitize_callback' => 'ta_newspaper_sanitize_enable_disable',
            )
    );

    $wp_customize->add_control( new ta_newspaper_Customize_Switch_Control(
        $wp_customize, 
        'ta_newspaper_show_sub_menu_respnsive', 
        array(
            'type'      => 'switch',
            'label'     => esc_html__( 'Show Sub Menu On Responsive', 'ta-newspaper' ),
            'section'   => 'ta_newspaper_main_header_section',
            'choices'   => array(
                'enable'    => esc_html__( 'Enable', 'ta-newspaper' ),
                'disable'   => esc_html__( 'Disable', 'ta-newspaper' )
                ),
            'priority'  => 1,
        )
        )
    );

     $wp_customize->add_setting(
        'ta_newspaper_main_header_search_ed',
        array(
            'default' => 'enable',
            'sanitize_callback' => 'ta_newspaper_sanitize_enable_disable',
            )
    );

    $wp_customize->add_control( new ta_newspaper_Customize_Switch_Control(
        $wp_customize, 
        'ta_newspaper_main_header_search_ed', 
        array(
            'type'      => 'switch',
            'label'     => esc_html__( 'Enable Header Search', 'ta-newspaper' ),
            'section'   => 'ta_newspaper_main_header_section',
            'choices'   => array(
                'enable'    => esc_html__( 'Enable', 'ta-newspaper' ),
                'disable'   => esc_html__( 'Disable', 'ta-newspaper' )
                ),
            'priority'  => 1,
        )
        )
    );

    /** Top Header Social Icon **/
    $wp_customize->add_section(
        'ta_newspaper_top_header_social_link',
        array(
            'title'     => esc_html__( 'Social Link', 'ta-newspaper' ),
            'panel'     => 'ta_newspaper_general_panel',
            'priority'  => 1,
        )
    );
    
    $wp_customize->add_setting(
    'ta_newspaper_facebook_link',
        array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw'
        )
    );
    $wp_customize->add_control(
    'ta_newspaper_facebook_link',
        array(
            'label' => esc_html__('Facebook Link','ta-newspaper'),
            'priority' => 4,
            'type' => 'text',
            'section' => 'ta_newspaper_top_header_social_link'
        )
    );
    $wp_customize->add_setting(
        'ta_newspaper_twitter_link',
        array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw'
        )
    );
    $wp_customize->add_control(
        'ta_newspaper_twitter_link',
        array(
            'label' => esc_html__('Twitter Link','ta-newspaper'),
            'priority' => 5,
            'type' => 'text',
            'section' => 'ta_newspaper_top_header_social_link'
        )
    );
     
    $wp_customize->add_setting(
        'ta_newspaper_youtube_link',
        array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw'
        )
    );
    $wp_customize->add_control(
        'ta_newspaper_youtube_link',
        array(
            'label' => esc_html__('Youtube Link','ta-newspaper'),
            'priority' => 5,
            'type' => 'text',
            'section' => 'ta_newspaper_top_header_social_link'
        )
    );
     
    $wp_customize->add_setting(
        'ta_newspaper_google_link',
        array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw'
        )
    );
    $wp_customize->add_control(
        'ta_newspaper_google_link',
        array(
            'label' => esc_html__('Google Link','ta-newspaper'),
            'priority' => 5,
            'type' => 'text',
            'section' => 'ta_newspaper_top_header_social_link'
        )
    );
     
    $wp_customize->add_setting(
        'ta_newspaper_linkedin_link',
        array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw'
        )
     );
    $wp_customize->add_control(
        'ta_newspaper_linkedin_link',
        array(
            'label' => esc_html__('LinkedIn Link','ta-newspaper'),
            'priority' => 5,
            'type' => 'text',
            'section' => 'ta_newspaper_top_header_social_link'
        )
    );
 
    $wp_customize->add_setting(
        'ta_newspaper_pinterest_link',
        array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw'
        )
    );
    $wp_customize->add_control(
        'ta_newspaper_pinterest_link',
        array(
            'label' => esc_html__('Pinterest Link','ta-newspaper'),
            'priority' => 5,
            'type' => 'text',
            'section' => 'ta_newspaper_top_header_social_link'
        )
    );
    

    $wp_customize->add_setting(
        'ta_newspaper_top_header_sicail_link_ed',
        array(
            'default' => 'enable',
            'sanitize_callback' => 'ta_newspaper_sanitize_enable_disable',
            )
    );

    /** Footer Section **/
    $wp_customize->add_section(
        'ta_newspaper_copyright_text',
        array(
            'title'		=> esc_html__( 'Footer Setting', 'ta-newspaper' ),
            'panel'     => 'ta_newspaper_layout_setting',
            'priority'  => 1,
        )
    );
    
    $wp_customize->add_setting(
        'ta_newspaper_logo_layout',
        array(
            'default' => 'left-align',
            'sanitize_callback' => 'ta_newspaper_sanitize_logo_align',
        )
    );
    $wp_customize->add_control(
        'ta_newspaper_logo_layout',
        array(
            'label' => esc_html__('Logo Align','ta-newspaper'),
            'priority' => 20,
            'type' => 'select',
            'choices' => array(
                'left-align' => esc_html__('Left Align','ta-newspaper'),
                'center-align' => esc_html__('Center Align','ta-newspaper'),
            ),
            'section' => 'title_tagline'
        )
    );

    /** Footer Copyright Text **/
    $wp_customize->add_setting(
    'ta_newspaper_footer_copyright_text',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field'
        )
    );
    $wp_customize->add_control(
    'ta_newspaper_footer_copyright_text',
        array(
            'label' => esc_html__('Footer Copyright Text','ta-newspaper'),
            'priority' => 1,
            'type' => 'text',
            'section' => 'ta_newspaper_copyright_text'
        )
    );
    
    $wp_customize->add_setting(
        'ta_newspaper_go_top_enable_disable',
        array(
            'default' => 'disable',
            'sanitize_callback' => 'ta_newspaper_sanitize_enable_disable',
            )
    );
    $wp_customize->add_control( new ta_newspaper_Customize_Switch_Control(
        $wp_customize, 
        'ta_newspaper_go_top_enable_disable', 
        array(
            'type' 		=> 'switch',
            'label' 	=> esc_html__( 'Enable / Disable Footer Go Up Button', 'ta-newspaper' ),
            'section' 	=> 'ta_newspaper_copyright_text',
            'choices'   => array(
                'enable' 	=> esc_html__( 'Enable', 'ta-newspaper' ),
                'disable' 	=> esc_html__( 'Disable', 'ta-newspaper' )
                ),
            'priority'  => 1,
        )
        )
    );

    /** Web Layout **/
    $wp_customize->add_section(
        'ta_newspaper_web_layout',
        array(
            'title'     => esc_html__( 'Web Layout', 'ta-newspaper' ),
            'panel'     => 'ta_newspaper_layout_setting',
        )
    );
    
    $wp_customize->add_setting(
        'ta_newspaper_enable_disable_boxed_layout',
        array(
            'default' => 'disable',
            'sanitize_callback' => 'ta_newspaper_sanitize_enable_disable',
            )
    );
    $wp_customize->add_control( new ta_newspaper_Customize_Switch_Control(
        $wp_customize, 
        'ta_newspaper_enable_disable_boxed_layout', 
        array(
            'type'      => 'switch',
            'label'     => esc_html__( 'Enable / Disable Boxed Layout', 'ta-newspaper' ),
            'section'   => 'ta_newspaper_web_layout',
            'choices'   => array(
                'enable'    => esc_html__( 'Enable', 'ta-newspaper' ),
                'disable'   => esc_html__( 'Disable', 'ta-newspaper' )
                ),
            'priority'  => 1,
        )
        )
    );

    /** Single Post Section **/
    $wp_customize->add_section(
        'ta_newspaper_single_post',
        array(
            'title'     => esc_html__( 'Single Post', 'ta-newspaper' ),
            'panel'     => 'ta_newspaper_layout_setting',
        )
    );

    $wp_customize->add_setting(
        'ta_newspaper_ed_feature_image',
        array(
            'default' => 'enable',
            'sanitize_callback' => 'ta_newspaper_sanitize_enable_disable',
            )
    );
    $wp_customize->add_control( new ta_newspaper_Customize_Switch_Control(
        $wp_customize, 
        'ta_newspaper_ed_feature_image', 
        array(
            'type'      => 'switch',
            'label'     => esc_html__( 'Enable / Disable Feature Image', 'ta-newspaper' ),
            'section'   => 'ta_newspaper_single_post',
            'choices'   => array(
                'enable'    => esc_html__( 'Enable', 'ta-newspaper' ),
                'disable'   => esc_html__( 'Disable', 'ta-newspaper' )
                ),
            'priority'  => 1,
        )
        )
    );

    $wp_customize->add_setting(
        'ta_newspaper_ed_author',
        array(
            'default' => 'enable',
            'sanitize_callback' => 'ta_newspaper_sanitize_enable_disable',
            )
    );
    $wp_customize->add_control( new ta_newspaper_Customize_Switch_Control(
        $wp_customize, 
        'ta_newspaper_ed_author', 
        array(
            'type'      => 'switch',
            'label'     => esc_html__( 'Enable / Disable Author Name', 'ta-newspaper' ),
            'description'     => esc_html__( 'This option works only for single post type.', 'ta-newspaper' ),
            'section'   => 'ta_newspaper_single_post',
            'choices'   => array(
                'enable'    => esc_html__( 'Enable', 'ta-newspaper' ),
                'disable'   => esc_html__( 'Disable', 'ta-newspaper' )
                ),
            'priority'  => 1,
        )
        )
    );

    $wp_customize->add_setting(
        'ta_newspaper_ed_date',
        array(
            'default' => 'enable',
            'sanitize_callback' => 'ta_newspaper_sanitize_enable_disable',
            )
    );
    $wp_customize->add_control( new ta_newspaper_Customize_Switch_Control(
        $wp_customize, 
        'ta_newspaper_ed_date', 
        array(
            'type'      => 'switch',
            'label'     => esc_html__( 'Enable / Disable Post Date', 'ta-newspaper' ),
            'description'     => esc_html__( 'This option works only for single post type.', 'ta-newspaper' ),
            'section'   => 'ta_newspaper_single_post',
            'choices'   => array(
                'enable'    => esc_html__( 'Enable', 'ta-newspaper' ),
                'disable'   => esc_html__( 'Disable', 'ta-newspaper' )
                ),
            'priority'  => 1,
        )
        )
    );

    $wp_customize->add_setting(
        'ta_newspaper_ed_comment',
        array(
            'default' => 'enable',
            'sanitize_callback' => 'ta_newspaper_sanitize_enable_disable',
            )
    );
    $wp_customize->add_control( new ta_newspaper_Customize_Switch_Control(
        $wp_customize, 
        'ta_newspaper_ed_comment', 
        array(
            'type'      => 'switch',
            'label'     => esc_html__( 'Enable / Disable Comment Count', 'ta-newspaper' ),
            'description'     => esc_html__( 'This option works only for single post type.', 'ta-newspaper' ),
            'section'   => 'ta_newspaper_single_post',
            'choices'   => array(
                'enable'    => esc_html__( 'Enable', 'ta-newspaper' ),
                'disable'   => esc_html__( 'Disable', 'ta-newspaper' )
                ),
            'priority'  => 1,
        )
        )
    );

    $wp_customize->add_setting(
        'ta_newspaper_ed_author_section',
        array(
            'default' => 'enable',
            'sanitize_callback' => 'ta_newspaper_sanitize_enable_disable',
            )
    );
    $wp_customize->add_control( new ta_newspaper_Customize_Switch_Control(
        $wp_customize, 
        'ta_newspaper_ed_author_section', 
        array(
            'type'      => 'switch',
            'label'     => esc_html__( 'Enable / Disable Author Section', 'ta-newspaper' ),
            'description'     => esc_html__( 'This option works only for single post type.', 'ta-newspaper' ),
            'section'   => 'ta_newspaper_single_post',
            'choices'   => array(
                'enable'    => esc_html__( 'Enable', 'ta-newspaper' ),
                'disable'   => esc_html__( 'Disable', 'ta-newspaper' )
                ),
            'priority'  => 1,
        )
        )
    );

    $wp_customize->add_setting(
        'ta_newspaper_ed_related_Posts_section',
        array(
            'default' => 'enable',
            'sanitize_callback' => 'ta_newspaper_sanitize_enable_disable',
            )
    );
    $wp_customize->add_control( new ta_newspaper_Customize_Switch_Control(
        $wp_customize, 
        'ta_newspaper_ed_related_Posts_section', 
        array(
            'type'      => 'switch',
            'label'     => esc_html__( 'Enable / Disable Related Posts Section', 'ta-newspaper' ),
            'description'     => esc_html__( 'This option works only for single post type.', 'ta-newspaper' ),
            'section'   => 'ta_newspaper_single_post',
            'choices'   => array(
                'enable'    => esc_html__( 'Enable', 'ta-newspaper' ),
                'disable'   => esc_html__( 'Disable', 'ta-newspaper' )
                ),
        )
        )
    );

    $wp_customize->add_setting(
        'ta_newspaper_related_posts_section_title',
        array(
            'default' => esc_html__( 'Related Posts','ta-newspaper'),
            'sanitize_callback' => 'sanitize_text_field'
        )
    );
    $wp_customize->add_control(
        'ta_newspaper_related_posts_section_title',
        array(
            'label' => esc_html__('Related Posts Section Title','ta-newspaper'),
            'description'     => esc_html__( 'This option works only for single post type.', 'ta-newspaper' ),
            'type' => 'text',
            'section' => 'ta_newspaper_single_post'
        )
    );

    /** Single Post Section **/
    $wp_customize->add_section(
        'ta_newspaper_archive_page',
        array(
            'title'     => esc_html__( 'Archive Page', 'ta-newspaper' ),
            'panel'     => 'ta_newspaper_layout_setting',
        )
    );

    $wp_customize->add_setting(
        'ta_newspaper_ed_archive_feature_image',
        array(
            'default' => 'enable',
            'sanitize_callback' => 'ta_newspaper_sanitize_enable_disable',
            )
    );
    $wp_customize->add_control( new ta_newspaper_Customize_Switch_Control(
        $wp_customize, 
        'ta_newspaper_ed_archive_feature_image', 
        array(
            'type'      => 'switch',
            'label'     => esc_html__( 'Enable / Disable Feature Image', 'ta-newspaper' ),
            'section'   => 'ta_newspaper_archive_page',
            'choices'   => array(
                'enable'    => esc_html__( 'Enable', 'ta-newspaper' ),
                'disable'   => esc_html__( 'Disable', 'ta-newspaper' )
                ),
            'priority'  => 1,
        )
        )
    );

    $wp_customize->add_setting(
        'ta_newspaper_ed_archive_author',
        array(
            'default' => 'enable',
            'sanitize_callback' => 'ta_newspaper_sanitize_enable_disable',
            )
    );
    $wp_customize->add_control( new ta_newspaper_Customize_Switch_Control(
        $wp_customize, 
        'ta_newspaper_ed_archive_author', 
        array(
            'type'      => 'switch',
            'label'     => esc_html__( 'Enable / Disable Author Name', 'ta-newspaper' ),
            'description'     => esc_html__( 'This option works only for archive post type.', 'ta-newspaper' ),
            'section'   => 'ta_newspaper_archive_page',
            'choices'   => array(
                'enable'    => esc_html__( 'Enable', 'ta-newspaper' ),
                'disable'   => esc_html__( 'Disable', 'ta-newspaper' )
                ),
            'priority'  => 1,
        )
        )
    );

    $wp_customize->add_setting(
        'ta_newspaper_ed_archive_date',
        array(
            'default' => 'enable',
            'sanitize_callback' => 'ta_newspaper_sanitize_enable_disable',
            )
    );
    $wp_customize->add_control( new ta_newspaper_Customize_Switch_Control(
        $wp_customize, 
        'ta_newspaper_ed_archive_date', 
        array(
            'type'      => 'switch',
            'label'     => esc_html__( 'Enable / Disable Post Date', 'ta-newspaper' ),
            'description'     => esc_html__( 'This option works only for archive post type.', 'ta-newspaper' ),
            'section'   => 'ta_newspaper_archive_page',
            'choices'   => array(
                'enable'    => esc_html__( 'Enable', 'ta-newspaper' ),
                'disable'   => esc_html__( 'Disable', 'ta-newspaper' )
                ),
            'priority'  => 1,
        )
        )
    );

    $wp_customize->add_setting(
        'ta_newspaper_ed_archive_comment',
        array(
            'default' => 'enable',
            'sanitize_callback' => 'ta_newspaper_sanitize_enable_disable',
            )
    );
    $wp_customize->add_control( new ta_newspaper_Customize_Switch_Control(
        $wp_customize, 
        'ta_newspaper_ed_archive_comment', 
        array(
            'type'      => 'switch',
            'label'     => esc_html__( 'Enable / Disable Comment Count', 'ta-newspaper' ),
            'description'     => esc_html__( 'This option works only for archive post type.', 'ta-newspaper' ),
            'section'   => 'ta_newspaper_archive_page',
            'choices'   => array(
                'enable'    => esc_html__( 'Enable', 'ta-newspaper' ),
                'disable'   => esc_html__( 'Disable', 'ta-newspaper' )
                ),
            'priority'  => 1,
        )
        )
    );

    $wp_customize->add_setting(
        'ta_newspaper_archive_readmore_label',
        array(
            'default' => esc_html__( 'Read More','ta-newspaper'),
            'sanitize_callback' => 'sanitize_text_field'
        )
    );
    $wp_customize->add_control(
        'ta_newspaper_archive_readmore_label',
        array(
            'label' => esc_html__('Read More Button Label','ta-newspaper'),
            'priority' => 5,
            'type' => 'text',
            'section' => 'ta_newspaper_archive_page'
        )
    );

    $wp_customize->add_setting(
        'ta_newspaper_archive_layout',
        array(
            'default' => 'right_sidebar',
            'sanitize_callback' => 'ta_newspaper_sanitize_sidebar_layout'
        )
    );
    $wp_customize->add_control(
        new TA_Newspaper_Custom_Radio_Image_Control( 
            $wp_customize,
            'ta_newspaper_archive_layout',
            array(
                'settings'      => 'ta_newspaper_archive_layout',
                'section'       => 'ta_newspaper_archive_page',
                'label'         => esc_html__( 'Archive Sidebar Layout', 'ta-newspaper' ),
                'priority'  => 6,
                'choices'       => array(
                    'right_sidebar'  => get_template_directory_uri() . '/images/right-sidebar.png',
                    'left_sidebar'  => get_template_directory_uri() . '/images/left-sidebar.png',
                    'both_sidebar'  => get_template_directory_uri() . '/images/both-sidebar.png',
                    'no_sidebar'  => get_template_directory_uri() . '/images/no-sidebar.png',
                )
            )
        )
    );

    /** Speed Boost **/
    $wp_customize->add_section(
        'ta_newspaper_speed_section',
        array(
            'title'     => esc_html__( 'Speed Optimize', 'ta-newspaper' ),
            'priority' => 5,
            'panel'     => 'ta_newspaper_layout_setting',
        )
    );

    $wp_customize->add_setting(
        'ta_newspaper_ed_combined_script',
        array(
            'default' => 'disable',
            'sanitize_callback' => 'ta_newspaper_sanitize_enable_disable',
            )
    );
    $wp_customize->add_control( new ta_newspaper_Customize_Switch_Control(
        $wp_customize, 
        'ta_newspaper_ed_combined_script', 
        array(
            'type'      => 'switch',
            'label'     => esc_html__( 'Enable / Disable Combined Script', 'ta-newspaper' ),
            'description'     => esc_html__( 'Option will combile all scripts files on one file.', 'ta-newspaper' ),
            'section'   => 'ta_newspaper_speed_section',
            'choices'   => array(
                'enable'    => esc_html__( 'Enable', 'ta-newspaper' ),
                'disable'   => esc_html__( 'Disable', 'ta-newspaper' )
                ),
            'priority'  => 1,
        )
        )
    );

    $wp_customize->add_setting(
        'ta_newspaper_ed_combined_style',
        array(
            'default' => 'disable',
            'sanitize_callback' => 'ta_newspaper_sanitize_enable_disable',
            )
    );
    $wp_customize->add_control( new ta_newspaper_Customize_Switch_Control(
        $wp_customize, 
        'ta_newspaper_ed_combined_style', 
        array(
            'type'      => 'switch',
            'label'     => esc_html__( 'Enable / Disable Combined Style', 'ta-newspaper' ),
            'description'     => esc_html__( 'Option will combile all styles files on one file.', 'ta-newspaper' ),
            'section'   => 'ta_newspaper_speed_section',
            'choices'   => array(
                'enable'    => esc_html__( 'Enable', 'ta-newspaper' ),
                'disable'   => esc_html__( 'Disable', 'ta-newspaper' )
                ),
            'priority'  => 1,
        )
        )
    );

    $wp_customize->add_setting(
        'ta_newspaper_ed_combined_style',
        array(
            'default' => 'disable',
            'sanitize_callback' => 'ta_newspaper_sanitize_enable_disable',
            )
    );
    $wp_customize->add_control( new ta_newspaper_Customize_Switch_Control(
        $wp_customize, 
        'ta_newspaper_ed_combined_style', 
        array(
            'type'      => 'switch',
            'label'     => esc_html__( 'Enable / Disable Combined Style', 'ta-newspaper' ),
            'description'     => esc_html__( 'Option will combile all styles files on one file.', 'ta-newspaper' ),
            'section'   => 'ta_newspaper_speed_section',
            'choices'   => array(
                'enable'    => esc_html__( 'Enable', 'ta-newspaper' ),
                'disable'   => esc_html__( 'Disable', 'ta-newspaper' )
                ),
            'priority'  => 1,
        )
        )
    );

 }
 
 
 /** Customizer Class **/
 if ( class_exists( 'WP_Customize_Control' ) ) {
    
    /** Switch Button **/
    class ta_newspaper_Customize_Switch_Control extends WP_Customize_Control {

		public $type = 'switch';

		public function render_content() {
	?>
			<label>
				<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
				<div class="description customize-control-description"><?php echo esc_html( $this->description ); ?></div>
		        <div class="switch_button">
		        	<?php 
		        		$show_choices = $this->choices;
		        		foreach ( $show_choices as $key => $value ) {
		        			echo '<span class="switch_part '.esc_attr($key).'" data-switch="'.esc_attr($key).'">'. esc_html($value).'</span>';
		        		}
		        	?>
                  	<input type="hidden" id="switch_button" <?php $this->link(); ?> value="<?php echo esc_attr($this->value()); ?>" />
                </div>
            </label>
	<?php
		}
	}
    
    /** Radio Image Control Class **/
    class TA_Newspaper_Custom_Radio_Image_Control extends WP_Customize_Control {

        public $type = 'radio-image';
    
        public function render_content() {
           
            if ( empty( $this->choices ) ) {
                return;
            }           
            
            $name = '_customize-radio-' . $this->id; ?>
            
            <span class="customize-control-title">
                <?php echo esc_attr( $this->label ); ?>
                <?php if ( ! empty( $this->description ) ) : ?>
                    <span class="description customize-control-description"><?php echo esc_html( $this->description ); ?></span>
                <?php endif; ?>
            </span>
            
            <div id="input_<?php echo esc_attr($this->id); ?>" class="image">
                <?php foreach ( $this->choices as $value => $label ) : ?>
                    <input class="image-select" type="radio" value="<?php echo esc_attr( $value ); ?>" id="<?php echo esc_attr($this->id) . esc_attr($value); ?>" name="<?php echo esc_attr( $name ); ?>" <?php $this->link(); checked( $this->value(), $value ); ?>>
                        <label for="<?php echo esc_attr($this->id) . esc_attr($value); ?>">
                            <img src="<?php echo esc_html( $label ); ?>" alt="<?php echo esc_attr( $value ); ?>" title="<?php echo esc_attr( $value ); ?>">
                        </label>
                    </input>
                <?php endforeach; ?>
            </div>
            
        <?php }
    }


    
}
 
 
 
/** Sanitize Function **/
function ta_newspaper_sanitize_enable_disable( $input ) {
    $valid_keys = array(
            'enable'  => esc_html__( 'Enable', 'ta-newspaper' ),
            'disable'  => esc_html__( 'Disable', 'ta-newspaper' )
        );
    if ( array_key_exists( $input, $valid_keys ) ) {
        return $input;
    } else {
        return '';
    }
}

function ta_newspaper_sanitize_radio_image( $input ) {
    $valid_keys = array(
            'layout-1'  => esc_html__( 'Layout 1', 'ta-newspaper' ),
            'layout-2'  => esc_html__( 'Layout 2', 'ta-newspaper' ),
            'layout-3'  => esc_html__( 'Layout 3', 'ta-newspaper' )
        );
    if ( array_key_exists( $input, $valid_keys ) ) {
        return $input;
    } else {
        return '';
    }
}

/** Customizer Category List Sanitize **/
function ta_newspaper_sanitize_post_cat_list($input){
    $ta_newspaper_Category_list = ta_newspaper_Category_list();
    if(array_key_exists($input,$ta_newspaper_Category_list)){
        return $input;
    }
    else{
        return '';
    }
}

/** Customizer Category List Sanitize **/
function ta_newspaper_sanitize_post_list($input){
    $ta_newspaper_post_lists = ta_newspaper_post_lists();
    if(array_key_exists($input,$ta_newspaper_post_lists)){
        return $input;
    }
    else{
        return '';
    }
}

/** Customizer Sidebar Layout Sanitize **/
function ta_newspaper_sanitize_sidebar_layout($input){
   $valid_keys = array(
                'right_sidebar'  => get_template_directory_uri() . '/images/right-sidebar.png',
                'left_sidebar'  => get_template_directory_uri() . '/images/left-sidebar.png',
                'both_sidebar'  => get_template_directory_uri() . '/images/both-sidebar.png',
                'no_sidebar'  => get_template_directory_uri() . '/images/no-sidebar.png',
            );
    if ( array_key_exists( $input, $valid_keys ) ) {
        return $input;
    } else {
        return '';
    }
}

/** Customizer Slider Layout Sanitize **/
function ta_newspaper_sanitize_slider_layout($input){
   $valid_keys = array(
                'layout-1'  => get_template_directory_uri() . '/images/right-sidebar.png',
                'layout-2'  => get_template_directory_uri() . '/images/left-sidebar.png',
                'layout-3'  => get_template_directory_uri() . '/images/both-sidebar.png',
            );
    if ( array_key_exists( $input, $valid_keys ) ) {
        return $input;
    } else {
        return '';
    }
}


/** Customizer Logo Align Sanitize **/
function ta_newspaper_sanitize_logo_align($input){
   $valid_keys = array( 'left-align', 'center-align' );
    if ( in_array( $input, $valid_keys ) ) {
        return $input;
    } else {
        return '';
    }
}

/** Active Callback About Skill **/
function ta_newspaper_slider_feature_post_callback( $control ) {
    if($control->manager->get_setting('ta_newspaper_slider_layout')->value() == 'layout-3'){
        return true;
    }else{
        return false;
    }
}