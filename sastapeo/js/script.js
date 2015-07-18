$(function(){
	// $("select").searchable();
	$('button').click(function(event) {
		animate_form();
	});
	$('div.card').hide();
	$('input').keypress(function(event) {
		if (event.which == 13) {
			animate_form();
			return false; 
  		}
	});

	function animate_form () {
		$('div.container').delay(250).animate({'margin-top': '2em'}, 1000, function() {
			
			$('div.card').fadeIn('slow', function() {
				
			});;
			
		});
	}

	var menu = [];
	
	$.get('getdata.php', function(response) {
		var json = $.parseJSON(response);
		// console.log(json[0][0]);
		$.each(json, function(index, val) {
			 // console.log(json[index][0]);
			var inner = {};
			inner['text'] = json[index][0] + "";
			inner['value'] = json[index][0] + "";
			menu.push(inner);		 
		});
	});


	 // [
		//     {text: 'Alabama', value: 'AL'},
		//     {text: 'Alaska', value: 'AK'},
		//     {text: 'Wisconsin', value: 'WI'},
		//     {text: 'Wyoming', value: 'WY'}
	 //  	]


	$('input').immybox({
	  	choices: menu,
	  	maxResults: 4,
	  	openOnClick: false
	});

});