jQuery(document).ready(function($) {	

    /** Script for switch option **/
    $('.switch_button').each(function() {
        //This object
        var obj = $(this);
    
        var switchPart = obj.children('.switch_part').attr('data-switch');
        var input = obj.children('input'); //cache the element where we must set the value
        var input_val = obj.children('input').val(); //cache the element where we must set the value
    
        obj.children('.switch_part.'+input_val).addClass('selected');
        obj.children('.switch_part').on('click', function(){
            var switchVal = $(this).attr('data-switch');
            obj.children('.switch_part').removeClass('selected');
            $(this).addClass('selected');
            $(input).val(switchVal).change(); //Finally change the value to 1
        });

    });
    
    /** Radio Image **/
    $( '[id="input_ta_newspaper_archive_layout"]' ).buttonset();
    $( '[id="input_ta_newspaper_slider_layout"]' ).buttonset();

    /* Move Widget Area Into Cutomizer Pannel As section */
    wp.customize.section( 'sidebar-widgets-ta-newspaper-home-with-sidebar' ).panel( 'ta_newspaper_home_panel' );
    wp.customize.section( 'sidebar-widgets-ta-newspaper-home-with-sidebar' ).priority( '20' );
    wp.customize.section( 'sidebar-widgets-ta-newspaper-home-full-width' ).panel( 'ta_newspaper_home_panel' );
    wp.customize.section( 'sidebar-widgets-ta-newspaper-home-full-width' ).priority( '25' );
    
    //Scroll to section
    $('body').on('click', '#sub-accordion-panel-ta_newspaper_home_panel .control-subsection .accordion-section-title', function(event) {
        var section_id = $(this).parent('.control-subsection').attr('id');
        ta_newspaper_scroll_to( section_id );
    });

    /* Redirect Front Page */
    wp.customize.panel( 'ta_newspaper_home_panel', function( section ){
        section.expanded.bind( function( isExpanded ) {
            if( isExpanded ){
                wp.customize.previewer.previewUrl.set( ta_newspaper_customize_data.home_url );
            }
        });
    });

});


/** Scroll To Funciton **/
function ta_newspaper_scroll_to( container_id ){
    var active_section = "banner_section";

    var $preview_frame = jQuery('#customize-preview iframe').contents();

    switch ( container_id ) {
        
        case 'accordion-section-ta_newspaper_home_banner_section':
        active_section = "main-slider-wrap";
        break;

        case 'accordion-section-sidebar-widgets-ta-newspaper-home-with-sidebar':
        active_section = "tan-home-sidebar-main";
        break;

        case 'accordion-section-sidebar-widgets-ta-newspaper-home-full-width':
        active_section = "tan-home-full-width-wrap";
        break;

    }

    if( $preview_frame.find('#'+active_section).length > 0 && $preview_frame.find('.home').length > 0 ){
        $preview_frame.find("html, body").animate({
        scrollTop: $preview_frame.find( "#" + active_section ).offset().top
        }, 1000);
    }
}

( function( api ) {

    api.sectionConstructor['pro-section'] = api.Section.extend( {

        attachEvents: function () {},

        isContextuallyActive: function () {
            return true;
        }
    } );

} )( wp.customize );