<?php   
// $server = 'localhost';  
$username   = 'root';  
$password   = '';  
// $database   = 'winedb';

$id = 1;
try {
    $conn = new PDO('mysql:host=localhost;dbname=winedb', $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare('SELECT DISTINCT(ALCOHOL_BRAND) as ALCOHOL_BRAND FROM table2');
    $stmt->execute();
    
    $result = $stmt->fetchAll();
    echo json_encode($result);

    // while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    //     // print_r($row[ALCOHOL_BRAND]);
    //     echo json_encode($row);
    //  }
} catch(PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
}



?>