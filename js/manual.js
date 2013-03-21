
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
		$('#movieExtras').animate({top: '-500px'},250);
		$('#movieExtras #extraContainer').fadeIn('fast');
		$('#colophon').css('margin-top','-500px');
		$('#extraButton img').attr('src','http://development.static.spuul.com/wordpress/wp-content/uploads/2013/02/extras.jpg');
		//$('#movieExtras #extraContainer').show('fast');
	},function(){
		$('#movieExtras').animate({top: '60'},250);
		$('#colophon').css('margin-top','-0px');
		$('#movieExtras #extraContainer').fadeOut('fast');
		$('#extraButton img').attr('src','http://development.static.spuul.com/wordpress/wp-content/uploads/2013/02/extrasup.jpg');
		//$('#movieExtras #extraContainer').hide('down');
	});

	

	$('#searchform .field').focus(function(){
		windowSize = $(window).width();
		if(windowSize <= 450){
			$('#header1 .logo').fadeOut(50);
		}
	});

	$('#searchform .field').blur(function(){
		windowSize = $(window).width();
		if(windowSize <= 450){
			$('#header1 .logo').delay(200).fadeIn(200);
		}else{
			$('#header1 .logo').fadeIn(200);
		}
	});


	// logo animate
	$('#header1 .logo').hover(function(){
		$(this).animate({
			top: '-3px'
		}, 100);
	},function(){
		$(this).animate({
			top: '0px'
		}, 100);
	});

	//title hover fade

	$('.entry-header a.post_title').hover(function(){
		$(this).animate({
			color: "#f01f01"
		},200);
	},function(){
		$(this).animate({
			color: "#333"
		},200);
	});

	//Slideshow

	

	$.each(slideShow,function(i){
		$('#slideshow_1 #imageContainer').append('<div class="slideContent"><a href="'+slideShowURL[i]+'" target="_blank"><img class="imageSlide" src="'+this+'"></a></div>');
	});

	$('#imageContainer div:first').addClass('showing');

	setInterval(rotateImage, 5000);


	function rotateImage(){
		var slideShowLength = slideShow.length;;
		var current = $('#imageContainer div.showing');
		var nextCount = current.next();

		if(nextCount.length == 0){
			nextCount = $('#imageContainer .slideContent:first');
		}

		current.removeClass('showing').addClass('prev');
		nextCount.css('opacity','0').addClass('showing').animate({opacity:1.0},1000,function(){
			current.removeClass('prev');
		});
	}	

	
});

