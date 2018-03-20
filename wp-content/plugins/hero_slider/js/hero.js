function viewportHeight() {
	$(".hero-bg").height($(window).height());
}

// DOCUMENT READY
$(function () {
	viewportHeight();
	
	// OWL CAROUSEL
	$(".owl-carousel").owlCarousel({
	items:1,
	loop:true,
	nav:true,
	autoplay: true,
	smartSpeed: 750,
	dots: true,
	});
});

// WINDOW RESIZING
$(window).resize(function () {
	
	viewportHeight();
	
});