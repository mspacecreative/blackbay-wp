// MOBILE NAVIGATION
$('.mobile-nav li.menu-item-has-children').prepend('<span class="sub-toggle"><i class="fa fa-angle-down"></i></span>');
$('span.sub-toggle').click(function (){
  $(this).siblings('.sub-menu').slideToggle();
  $(this).children().toggleClass('fa-angle-down fa-angle-up');
});

//$('li.menu-item-has-children').css('width', $('#menu-main-menu').width()-$('.sub-toggle').outerWidth());

// HAMBURGER ICON ANIMATION
$('.hamburger').click(function() {
	$('body').toggleClass('is-active');
});

$('.body-overlay').click(function() {
	$('body').toggleClass('is-active');
});

// CLOSE PANEL UPON LINK CLICK
$('.mobile-nav li > a').click(function() {
	$('body').toggleClass('is-active');
});

// HAMBURGER VERTICAL ALIGN
function hamburgerIcon() {
	$('.hamburger').css('height', $('#logo-container').height());
}

$(document).ready(function () {
	hamburgerIcon();
});

$(window).resize(function () {
	hamburgerIcon();
});