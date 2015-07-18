(function  () {
	$('.nav').hide();
	// $('body:not(.menu)').click(function(event) {
	// 	$('.nav').fadeOut();
	// });
	$('.menu').click(function(event) {
		$('.nav').fadeToggle(400);
	});
	// $('.menu').blur(function(event) {
	// 	$('.nav').fadeOut();		
	// });
	$(document).mouseup(function (e)
	{
    var container = $(".nav, .menu");

    if (!container.is(e.target) // if the target of the click isn't the container...
        && container.has(e.target).length === 0) // ... nor a descendant of the container
    {
        $('.nav').fadeOut();
    }
});

})();