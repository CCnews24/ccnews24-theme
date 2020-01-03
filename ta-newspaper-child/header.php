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
    <link href="https://fonts.googleapis.com/css?family=Lato:400,500,600,700&amp;subset=latin,latin-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="alternate" type="application/rss+xml" title="RSS Feed for ccnews24" href="/feed/">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> itemscope itemtype="http://schema.org/WebPage" >
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'ta-newspaper' ); ?></a>
	<header id="masthead" class="site-header header default" itemscope itemtype="http://schema.org/WPHeader">

            


        <div class="tan-container">
            <div class="row">
                <div class="col-12">
                    <div class="header__searchbar">
                        <div class="header__searchbar__container">
                        
                            <form role="search" action="" method="get" class="d-flex">
                               
                                <input class="header__searchbar__container__input" id="search" type="search" required="" name="s" autofocus placeholder="Search…" autocomplete="off">
                                <input type="submit" class="search-submit" value="Search">
                                <label class="header__searchbar__container__close material-button material-button--icon ripple has-ripple" for="search">
                                   
                                <i class="material-icons"></i>
                                   
                                </label>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header__appbar">
            <div class="tan-container">
                <div class="row">
             
                    <div class="col-md-10 col-7">
                        <div class="header__appbar--left d-flex">
                        <div id="top-toggle" class="top-toggle">
            	            <span class="one"> </span>
            	            <span class="two"> </span>
            	            <span class="three"> </span>
            	        </div>

                            <div class="header__appbar--left__logo">
                                <?php the_custom_logo( $blog_id ); ?>
                                
                            </div>
                            <div class="header__appbar--left__menu">
                            <div class="menu-main-wrap">

                           
            			<?php
            				wp_nav_menu( array(
            					'theme_location' => 'ta-newspaper-primary-menu',
            					'menu_id'        => 'primary-menu',
            				) );
            			?>
                    </div>
                    <div class="dropdown-box"></div>
                                <ul class="header__appbar--left__menu__list">
                                   
                                    <li class="header__appbar--left__menu__list__item">
                                        <a class="category-dropdown-button ripple has-dropdown has-ripple" href="javascript:" data-target="category-dropdown" data-align="center">
                                            <i class="material-icons"></i>
                                        </a>
                                       <div class="modal-overlay"></div>
                                        <div class="category-dropdown dropdown-container">
                                                        <div class="category-dropdown_sec sec_cat1 clearfix">
                                                            <div class="category-dropdown_community">
                                                                <div class="community_title">Hey CCnews24 Community!
                                                                </div>
                                                                <div class="community_desc">  
                                                                <?php 
                                                                        if ( is_user_logged_in() ) {
                                                                        global $rcl_user_URL;
                                                                        echo '<a class="rcl-login" href="'. $rcl_user_URL . '"><span>Cabinet</span></a> <span>&nbsp;or&nbsp;</span>';
                                                                        echo '<a class="header-logout header__appbar" href="' . wp_logout_url( home_url() ) . '">Exit</a>';
                                                                        echo '<a class="header-logout-mob" href="' . wp_logout_url( home_url() ) . '">Exit</a>';
                                                                        } else {
                                                                        echo '<a href="#" class="rcl-login" >Log in</a><span>&nbsp;or&nbsp;</span>';
                                                                        echo '<a href="#" class="rcl-register">Sign up</a>';
                                                                        echo '<a href="#" class="rcl-login login-mob"><i class="material-icons"></i></a>';
                                                                        }
                                                                    ?>
                                                                 
                                                                    to create your own posts.
                                                                </div>
                                                            </div>
                                                            <div class="reaction-emojis">
                                                                <a href="/account/" title="Bullish"><img alt="Bullish" src="<?php bloginfo('template_url'); ?>/images/icons/bullish" width="42"></a>
                                                                <a href="/account/" title="Bearish"><img alt="Bearish" src="<?php bloginfo('template_url'); ?>/images/icons/bearish.png " width="42"></a>
                                                                <a href="/account/" title="Like"><img alt="Like" src="<?php bloginfo('template_url'); ?>/images/icons/5a7b45263bf58-thumbup.png " width="42"></a>
                                                                <a href="/account/" title="Dislike"><img alt="Dislike" src="<?php bloginfo('template_url'); ?>/images/icons/thumbdown.png " width="42"></a>
                                                                <a href="/account/" title="LOL"><img alt="LOL" src="<?php bloginfo('template_url'); ?>/images/icons/lol.png " width="42"></a>
                                                                <a href="/account/" title="Hooray"><img alt="Hooray" src="<?php bloginfo('template_url'); ?>/images/icons/horn.png " width="42"></a>
                                                                <a href="/account/" title="Attention"><img alt="Attention" src="<?php bloginfo('template_url'); ?>/images/icons/attention.png " width="42"></a>
                                                            </div>
                                                        </div>

                                                        
                                                        <div class="category-dropdown_sec sec_cat2 clearfix">
                                                        <?php
                                                    wp_nav_menu( array(
                                                    'theme_location' => '',
                                                    'menu'        => 'Add-menu',
                                                    ) );
                                                    ?>
                                            
                                            </div>
                                            <div class="category-dropdown_sec sec_cat3 clearfix">
                                             <div class="logo-dropdown"><?php the_custom_logo( $blog_id ); ?></div>
                                            <div class="language-links hor">
                                            <?php echo do_shortcode('[gtranslate]'); ?>
                                                    <!-- <a class="button button-white" href="javascript:">
                                                        <i class="material-icons"></i> <b>English</b>
                                                    </a> -->
                                                <ul class="sub-nav ">
                                                                                                                <li>
                                                            <a href="https://ccnews24.net/selectlanguge/en" class="sub-item">English</a>
                                                        </li>
                                                                                                                <li>
                                                            <a href="https://ccnews24.net/selectlanguge/tr" class="sub-item">Türkçe</a>
                                                        </li>
                                                                                                                <li>
                                                            <a href="https://ccnews24.net/selectlanguge/ru" class="sub-item">Русский</a>
                                                        </li>
                                                                                                                <li>
                                                            <a href="https://ccnews24.net/selectlanguge/it" class="sub-item">Italiano</a>
                                                        </li>
                                                                                                                <li>
                                                            <a href="https://ccnews24.net/selectlanguge/es" class="sub-item">Español</a>
                                                        </li>
                                                                                                                <li>
                                                            <a href="https://ccnews24.net/selectlanguge/nl" class="sub-item">Dutch</a>
                                                        </li>
                                                                                                                <li>
                                                            <a href="https://ccnews24.net/selectlanguge/ar" class="sub-item">لعربية</a>
                                                        </li>
                                                </ul>
                                            </div>
                                    
                                            <div class="footer-left">
                                                <div class="footer-menu clearfix">
                                                    <a class="footer-menu__item " href="/editorial-board/" title="Editorial board">Editorial board
                                                    </a>
                                                    <a class="footer-menu__item" href="/contact/">Contact</a>
                                                </div>
                                            <div class="footer-copyright clearfix">


                                                Copyright © 2019 CCnews24. All rights reserved.
                                            </div>
                                            
                                           </div>
                                        </div>
                                        
                                       
                                        
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                     <!-- mob -->
                     <div class="drawer">
                        <div class="drawer__header">
                            <div class="drawer__header__logo">  <?php the_custom_logo( $blog_id ); ?></div>


                            <span class="drawer__header__close"><i class="material-icons"></i></span>
                        </div>
                                
                            <?php
                                wp_nav_menu( array(
                                    'theme_location' => '',
                                    'menu'        => 'mobile-menu',
                                ) );
                            ?>
                        <div class="reaction-emojis">
                                                    <a href="/account/" title="Bullish"><img alt="Bullish" src="<?php bloginfo('template_url'); ?>/images/icons/bullish" width="42"></a>
                                                    <a href="/account/" title="Bearish"><img alt="Bearish" src="<?php bloginfo('template_url'); ?>/images/icons/bearish.png " width="42"></a>
                                                    <a href="/account/" title="Like"><img alt="Like" src="<?php bloginfo('template_url'); ?>/images/icons/5a7b45263bf58-thumbup.png " width="42"></a>
                                                    <a href="/account/" title="Dislike"><img alt="Dislike" src="<?php bloginfo('template_url'); ?>/images/icons/thumbdown.png " width="42"></a>
                                                    <a href="/account/" title="LOL"><img alt="LOL" src="<?php bloginfo('template_url'); ?>/images/icons/lol.png " width="42"></a>
                                                    <a href="/account/" title="Hooray"><img alt="Hooray" src="<?php bloginfo('template_url'); ?>/images/icons/horn.png " width="42"></a>
                                                    <a href="/account/" title="Attention"><img alt="Attention" src="<?php bloginfo('template_url'); ?>/images/icons/attention.png " width="42"></a>
                        </div> 
                        <div class="footer-left " style="width:100%;padding:10px">
                        <div class="footer-menu clearfix">
                                            <a class="footer-menu__item " style="color:#888" href="editorial-board/" title="Editorial board">Editorial board</a>
                                                        <a class="footer-menu__item" style="color:#888" href="contact/">Contact</a>
                                    </div>
                                    <?php echo do_shortcode('[gtranslate]'); ?>
                                 
                        <div class="footer-copyright clearfix" style="color:#aaa">
                            Copyright © 2019 CCnews24. All rights reserved.

                    </div>
                </div>

            </div>
                    <!-- end mob -->
                    <div class="col-md-2 col-5">
                  
                        <div class="header__appbar--right">
                            <div class="header__appbar--right__search">
                                <div class="header__appbar--right__search__button material-button material-button--icon ripple has-ripple">
                                    <i class="material-icons"></i>
                                </div>
                            </div>
                            <?php
                                if ( is_user_logged_in() ) {
                                global $rcl_user_URL;
                                echo '<a class="header__appbar--right_entry personal header__appbar--right_btn" href="'. $rcl_user_URL . '"><i class="fa fa-user"></i><span></span></a>';
                                echo '<a class="header__appbar--right_entry header-logout header__appbar--right_btn" href="' . wp_logout_url( home_url() ) . '">Exit</a>';
                                echo '<a class="header-logout-mob header__appbar--right_btn" href="' . wp_logout_url( home_url() ) . '">Exit</a>';
                                } else {
                                echo '<a href="#" class="header__appbar--right_entry header__appbar--right_btn rcl-login login-desc" >Log in</a><br />';
                                echo '<a href="#" class="header__appbar--right_create header__appbar--right_btn rcl-login login-desc" >Create</a>';
                                echo '<a href="#" class="rcl-login login-mob"><i class="material-icons"></i></a>';
                                }
                            ?>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    		
	</header><!-- #masthead -->
    <?php
    if(!is_home() || !is_front_page()){
        do_action('ta_newspaper_header_banner');
    }
    if(is_home() || is_front_page()){
            do_action('ta_newspaper_home_slider_banner');
    } ?>
	<div id="content" class="site-content">
    