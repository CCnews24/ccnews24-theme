<?php
/**
 * TA Newslatter functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package TA Newspaper
 */

if ( ! function_exists( 'ta_newspaper_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function ta_newspaper_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on TA Newslatter, use a find and replace
		 * to change 'ta-newspaper' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'ta-newspaper', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );
        add_image_size('ta-newspaper-single-page',1245,700,true);
        add_image_size('ta-newspaper-slider-img',400,550,true);
        add_image_size('ta-newspaper-slide-post-image',560,350,true);
        add_image_size('ta-newspaper-mid-header',270,130,true);
        add_image_size('ta-newspaper-slider-blog-list-image',550,500,true);
        add_image_size('ta-newspaper-slider-highlight-image',550,550,true);
        add_image_size('ta-newspaper-portfolio-image',600,600,true);
        add_image_size('ta-newspaper-sidebar-recent-post-image',150,130,true);
        add_image_size('ta-newspaper-first-multiple-cat-post',600,500,true);
        add_image_size('ta-newspaper-first-highlite-post-2',600,400,true);
        add_image_size('ta-newspaper-related-post',780,500,true);
        add_image_size('ta-newspaper-slider-3-first',580,430,true);
        add_image_size('ta-newspaper-slider-3-rest',290,215,true);
        add_image_size('ta-newspaper-slide-post-2',1170,450,true);
        add_image_size('ta-newspaper-blog-list-3',480,330,true);

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'ta-newspaper-primary-menu' => esc_html__( 'Primary Menu', 'ta-newspaper' ),
			'ta-newspaper-top-menu' => esc_html__( 'Top Menu', 'ta-newspaper' ),
		) );
		
		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Fost Formate
		add_theme_support( 'post-formats', array( 'aside','image', 'gallery', 'link','video','quote','audio' ) );


		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'ta_newspaper_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 80,
    		'width'       => 262,
    		'flex-width'  => true,
    		'flex-height' => true,
		) );

		$starter_content = array(
	        'posts' => array( 'home' ),
	        
	        'options' => array(
	            'show_on_front' => 'page',
	            'page_on_front' => '{{home}}',
	        ),
	        
	        'nav_menus' => array(
	            'ta-newspaper-primary-menu' => array(
	                'name' => __( 'Primary Menu', 'ta-newspaper' ),
	                'items' => array(
	                    'page_home',
	                )
	            )
	        ),
	    );

		add_theme_support( 'starter-content', $starter_content );

	}
endif;
add_action( 'after_setup_theme', 'ta_newspaper_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function ta_newspaper_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'ta_newspaper_content_width', 780 );
}
add_action( 'after_setup_theme', 'ta_newspaper_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function ta_newspaper_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Right Sidebar', 'ta-newspaper' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'ta-newspaper' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
    register_sidebar( array(
		'name'          => esc_html__( 'Left Sidebar', 'ta-newspaper' ),
		'id'            => 'ta-newspaper-left-sidebar',
		'description'   => esc_html__( 'Add widgets here.', 'ta-newspaper' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
    register_sidebar( array(
		'name'          => esc_html__( 'Home With Right Sidebar', 'ta-newspaper' ),
		'id'            => 'ta-newspaper-home-with-sidebar',
		'description'   => esc_html__( 'Add widgets here.', 'ta-newspaper' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
    register_sidebar( array(
		'name'          => esc_html__( 'Home Full Width', 'ta-newspaper' ),
		'id'            => 'ta-newspaper-home-full-width',
		'description'   => esc_html__( 'Add widgets here.', 'ta-newspaper' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer One', 'ta-newspaper' ),
		'id'            => 'ta-newspaper-footer-1',
		'description'   => esc_html__( 'Add widgets here.', 'ta-newspaper' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Two', 'ta-newspaper' ),
		'id'            => 'ta-newspaper-footer-2',
		'description'   => esc_html__( 'Add widgets here.', 'ta-newspaper' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Three', 'ta-newspaper' ),
		'id'            => 'ta-newspaper-footer-3',
		'description'   => esc_html__( 'Add widgets here.', 'ta-newspaper' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

}
add_action( 'widgets_init', 'ta_newspaper_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function ta_newspaper_scripts() {
	
	$ta_newspaper_ed_combined_script = get_theme_mod('ta_newspaper_ed_combined_script','disable');
	$ta_newspaper_ed_combined_style = get_theme_mod('ta_newspaper_ed_combined_style','disable');
	$suffix = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';

    $ta_newspaper_font_query_args = array('family' => 'Roboto:100,200,300,400,500,700');
    wp_enqueue_style( 'ta-newspaper-google-fonts', add_query_arg($ta_newspaper_font_query_args, "//fonts.googleapis.com/css"));

    if( $ta_newspaper_ed_combined_style == 'enable' ){
    	wp_enqueue_style( 'ta-newspaper-plugins', get_template_directory_uri() . '/css/ta-newspaper-plugins.min.css' );
    }else{
	    wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome' . $suffix . '.css' );
	    wp_enqueue_style( 'jquery-fancybox', get_template_directory_uri() . '/js/fancybox/jquery.fancybox' . $suffix . '.css' );
	    wp_enqueue_style( 'owl-carousel', get_template_directory_uri() . '/js/OwlCarousel/owl.carousel' . $suffix . '.css' );
	}

	wp_enqueue_style( 'ta-newspaper-style', get_stylesheet_uri() );
	wp_enqueue_style( 'ta-newspaper-responsive', get_template_directory_uri() . '/css/responsive' . $suffix . '.css' );
    
    if($ta_newspaper_ed_combined_script == 'enable'){
    	wp_enqueue_script( 'ta-newspaper-plugins', get_template_directory_uri() . '/js/ta-newspaper-plugins.min.js', array('jquery') );
    }else{
	    wp_enqueue_script( 'theia-sticky-sidebar',get_template_directory_uri().'/js/theia-sticky-sidebar/theia-sticky-sidebar' . $suffix . '.js',array('jquery'));
	    wp_enqueue_script( 'jquery-fancybox', get_template_directory_uri() . '/js/fancybox/jquery.fancybox' . $suffix . '.js',array('jquery') );
	    wp_enqueue_script( 'owl-carousel', get_template_directory_uri() . '/js/OwlCarousel/owl.carousel' . $suffix . '.js',array('jquery') );
		wp_enqueue_script( 'ta-newspaper-navigation', get_template_directory_uri() . '/js/navigation' . $suffix . '.js', array(), '20151215', true );
		wp_enqueue_script( 'ta-newspaper-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix' . $suffix . '.js', array(), '20151215', true );
		wp_enqueue_script( 'superfish', get_template_directory_uri() . '/js/superfish' . $suffix . '.js', array('jquery') );
	    wp_enqueue_script( 'ta-newspaper-custom', get_template_directory_uri() . '/js/ta-newspaper-custom' . $suffix . '.js', array('jquery') );
	}
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	$data_array = array(
		'home_link' => home_url(),
	);
	wp_localize_script('ta-newspaper-api','ta_newspaper_data',$data_array);

}
add_action( 'wp_enqueue_scripts', 'ta_newspaper_scripts',100 );

function ta_newspaper_admin_enqueue(){

    $currentscreen = get_current_screen();
    if($currentscreen->id == 'widgets'){
        wp_enqueue_media();
    	wp_enqueue_script( 'ta-newspaper-widget', get_template_directory_uri() . '/inc/widget/js/widget.js', array( 'jquery'), '20160714', true );
    	 $array = array(
	        'remove'     => esc_html__('Remove','ta-newspaper'),
	        'uploadimage'     => esc_html__('Author Image','ta-newspaper'),
	    );
	    wp_localize_script( 'ta-newspaper-widget', 'ta_newspaper_widget_date', $array );
     }

}
add_action('admin_enqueue_scripts','ta_newspaper_admin_enqueue');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Customizer Option.
 */
require get_template_directory() . '/inc/customizer/customizer-options.php';

/**
 * TA Newslatter Functions.
 */
require get_template_directory() . '/inc/ta-newspaper-function.php';

/**
 * TA Newslatter Breadcrumb.
 */
require get_template_directory() . '/inc/breadcrumb.php';

/**
 * Custom Metabox
 **/
require get_template_directory() . '/inc/ta-newspaper-metabox.php';


/**
 * Widget Fields
 **/
require get_template_directory() . '/inc/widget/widgets-field.php';

/**
 * Simple Blog List
 **/
require get_template_directory() . '/inc/widget/ta-newspaper-simple-blog-list.php';

/**
* Highlight Posts
**/
require get_template_directory() . '/inc/widget/ta-newspaper-highlight-news.php';

/**
 * Category Blog List
 **/
require get_template_directory() . '/inc/widget/ta-newspaper-category-blog.php';

/**
 * Post Slide
 **/
require get_template_directory() . '/inc/widget/ta-newspaper-post-slide.php';

/**
 * AUthor Box
 **/
require get_template_directory() . '/inc/widget/ta-newspaper-author.php';

/**
 * Sidebar Recent Post
 **/
require get_template_directory() . '/inc/widget/ta-newspaper-sidebar-recent-post.php';

/**
* Post Category
**/
require get_template_directory() . '/inc/widget/ta-newspaper-post-category.php';


/**
* Plugin Activation
**/
require get_template_directory() . '/inc/tgmpa/plugin-activation.php';