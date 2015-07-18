<?php
$a=null;
require 'functions.php';
require 'config.php';
if($_POST['name1'] != null && $_POST['name2'] != null)
{
	$name = capital($_POST['name1'], $_POST['name2']);
	$pass = validate($name[0], $name[1]);
	if ($pass) {
		$result = calculate($name[0], $name[1]);
		session_start();
		$_SESSION['result'] = $result;
		header ('Location: results.php');
		if (connect ($config)) {
			$conn = connect ($config);
			$stmt = $conn->prepare('INSERT INTO records VALUES(null, :name1, :name2, :result)');
			$stmt->bindParam('name1', $name[0], PDO::PARAM_STR);
			$stmt->bindParam('name2', $name[1], PDO::PARAM_STR);
			$stmt->bindParam('result', $result, PDO::PARAM_STR);
			$stmt->execute();
		}
		else{
			echo "Could not connect";
		}
	}
	else{
		header('Location: index.php?id=1');
	}
}
else{
	header('Location: index.php?id=2');
}
?>