(function () {
	$('.fullpage').fullpage({
		menu: true,
        navigation: true,
        navigationPosition: 'right',
        navigationTooltips: ['Home', 'New Releases', 'Directions', 'Help'],
        showActiveTooltips: true,
        slidesNavigation: true,
        slidesNavPosition: 'top'
	});

	$('.slider').bjqs({
		'height' : 420,
		'width' : 320,
		'animspeed' : 2000,
		'responsive' : true,
		'showcontrols' : false,
		'showmarkers' : false,
		'hoverpause' : false
	});

	function initialize() {
        var mapCanvas = document.getElementById('mapcanvas');
        var myLatlng = new google.maps.LatLng(22.5548723, 88.3087825);
        var mapOptions = {
          center: myLatlng,
          zoom: 17,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        }
        var map = new google.maps.Map(mapCanvas, mapOptions)
      	var marker = new google.maps.Marker({
      		position: myLatlng,
  			  title:"library"
      	});
      	marker.setMap(map);
      }
      google.maps.event.addDomListener(window, 'load', initialize);

      $('.imgdown').click(function(event) {
      	 	console.log('pressed');
      	 	var press = jQuery.Event("keydown");
			press.ctrlKey = false;
			press.which = 40;
			$('body').trigger(press);
      });

})();