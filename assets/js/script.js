$(document).ready(function() {
	$('.home-banner').slick();
	$('.slick-2-items').slick({
		slidesToShow: 3,
		slidesToScroll: 3,
		responsive: [
			{
				breakpoint: 992,
				settings: {
				  	slidesToShow: 2,
					slidesToScroll: 1
				}
		 	},
			{
			  	breakpoint: 480,
			  	settings: {
				 	slidesToShow: 1,
					slidesToScroll: 1,
			  	}
			}
		]
	});
});