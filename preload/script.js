 (function () {
	$('.line').hide();
	$('.text').css('font-size', '100px');
	var h = $('.text').height(),
		w = $(window).height();
	$('.text').css({
		'font-size': '0px',
		'margin-top': (w-h)/2,
	});
	$('.box').click(function(event) {
	});
		$('.line').show().animate({'width': '90%'},5000, function(){
			$(".line").fadeOut(1000);
			$('.page1').slideToggle(1000);
			$('.page2').slideToggle(1000);			
			$('.text').animate({'font-size': 100}, 2000);
		});






 })();