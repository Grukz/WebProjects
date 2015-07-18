<?php   
$server = 'server';  
$username   = 'username';  
$password   = 'password';  
$database   = 'database';
$conn 		= 'mysql_connect($server, $username,  $password)';
  
if(!$conn)  
{  
    exit('Error: could not establish database connection');  
}  
if(!mysql_select_db($database)) 
{
    exit('Error: could not select the database');  
}  
?>