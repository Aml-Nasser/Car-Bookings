<?php

if( empty(session_id()) && !headers_sent()){
	session_start();
}

require_once 'connect.php';
$db = new connect();
$conn = $db->connection();


$sql  = "INSERT INTO reserved (car_id)
SELECT (id)
FROM car WHERE id='" . $_GET["id"] . "'"; 

if (mysqli_query($conn, $sql))
{ 
    echo "Car is reserved Successfully."; 
} 
else
{ 
    echo "ERROR: Could not able to proceed";
} 



$sql = "DELETE FROM car WHERE id='" . $_GET["id"] . "'";
if (mysqli_query($conn, $sql)) {
    
} else {
   
}

mysqli_close($conn);

?>