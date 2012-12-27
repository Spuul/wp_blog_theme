$(document).ready(function(){
	/* Ribbon Animation */
	var ribbon = $('.ribbon a');
	$(ribbon).hover(function(){
		$(this).animate({width: '+=50'},250);
	},function(){
		$(this).animate({width: '-=50'},250);
	});

	/* Spuul Logo animation */
	$('.spuul_logo').hover(function(){
		$(this).animate({top: '-=5'},200);
	},function(){
		$(this).animate({top: '+=5'},200);
	});
});