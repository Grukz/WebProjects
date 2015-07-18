<?php   
$server = 'server';  
$username   = 'username';  
$password   = 'passwird';  
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