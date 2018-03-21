$(function () {

	// TIMELINE SLIDER
	$('.slider-for').slick({
	  slidesToShow: 1,
	  slidesToScroll: 1,
	  arrows: false,
	  adaptiveHeight: true,
	  asNavFor: '.timeline,.slick-bg',
	  infinite: true
	});
	$('.slick-bg').slick({
	  asNavFor: '.timeline,.slider-for',
	  fade: true,
	  infinite: true
	});
	$('.timeline').slick({
	  slidesToShow: 3,
	  slidesToScroll: 1,
	  asNavFor: '.slider-for,.slick-bg',
	  centerMode: true,
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
	          centerPadding: '5%',
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

});