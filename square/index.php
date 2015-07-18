<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Square</title>
</head>
<body>
	<?php
	if ($_SERVER['REQUEST_METHOD'] == 'POST' ) {
		
		session_start();
		if($_POST['reset'] == "Reset"){
			session_destroy();
			session_start();
		}
		$_SESSION['number'] = $_SESSION['number'] + ($_POST['number'] * $_POST['number']);
		echo "sum is $_SESSION[number]";
	}
	var_dump($_GET);
	?>
	<p>Input: </p><br>
	<form action="index.php" method="POST">
		<input type="text" name="number">
		<input type="submit" name="submit" value="Submit">
		<input type="submit" name="reset" value="Reset">
	</form>
</body>
</html>