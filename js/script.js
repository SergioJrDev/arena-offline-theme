$(document).ready(function(){
 	$('.hamburger').click(function() {

		if($(this).closest('.nav').find('.nav-content').hasClass('showMenu')) {
			$(this).removeClass('is-active');
			$(this).closest('.nav').find('.nav-content').removeClass('showMenu').slideUp('slow');
		} else {
			$(this).addClass('is-active');
			$(".nav-content").removeClass('showMenu').slideUp('slow');
			$(this).closest('.nav').find('.nav-content').addClass('showMenu').slideDown('slow');
		}
 		
	 });
	 
	 $('.click-game').click(function() {
		if($(this).hasClass('showGame')) {
			$(this).removeClass('showGame')
			$(this).next().slideUp('slow');
		} else {
			$('.game-content').slideUp('slow');
			$('.click-game').removeClass('showGame')
			$(this).addClass('showGame')
			$(this).next().slideDown('slow');
		}
	 }); 


	 $('.select_paginate').change(function(e) {
		$(this).closest( "form" ).submit();
	 });
 
	 $('.slider-front').owlCarousel({
		loop:true,
		margin:10,
		nav:true,
		dots: false,
		autoplay:true,		
		autoplayTimeout:3000,		
		autoplayHoverPause:true,
		navText: ['<i class="fa fa-chevron-left" aria-hidden="true"></i>', '<i class="fa fa-chevron-right" aria-hidden="true"></i>'],
		responsive:{
			0:{
				items:1
			},
			600:{
				items:3
			},
		}
	});

	$('.owl-carousel-main').owlCarousel({
		loop:true,
		margin:10,
		nav:false,
		dots: true,
		autoplay:true,		
		autoplayTimeout:3000,		
		autoplayHoverPause:true,
		navText: ['<i class="fa fa-chevron-left" aria-hidden="true"></i>', '<i class="fa fa-chevron-right" aria-hidden="true"></i>'],
		responsive:{
			0:{
				items:1
			},
		}
	});
			
});
