jQuery(function( $ ){

	// Smooth scrolling when clicking on a hash link
	$('a[href^="#"]').on('click',function (e) {
		e.preventDefault();

		var target = this.hash;
		var $target = $(target);

		if ( $(window).width() > 1000 ) {
			var $scrollTop = $target.offset().top-80;
		} else {
			var $scrollTop = $target.offset().top;
		}

		$('html, body').stop().animate({
			'scrollTop': $scrollTop
		}, 900, 'swing');
	});

});