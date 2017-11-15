$(document).ready(function(){
	$('.hamburger').click(function() {
		$(this).toggleClass('is-active');
		 if($(".nav-content").hasClass('showMenu')) {
			$(".nav-content").removeClass('showMenu').slideUp('slow');
		} else {
			$(".nav-content").addClass('showMenu').slideDown('slow');	 
	 	}  
	});

 	// setInterval(function() {
 	// 	let now = new Date(),
 	// 		wedding = new Date('2018-10-25T12:00:00'),
 	// 		difference = new Date(wedding - now),
 	// 		days = difference.getDay(),
 	// 		hours = difference.getHours(),
 	// 		month = difference.getMonth(),
 	// 		year = difference.getFullYear(),
 	// 		minutes = difference.getMinutes(),
 	// 		seconds = difference.getSeconds();

 	// 		$('.number-days').text(days + (month * 30));
 	// 		$('.number-hours').text(hours);
 	// 		$('.number-minutes').text(minutes);
 	// 		$('.number-seconds').text(seconds);

 	// }, 1000);

 	$(".owl-carousel").owlCarousel({
	    autoHeight: true,
	    items:1,
	    nav: true,
	    navText: ['<i class="fa fa-chevron-left" aria-hidden="true"></i>', '<i class="fa fa-chevron-right" aria-hidden="true"></i>']
 	});
});