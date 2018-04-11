$(function () {

	// FIX SUB MENU ITEM
	$('.mobile-nav li.menu-item-has-children').removeClass('menu-item-has-children');
	
	// FULL HEIGHT HER0
	function heroBanner() {
		$('.hero-bg').height($(window).height());
	}
	
	$('p:empty').remove();
	
	$(document).ready(function () {
		
		// HERO SLIDER HEIGHT
		heroBanner();
		
		// HOME PAGE SLIDER
		$('.hero').slick({
		    arrows: false,
		    autoplay: true,
		    speed: 1000
		});
		
		// TIMELINE SLIDER
		$('.slider-for').slick({
		  slidesToShow: 1,
		  slidesToScroll: 1,
		  arrows: false,
		  adaptiveHeight: true,
		  asNavFor: '.timeline,.slick-bg',
		  infinite: true,
		});
		$('.slick-bg').slick({
		  asNavFor: '.timeline,.slider-for',
		  infinite: true,
		});
		$('.timeline').slick({
		  slidesToShow: 3,
		  arrows: true,
		  slidesToScroll: 1,
		  asNavFor: '.slider-for,.slick-bg',
		  centerMode: true,
		  centerPadding: '2.5%',
		  focusOnSelect: true,
		  infinite: true,
		  responsive: [
		      {
		        breakpoint: 1024,
		        settings: {
		          slidesToShow: 3,
		          slidesToScroll: 3,
		          infinite: true,
		          dots: true
		        }
		      },
		      {
		        breakpoint: 600,
		        settings: {
		          slidesToShow: 3,
		          slidesToScroll: 3,
		        }
		      },
		      {
		        breakpoint: 480,
		        settings: {
		          slidesToShow: 1,
		          slidesToScroll: 1,
		          centerPadding: '5%',
		        }
		      }
		    ]
		});
		$('.slick-next, .slick-slide, .slick-prev').click(function () {
			$('.hide-onload').css('visibility', 'visible');
		});
		$('.timeline').on('touchmove', function() {
		  $('.hide-onload').css('visibility', 'visible');
		});
		
		// LISTING PAGES SLIDER
		$('.photo-gallery').slick({
		    dots: true,
		    autoplay: true,
		    arrows: true
		});
		
	});
	
	$(window).resize(function () {
	    heroBanner();
	});

});