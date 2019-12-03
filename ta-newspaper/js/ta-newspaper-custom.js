jQuery(document).ready(function($){
    'usr strict';

    // Menu
    $('#toggle').click(function(){
        $('#site-navigation').toggleClass('on-menu');
        $('#primary-menu').slideToggle();
    });

    $('#top-toggle').click(function(){
        $('.top-main-navigation').toggleClass('on-menu');
        $('#top-menu').slideToggle();
    });

    $('a.ta-toggle-search').click(function(){

        var class_get = $('.ta-toggle-search i').attr('class');
        if( class_get == 'fa fa-search' ){

            $('.ta-toggle-search i').removeClass('fa-search');
            $('.ta-toggle-search i').addClass('fa-times');
            
        }else{

            $('.ta-toggle-search i').removeClass('fa-times')
            $('.ta-toggle-search i').addClass('fa-search')

        }
        $('.header-search').slideToggle();

    });
    var sf = $('.ht-menu > ul').superfish({
        delay:       500,                            // one second delay on mouseout
        animation:   {opacity:'show',height:'show'},  // fade-in and slide-down animation
        speed:       'fast',                          // faster animation speed
    });

    $(window).resize(function(){
        if($(window).width() < 1000){
            sf.superfish('destroy');
            $('.tab-submenu').removeClass('tab-submenu-open');
        }else{
            sf.superfish('init');
        }
    }).resize();

    $('.menu-item-has-children > a').append('<span class="tab-submenu"><i class="fa fa-chevron-right"></i></span>');

    $('.tab-submenu').on('click', function(){
        $(this).parent('a').next('ul').slideToggle();
        $(this).toggleClass('tab-submenu-open');
        return false;
    });
    
    //Sickey Sidebar
    $('#secondary, #primary').theiaStickySidebar();

    /** Gallery Icon **/
    $('.widget .gallery-icon a').each(function(){
        var imglink  = $(this).children('img').attr('src'); 
        var result = imglink.split('-');
        var count = result.length-1;
        var exclude = result[count].split('.');
        var result_1 = imglink.split('-'+result[count]);
        result_1 = result_1[0]+'.'+exclude[1];
        $(this).attr("href", result_1);
    });
    $(".widget .gallery-icon a").fancybox();

    /** Main Slider **/
    $('.slider-all-contents').owlCarousel({
        loop:true,
        margin:5,
        nav:true,
        autoplay:false,
        items:3,
        dots:false,
        navText:['<i class="fa fa-chevron-left" aria-hidden="true"></i>','<i class="fa fa-chevron-right" aria-hidden="true"></i>'],
        responsive:{
            0:{
                items:1,
            },
            600:{
                items:2,
            },
            600:{
                items:2,
            },
            720:{
                items:3,
            },
            1000:{
                items:3,
            }
        }
    });

    $('.slider-all-contents-2').owlCarousel({
        loop:true,
        margin:10,
        nav:true,
        dots:false,
        autoplay:false,
        items:1,
        navText:['<i class="fa fa-chevron-left" aria-hidden="true"></i>','<i class="fa fa-chevron-right" aria-hidden="true"></i>'],
        stagePadding: 200,
        responsive:{
            0:{
                items:1,
                stagePadding:0,
            },
            720:{
                items:1,
                stagePadding:200,
            },
        }
    });

    $('.slider-all-contents-3').owlCarousel({
        loop:true,
        margin:0,
        nav:true,
        dots:false,
        autoplay:false,
        items:1,
        navText:['<i class="fa fa-chevron-left" aria-hidden="true"></i>','<i class="fa fa-chevron-right" aria-hidden="true"></i>'],
    });

    /** Post Slide Layout One **/
    $('.owl-carousel.post-slider-contents').owlCarousel({
        loop:true,
        margin:0,
        nav:true,
        dots:false,
        autoplay:true,
        items:1,
        navText:['<i class="fa fa-chevron-left" aria-hidden="true"></i>','<i class="fa fa-chevron-right" aria-hidden="true"></i>'],
    });

    /** Post Slide Layout Two **/
    $('.owl-carousel.post-slider-contents-2').owlCarousel({
        loop:true,
        margin:0,
        nav:true,
        dots:false,
        autoplay:true,
        items:1,
        navText:['<i class="fa fa-chevron-left" aria-hidden="true"></i>','<i class="fa fa-chevron-right" aria-hidden="true"></i>'],
    });

    /** Post Slide Layout Three **/
    $('.slider-all-contents-3-slide-post').owlCarousel({
        loop:true,
        margin:2,
        nav:true,
        dots:false,
        autoplay:false,
        items:4,
        navText:['<i class="fa fa-chevron-left" aria-hidden="true"></i>','<i class="fa fa-chevron-right" aria-hidden="true"></i>'],
        responsive:{
            0:{
                items:1,
            },
            600:{
                items:2,
            },
            800:{
                items:3,
            },
            1000:{
                items:4,
            }
        }
    });

    /** Sidebar Recent Post Layout Two **/
    $('.owl-carousel.recent-blog-loop-wrap-2').owlCarousel({
        loop:true,
        margin:0,
        nav:true,
        dots:false,
        autoplay:true,
        items:1,
        navText:['<i class="fa fa-chevron-left" aria-hidden="true"></i>','<i class="fa fa-chevron-right" aria-hidden="true"></i>'],
    });

    /** Tab Post Slide **/
    $('.main-pct-content').owlCarousel({
        loop:true,
        margin:2,
        nav:true,
        dots:false,
        autoplay:false,
        items:4,
        navText:['<i class="fa fa-chevron-left" aria-hidden="true"></i>','<i class="fa fa-chevron-right" aria-hidden="true"></i>'],
        responsive:{
            0:{
                items:1,
            },
            600:{
                items:2,
            },
            600:{
                items:2,
            },
            720:{
                items:4,
            },
            1000:{
                items:4,
            }
        }
    });

    /** Bact To Top **/
    $(window).scroll(function(){
      if($(window).scrollTop() > 300){
          $('#tan-go-top').removeClass('tan-off');
      }else{
          $('#tan-go-top').addClass('tan-off');
      }
    });

    $('#tan-go-top').click(function(){
      $('html,body').animate({scrollTop:0},800);
    });

});
