$(document).ready(function() {
	$('.home-banner').slick();
	$('.slick-2-items').slick({
		slidesToShow: 3,
		slidesToScroll: 1,
		responsive: [			
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