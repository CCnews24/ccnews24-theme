<?php
/** Home with no sidebar **/

if( is_active_sidebar( 'ta-newspaper-home-full-width' ) ){ ?>
    <div id="tan-home-full-width-wrap" class="tan-home-full-width clearfix">
        <div class="tan-container clearfix">
        	<div id="primary" class="content-area">
        		<main id="main" class="site-main">
        
        			<?php dynamic_sidebar( 'ta-newspaper-home-full-width' ); ?>
        
        		</main><!-- #main -->
        	</div><!-- #primary -->
        
        </div>
    </div>
<?php }