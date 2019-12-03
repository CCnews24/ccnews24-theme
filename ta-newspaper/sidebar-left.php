<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package TA Newspaper
 */

if ( ! is_active_sidebar( 'ta-newspaper-left-sidebar' ) ) {
	return;
}?>

<aside id="secondary" class="widget-area sidebar-left" itemscope itemtype="http://schema.org/WPSideBar">
	<?php dynamic_sidebar( 'ta-newspaper-left-sidebar' ); ?>
</aside><!-- #secondary -->
