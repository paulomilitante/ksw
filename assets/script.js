$(document).ready(function(){
	$('.scrollspy').scrollSpy({scrollOffset : 0});
	$('select').formSelect();
	$('.sidenav').sidenav();
	$('.collapsible').collapsible();
	$('.carousel.carousel-slider').carousel({
		fullWidth: true,
		indicators: true,
		height: 300
	});
});