<?php
$post = $_POST['name'];
$fp = fopen('name.txt', 'w');
fwrite($fp, $post);
fclose($fp);
?>