<?php
require 'functions.php';
$count = set_count();
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Relationship Predictor</title>
	<link rel="stylesheet" href="style.css">
	<link rel="icon" type="image/png" href="images/h5.png" />
</head>
<body>
	<h1>Relationship Predictor</h1>
	<div class='contain'>
	<h2>Input Here:</h2>
	<form action="action.php" method="post">
	<li class="box">
		<label for="name1"></label>
		<input type="text" name="name1" id="name1" placeholder="Enter your name">	
	</li>
	<li class="box">
		<label for="name2"></label>
		<input type="text" name="name2" id="name2" placeholder="Enter your lover's name">	
	</li>
	<li>
		<input type="submit" value="Submit" id="button">
	</li>

	</form>
	</div>
	<?php
		if ($_GET['id'] == 1) {
			echo '<p class="foot">Either of the inputs is Invalid.</p>';
			echo '<p class="foot">Please enter again!</p>';		
		}
	?> 
		<p class="chat"><a href="chat/index.php">Click here to chat with your loved ones</a></p>
	<footer>
		<?php echo "Visited $count times."; ?>
	</footer>
</body>
</html>