<?php
//delete event from calender
include "objects/inc.php";

//connect to database
$conn = new mysqli($IP,$USERNAME,$PASSWORD, $DB);

//if cannot connect
if ($conn->connect_error) {
    die('Connect Error: ' . $conn->connect_error);
}
//if can connect
else { 
    if(isset($_POST["id"])){
    $query = 'DELETE from CBCCalander WHERE CalanderID="'. $_POST['id'] . '"';
    $result = $conn->query($query);  
    }
}


?>