<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package TA Newspaper
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" itemscope itemtype="http://schema.org/WPFooter">

        <?php if( is_active_sidebar('ta-newspaper-footer-1') || 
            is_active_sidebar('ta-newspaper-footer-2') || 
            is_active_sidebar('ta-newspaper-footer-3') ){
            echo '<div class="top-footer">';
            echo '<div class="tan-container clearfix">';
            for ($x = 0; $x <= 3; $x++) {
                if( is_active_sidebar('ta-newspaper-footer-'.$x) ){
                    echo '<div id="tab-footer-widget-'.$x.'" class="tab-footer-widget">';
                        dynamic_sidebar('ta-newspaper-footer-'.$x);
                    echo '</div>';
                }
            }
            echo '</div>';
            echo '</div>';

        }?>

        <div class="bottom-footer">
            <div class="tan-container">
        		<div class="site-info">
        			<div class="footer-copyright">
                        <span class="copyright-text"><?php echo wp_kses_post( get_theme_mod( 'ta_newspaper_footer_copyright_text' ) ); ?></span>
            			<span class="sep"> | </span>
            			<?php printf( esc_html__( 'TA Newspaper By %1$s.', 'ta-newspaper' ), '<a href="'.esc_url( 'https://themesarray.com' ).'" rel="designer">'.esc_html__('Themesarray', 'ta-newspaper').'</a>' ); ?>
    	           </div><!-- .site-info -->
        		</div><!-- .site-info -->
            </div>
        </div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php $ta_newspaper_go_top_enable_disable = get_theme_mod('ta_newspaper_go_top_enable_disable');
    if($ta_newspaper_go_top_enable_disable == 'enable'){ ?>
    <div id="tan-go-top" class="tan-off"><i class="fa fa-angle-up" aria-hidden="true"></i></div>
<?php } ?>

<div id="dynamic-css"></div>

<?php wp_footer(); ?>

</body>
</html>
