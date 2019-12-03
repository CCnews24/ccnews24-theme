<?php
/** Home section with right sidebar **/

if( is_active_sidebar( 'ta-newspaper-home-with-sidebar' ) ){ ?>
    <div id="tan-home-sidebar-main" class="tan-home-sidebar clearfix">
        <div class="tan-container clearfix">
            <div id="primary" class="content-area">
                <main id="main" class="site-main">
        
                    <?php dynamic_sidebar( 'ta-newspaper-home-with-sidebar' ); ?>
        
                </main><!-- #main -->
            </div><!-- #primary -->
        
            <?php get_sidebar(); ?>
        
        </div>
    </div>
<?php }