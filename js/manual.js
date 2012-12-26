$(document).ready(function(){
	var ribbon = $('.ribbon a');
	$(ribbon).hover(function(){
		$(this).animate({width: '+=50'},250);
	},function(){
		$(this).animate({width: '-=50'},250);
	});
});