<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package TA Newspaper
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head itemscope itemtype="http://schema.org/WebSite">
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> itemscope itemtype="http://schema.org/WebPage" >
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'ta-newspaper' ); ?></a>
	<header id="masthead" class="site-header" itemscope itemtype="http://schema.org/WPHeader">

            <?php $ta_newspaper_top_header_enable_disable = get_theme_mod('ta_newspaper_top_header_enable_disable');
            if($ta_newspaper_top_header_enable_disable == 'enable'){ ?>
            <div class="tan-top-header">
                <div class="tan-container tan-display-flex clearfix">
                    <nav id="top-site-navigation" class="top-main-navigation"  itemscope itemtype="http://schema.org/SiteNavigationElement" >
                        
                        <div id="top-toggle" class="top-toggle">
            	            <span class="one"> </span>
            	            <span class="two"> </span>
            	            <span class="three"> </span>
            	        </div>
                        
                        <div class="menu-top-wrap">
                			<?php
                				wp_nav_menu( array(
                					'theme_location' => 'ta-newspaper-top-menu',
                					'menu_id'        => 'top-menu',
                				) );
                			?>
                        </div>
                        
            		</nav><!-- #site-navigation -->

                    
                    <div class="top-header-social-link">
                        <?php $ta_newspaper_top_header_sicail_link_ed = get_theme_mod('ta_newspaper_top_header_sicail_link_ed','enable');
                        if($ta_newspaper_top_header_sicail_link_ed == 'enable'){
                            ta_newspaper_social_icon ();
                        } ?>
                    </div>
                    

                </div>
            </div>
            <?php } ?>

            <?php $ta_newspaper_logo_layout = get_theme_mod('ta_newspaper_logo_layout','left-align'); ?>
            <div <?php if( $ta_newspaper_logo_layout == 'center-align' ){ ?> style="background-image: url(<?php echo esc_url( get_header_image() ); ?>)" <?php } ?> class="tan-mid-header <?php echo 'ta-logo-'.esc_attr( $ta_newspaper_logo_layout ); ?>">
                <div class="tan-container tan-display-flex clearfix">

                   <div class="site-branding">
                        <?php if ( function_exists( 'the_custom_logo' ) ){?>
                        
                            <?php if ( has_custom_logo() ) { ?>
                                <div class="site-logo">
                                    <?php the_custom_logo(); ?>
                                </div>
                            <?php }else{ ?>
                                <div class="site-text">
                                    <?php if( is_front_page() ){ ?>
                                    <h1 class="site-title" itemprop="name">
                                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" >
                                            <?php bloginfo( 'name' ); ?>
                                        </a>
                                    </h1>
                                <?php }else{ ?>
                                    <p class="site-title">
                                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                                            <?php bloginfo( 'name' ); ?>
                                        </a>
                                    </p>
                                <?php }

                                $description = get_bloginfo( 'description', 'display' );
                                if ( $description || is_customize_preview() ) :
                                    ?>
                                        <p class="site-description">
                                            <?php echo esc_html( $description ); ?>
                                        </p>
                                <?php endif; ?>
                                
                                </div>
                            <?php }
                            
                        } ?>
                    </div><!-- .site-branding -->

                    <?php if( $ta_newspaper_logo_layout != 'center-align' && get_header_image() ){ ?>
                        <div class="tan-header-image">
                            <img src="<?php echo esc_url( get_header_image() ); ?>" alt="<?php esc_attr_e('Header Image','ta-newspaper'); ?>" title="<?php esc_attr_e('Header Image','ta-newspaper'); ?>" />
                        </div>
                    <?php } ?>

                </div>
           </div>

           <?php
           $ta_newspaper_main_header_search_ed = get_theme_mod('ta_newspaper_main_header_search_ed','enable');
           $ta_newspaper_main_header_center_align = get_theme_mod('ta_newspaper_main_header_center_align','disable');
           ?>
    		<nav id="site-navigation" class="main-navigation <?php echo 'ta-menu-'.esc_attr( $ta_newspaper_main_header_center_align ); ?>"  itemscope itemtype="http://schema.org/SiteNavigationElement">
                <div class="tan-container tan-display-flex clearfix">

        			<div id="toggle" class="toggle">
        	            <span class="one"> </span>
        	            <span class="two"> </span>
        	            <span class="three"> </span>
        	        </div>
                    
                    <div class="menu-main-wrap">
            			<?php
            				wp_nav_menu( array(
            					'theme_location' => 'ta-newspaper-primary-menu',
            					'menu_id'        => 'primary-menu',
            				) );
            			?>
                    </div>

                    <?php if( $ta_newspaper_main_header_search_ed == 'enable' ){ ?>
                        
                        <?php if( $ta_newspaper_main_header_center_align == 'enable' ){ ?>
                            <a class="ta-toggle-search" href="javascript:void(0)"><i class="fa fa-search"></i></a>
                        <?php } ?>
                    
                        <div class="header-search">
                            <?php get_search_form(); ?>
                        </div>
                    <?php } ?>

                </div>
    		</nav><!-- #site-navigation -->

	</header><!-- #masthead -->
    <?php
    if(!is_home() || !is_front_page()){
        do_action('ta_newspaper_header_banner');
    }
    if(is_home() || is_front_page()){
            do_action('ta_newspaper_home_slider_banner');
    } ?>
	<div id="content" class="site-content">
    