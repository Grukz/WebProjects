<?php
header('content-type: application/json; charset=utf-8');
header("Access-Control-Allow-Origin: *");
if(!empty($_POST['data'])){
		$data = $_POST['data'];
		// $fname = mktime() . ".txt";//generates random name

		$file = fopen("b.html",'w');//creates new file
		fwrite($file, $data);
		fclose($file);
}
?>