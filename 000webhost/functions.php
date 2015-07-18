<?php

function capital($name1, $name2){
		$name1 = trim(strtoupper($name1));
		$name2 = trim(strtoupper($name2));
		return $name = array("$name1", "$name2");

}

function validate($name1, $name2){
	$len1 = strlen($name1);
	$len2 = strlen($name2);
	for ($i=0; $i <$len1 ; $i++) { 
		if(ord($name1[$i]) < 65 || ord($name1[$i]) > 90)
		{
			if(ord($name1[$i]) != 32)
			{
				return false;
				die();
			}
		}
	}
	for ($i=0; $i <$len2 ; $i++) { 
		if(ord($name2[$i]) < 65 || ord($name2[$i]) > 90)
		{
			if(ord($name2[$i]) != 32)
			{
				return false;
				die();
			}
		}
	}
	return true;

}

function calculate($name1, $name2){

	$arr = array('Friends', 'Love', 'Affair', 'Marriage', 'Enemy', 'Sister');
	$len1 = strlen($name1);
	$len2 = strlen($name2);
	$c=(int)0;
	
	for($i=0;$i<$len1;$i++)
	{
		$ch1=$name1[$i];
		for($j=0;$j<$len2;$j++)
		{
			$ch2=$name2[$j];
			if($ch1==$ch2)
			{
				$name1[$i]='$';
				$name2[$j]='$';
				break;
			}
		}
	}
	for($i=0;$i<$len1;$i++)
	{
		if($name1[$i]!='$' && $name1[$i]!=' ')
			$c++;
	}
	for($j=0;$j<$len2;$j++)
	{
		if($name2[$j]!='$' && $name2[$i]!=' ')
			$c++;
	}
	while($c>6)
		$c-=6;
	if($c==(int)0)
		return "Mismatch";
	else
		{
		$d=$c-1; 
		return "$arr[$d]";
}
}

function connect($config){
	try {
 	$conn = new PDO('mysql:host=mysql3.000webhost.com;dbname=a2508100_entries', $config['DB_USERNAME'], $config['DB_PASSWORD']);
 	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 	return $conn;
 }
 	catch(PDOException $e){
 		return false;
 		}
}

function set_count($file_name = 'counter.txt'){
	if (file_exists($file_name)) {
		$handle = fopen($file_name, 'r');
		$count = (int) fread($handle, 20) + 1;
		$handle = fopen($file_name, 'w');
		fwrite($handle, $count);
		fclose($handle);
	}else{
		$handle = fopen($file_name, 'w+');
		$count = 1;
		fwrite($handle, $count);
		fclose($handle);
	}
	return $count;
}

?>