
$(document).ready(function(){
	/* Spuul Logo animation */
	$('#logo_menu .spuul_logo').hover(function(){
		$(this).stop().animate({top: '-5'},200);
	},function(){
		$(this).stop().animate({top: '0'},200);
	});

	
	/* Spuul Blog menu */
	$('.spuul_logo').toggle(function(){
		$(this).next().animate({opacity: '1', top: '55'},300);
	},function(){
		$(this).next().animate({opacity: '0',top: '-75'},300);
	});

	$('#extraButton').toggle(function(){
		$('#movieExtras').animate({top: '-750px'},250);
		$('#movieExtras #extraContainer').fadeIn('fast');
		$('#colophon').css('margin-top','-750px');
		$('#extraButton img').attr('src','http://development.static.spuul.com/wordpress/wp-content/uploads/2013/02/extras.jpg');
		//$('#movieExtras #extraContainer').show('fast');
	},function(){
		$('#movieExtras').animate({top: '60'},250);
		$('#movieExtras #extraContainer').fadeOut('fast');
		$('#extraButton img').attr('src','http://development.static.spuul.com/wordpress/wp-content/uploads/2013/02/extrasup.jpg');
		//$('#movieExtras #extraContainer').hide('down');
	});
});

