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
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> itemscope itemtype="http://schema.org/WebPage" >
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'ta-newspaper' ); ?></a>
	<header id="masthead" class="site-header header" itemscope itemtype="http://schema.org/WPHeader">

            


<div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="header__searchbar">
                        <div class="header__searchbar__container">
                        
                            <form role="search" action="http://localhost/ccnews/www/" method="get" class="d-flex">
                               
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
            <div class="container">
                <div class="row">
                    <div class="col-md-9">
                        <div class="header__appbar--left d-flex">
                      
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
                                <ul class="header__appbar--left__menu__list">
                                   
                                    <li class="header__appbar--left__menu__list__item">
                                        <a class="category-dropdown-button ripple has-dropdown has-ripple" href="javascript:" data-target="category-dropdown" data-align="center">
                                            <i class="material-icons"></i>
                                        </a>
                                        <div class="category-dropdown dropdown-container">
                                            <div class="category-dropdown_sec sec_cat1 clearfix">
                                                <div class="category-dropdown_community">
                                                    <div class="community_title">Hey CCnews24 Community!
                                                    </div>
                                                    <div class="community_desc">   
                                                        <a href="/login">Log in</a> or 
                                                        <a href="/register">sign up</a> to create your own posts.
                                                    </div>
                                                </div>
                                                <div class="reaction-emojis">
                                                    <a href="/reactions/bullish" title="Bullish"><img alt="Bullish" src="<?php bloginfo('template_url'); ?>/images/img/bullish" width="42"></a>
                                                    <a href="/reactions/bearish" title="Bearish"><img alt="Bearish" src="<?php bloginfo('template_url'); ?>/images/img/bearish.png " width="42"></a>
                                                    <a href="/reactions/like" title="Like"><img alt="Like" src="<?php bloginfo('template_url'); ?>/images/img/5a7b45263bf58-thumbup.png " width="42"></a>
                                                    <a href="/reactions/dislike" title="Dislike"><img alt="Dislike" src="<?php bloginfo('template_url'); ?>/images/img/thumbdown.png " width="42"></a>
                                                    <a href="/reactions/lol" title="LOL"><img alt="LOL" src="<?php bloginfo('template_url'); ?>/images/img/lol.png " width="42"></a>
                                                    <a href="/reactions/hooray" title="Hooray"><img alt="Hooray" src="<?php bloginfo('template_url'); ?>/images/img/horn.png " width="42"></a>
                                                    <a href="/reactions/attention" title="Attention"><img alt="Attention" src="<?php bloginfo('template_url'); ?>/images/img/attention.png " width="42"></a>
                                                </div>
                                            </div>
                                            <div class="category-dropdown_sec sec_cat2 clearfix">
                                                <ul class="d-flex sec_cat2-list">
                                                    <li class="dropdown-container__item ripple has-ripple" style="float:left;width:25%">
                                                        <a href="/ico-passport" title="ICO passport">ICO passport </a>
                                                    </li>
                                                    <li class="dropdown-container__item ripple has-ripple" style="float:left;width:25%">
                                                        <a href="/live-icos" title="Live ICOs">Live ICOs </a>
                                                    </li>
                                                    <li class="dropdown-container__item ripple has-ripple" style="float:left;width:25%">
                                                        <a href="/upcoming-icos" title="Upcoming ICOs">Upcoming ICOs </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="category-dropdown_sec sec_cat3 clearfix">
                                             <div class="logo-dropdown"><?php the_custom_logo( $blog_id ); ?></div>
                                            <div class="language-links hor">
                                                    <a class="button button-white" href="javascript:">
                                                        <i class="material-icons"></i> <b>English</b>
                                                    </a>
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
                                                    <a class="footer-menu__item " href="https://ccnews24.net/pages/editorial-board" title="Editorial board">Editorial board
                                                    </a>
                                                    <a class="footer-menu__item" href="https://ccnews24.net/contact">Contact</a>
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
                    <div class="col-md-3">
                        <div class="header__appbar--right">
                            <div class="header__appbar--right__search">
                                <div class="header__appbar--right__search__button material-button material-button--icon ripple has-ripple">
                                    <i class="material-icons"></i>
                                </div>
                            </div>
                            <a href="#" class="header__appbar--right_create header__appbar--right_btn">Create</a>
                            <a href="#" class="header__appbar--right_entry header__appbar--right_btn">Entry</a>
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
    