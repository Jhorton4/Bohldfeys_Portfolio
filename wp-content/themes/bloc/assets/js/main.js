/*******************/
/**** Theme JS  ****/ 
/*******************/

(function( $ ){
	"use strict";
	
	// -- Ready --
	$(document).ready(function() {
	
		// Scroll speed
		if ( $('body').hasClass('smooth-scrolling') ) {		
			$("body").niceScroll({
				scrollspeed: 60,
				mousescrollstep: 40,
				autohidemode: false,
				horizrailenabled: false				
			});
		}
		
	});
	
	$(window).load(function(){

		// -- Sidebar pin --
		// Portfolio
		if ( $('body').hasClass('single-ac_portfolio') && $('body').hasClass('ac_sticky_sidebars') ) {
			$(".single-ac_portfolio .side-images .ac-page-right-side").stickyMojo({footerID: '#page-bottom', contentID: '.ac-page-left-side'});			
		}
		
	});	

	
	// -- Resize --
	$( window ).resize(function() {

		// Portfolio - re-parent article footer from left col to right col
		if ( $('body').hasClass('single-ac_portfolio') ) {
			
			// We cant get the column width in %
			// Workaround, is the right column more than 50% of the window?
			if ( $('.ac-page-right-side').width() > ($(window).width()/2) ) {
				$('.ac-page-right-side').append( $('.article-footer') );				
			}
			else {
				$('.ac-page-left-side').append( $('.article-footer') );
			}
									
		}


	});
	
	$(window).trigger('resize');

})( jQuery );