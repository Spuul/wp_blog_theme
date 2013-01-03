$(document).ready(function(){
	/* Ribbon Animation */
	var ribbon = $('.ribbon a');
	$(ribbon).hover(function(){
		$(this).stop().animate({left: -10},250);
		$(this).next().stop().animate({left: 10},250);
	},function(){
		$(this).stop().animate({left: -20},250);
		$(this).next().stop().animate({left: 0},250);
	});
});

$(document).ready(function(){
	/* Spuul Logo animation */
	$('.spuul_logo').hover(function(){
		$(this).stop().animate({top: '0'},200);
	},function(){
		$(this).stop().animate({top: '5'},200);
	});
});
