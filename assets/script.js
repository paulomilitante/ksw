$(document).ready(function(){
	$('.scrollspy').scrollSpy({scrollOffset : 0});
	$('select').formSelect();
	$('.sidenav').sidenav();
	$('.collapsible').collapsible();
	$('.carousel.carousel-slider').carousel({
		indicators: true,
		numVisible: 3,
		width: 400
	});
});