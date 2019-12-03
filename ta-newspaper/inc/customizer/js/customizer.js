/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {

	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );
    
    wp.customize( 'ta_newspaper_news_slide_news_title', function( value ) {
		value.bind( function( to ) {
			$( '.title-slide span' ).text( to );
		} );
	} );
    
    wp.customize( 'ta_newspaper_theme_color', function( value ) {
		value.bind( function( theme_color ) {
			if(theme_color){
    		  var borderColor = '<style>' +
                  '#tan-go-top, .tnp-widget-minimal input.tnp-submit{background:'+theme_color+';}'+
                  '</style>';
                  $('#dynamic-css').html(borderColor);
              }
		} );
	} );
    

	// Header text color.
	wp.customize( 'header_textcolor', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( '.site-title a, .site-description' ).css( {
					'clip': 'rect(1px, 1px, 1px, 1px)',
					'position': 'absolute'
				} );
			} else {
				$( '.site-title a, .site-description' ).css( {
					'clip': 'auto',
					'position': 'relative'
				} );
				$( '.site-title a, .site-description' ).css( {
					'color': to
				} );
			}
		} );
	} );
} )( jQuery );
