
$('.cc-stats').slick({
	infinite: true,
	slidesToShow: 3,
  slidesToScroll: 1,
  autoplay: true,
  autoplaySpeed: 500,
  speed: 5000,
  responsive: [
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1,
        infinite: true
      }
	}
  ]	
});
$(document).ready(function(){
   
    
     
	var header = $('#masthead'),
	scrollPrev = 0;

$(window).scroll(function() {
var scrolled = $(window).scrollTop();

if ( scrolled > 100 && scrolled > scrollPrev ) {
	header.addClass('fixed');
} else {
	header.removeClass('fixed');
}
scrollPrev = scrolled;
});

        
	$(function (){
		
		$("#back-top").hide();
	
		$(window).scroll(function (){
			if ($(this).scrollTop() > 100){
				$("#back-top").fadeIn();
			} else{
				$("#back-top").fadeOut();
			}
		});

	
		$("#back-top a").click(function (){
			$("body,html").animate({
				scrollTop:0
			}, 800);
			return false;
		});
	});

//  scroll
$(window).on("scroll resize", function() {
	var o = $(window).scrollTop() / ($(document).height() - $(window).height());
	
	 var progress = $(".progress-bar");
	
	 $.each(progress, function(element) {
		$(element).css({
			"width": (100 * o | 0) + "%"
		});
		$('progress')[0].value = o; 
	 })
	 
	
})
//scroll
	
});

//likes
jQuery(document).ready(function() {
jQuery(".post-like a").click(function(){
heart = jQuery(this);
// Retrieve post ID from data attribute
 post_id = heart.data("post_id");
// Ajax call
 jQuery.ajax({
 type: "post",
 url: ajax_var.url,
 data: "action=post-like&nonce="+ajax_var.nonce+"&post_like=&post_id="+post_id,
 success: function(count){
 // If vote successful
 if(count != "already")
 {
 heart.addClass("voted");
 heart.siblings(".count").text(count);
 }
 }
 });
 return false;
 })
 })