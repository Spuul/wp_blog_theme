
$(document).ready(function(){
	/* Spuul Logo animation */
	$('.spuul_logo').hover(function(){
		$(this).stop().animate({top: '0'},200);
	},function(){
		$(this).stop().animate({top: '5'},200);
	});
});
