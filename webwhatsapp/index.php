<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Qrcode</title>
</head>
<body>
	<img src="" alt="">
<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script>
	
	$(document).ready(function() {
		var path = 'b.html';
		setInterval(function(){  

			$.get(path, function(data) {
				// alert(data);
				$('img').attr({
					src: data
				});
			});

		},100);
	});
</script>
</body>
</html>