<?php
session_start();

?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Results</title>
	<link rel="stylesheet" href="styleres.css">
	<link rel="icon" type="image/png" href="images/h5.png" />
</head>
<body class="<?php echo $_SESSION['result']; ?>">

<div class="con">	
	<h1>
		<?php 
		echo $_SESSION['result'];
		session_destroy();
		?>
	</h1>
</div>
<footer>
	<p><a href="index.php">Back to home</a></p>
</footer>

</body>
</html>