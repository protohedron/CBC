<?php
//update events
include "../models/inc.php";

//connect to database
$conn = new mysqli($IP,$USERNAME,$PASSWORD, $DB);

//if cannot connect
if ($conn->connect_error) {
    die('Connect Error: ' . $conn->connect_error);
}

//if can connect
else { 
    if(isset($_POST["id"])){
        $query = 'UPDATE CBCCalander SET CalanderName="' . $_POST['title'] . '", CalanderStart="' . $_POST['start'] .'", CalanderEnd="' . $_POST['end'] .'" WHERE CalanderID="' . $_POST['id'] . '"';
        $result = $conn->query($query); 
    }
}
?>