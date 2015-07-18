<?php
// $method = $_SERVER['REQUEST_METHOD'];
// $text = $_POST['reply-content'];
session_start();
include 'connect.php';
 $sql = "INSERT INTO posts(post_content, post_date, post_topic, post_by) VALUES ('" . $_POST['reply-content'] . "', NOW(), " . mysql_real_escape_string($_POST['get']) . "," . $_SESSION['user_id'] . ")"; 
                         
        $result = mysql_query($sql);

// $result  = array('1' => , $_POST['reply-content'],
				 // '2' => , $_POST['get']	);

$fp = fopen('a.txt', 'w');
fwrite($fp, $result);
fclose($fp);
?>