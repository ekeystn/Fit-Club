/* 
* Adds live changes to  theme  customizer
*/

(function ($){

	//update colors in real time
	wp.customize('content_text_color', function(value){
		value.bind(function(newval){
			$('.site-main').css('color', newval);
		});
	});

	wp.customize('content_link_color', function(value){
		value.bind(function(newval){
			$('.site-main a, .site-main a:visited').css('color', newval);
		});
	});

	wp.customize('logo_text_color', function(value){
		value.bind(function(newval){
			$('#logo').css('color', newval);
		});
	});

	wp.customize('tagline_text_color', function(value){
		value.bind(function(newval){
			$('#tagline').css('color', newval);
		});
	});

	wp.customize('article_header_color', function(value) {
		value.bind(function(newval){
			$('.site-content h1, .site-content h2, .site-content h3, .site-content h4, .site-content h5, .site-content h6, .site-content h1 a, .site-content h2 a, .site-content h3 a, .site-content h4 a, .site-content h5 a, .site-content h6 a, .entry-meta').css('color', newval);
		});
	});

	wp.customize('side_bar_header_color', function(value) {
		value.bind(function(newval){
			$('.site-content .page-side-bar h1, .site-content .page-side-bar h2, .site-content .page-side-bar h3, .site-content .page-side-bar h4, .site-content .page-side-bar h5, .site-content .page-side-bar h6').css('color', newval);
		});
	});

	wp.customize('header_footer_background_color', function(value){
		value.bind(function(newval){
			$('.site-header, .site-footer').css('background-color', newval);
		});
	});

	wp.customize('header_footer_border_color', function(value){
		value.bind(function(newval){
			$('.site-header, .site-footer').css('border-color', newval);
		});
	});

	wp.customize('header_footer_link_color', function(value){
		value.bind(function(newval){
			$('.main-navigation a, .site-footer .site-info a, .site-footer .site-info, .site-header, .site-header a').css('color', newval);
		});
	});

	wp.customize('menu_active_background_color', function(value){
		value.bind(function(newval){
			$('.main-navigation li:hover > a, .main-navigation li.current_page_item a, .main-navigation li.current-menu-item a').css('background-color', newval);
		});
	});


	wp.customize('blogname', function(value){
		value.bind(function(newval){
			$('#text-logo').html(newval);
		});
	});

	wp.customize('blogdescription', function(value){
		value.bind(function(newval){
			$('#tagline').html(newval);
		});
	});

})(jQuery);