<?php   
$server = 'server';  
$username   = 'username';  
$password   = 'password';  
$database   = 'database';
$conn 		= mysql_connect($server, $username,  $password);
  
// $link = mysqli_connect($server, $username, $password, $database);

// if (!$link) {
//     die('Connect Error (' . mysqli_connect_errno() . ') '
//             . mysqli_connect_error());
// }









// try {
//  	$conn = new PDO('mysql:host=mysql3.000webhost.com;dbname=a2508100_entries', $username, $password);
//  	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//  }
//  	catch(PDOException $e){
//  		}







if(!$conn)  
{  
    exit('Error: could not establish database connection');  
}  
if(!mysql_select_db($database)) 
{
    exit('Error: could not select the database');  
}  
?>