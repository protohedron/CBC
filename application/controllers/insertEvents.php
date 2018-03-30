<?php
//insert events into calender
include "objects/inc.php";

//connect to database
$conn = new mysqli($IP,$USERNAME,$PASSWORD, $DB);

//if cannot connect
if ($conn->connect_error) {
    die('Connect Error: ' . $conn->connect_error);
}
//if can connect
else {  
    if(isset($_POST["title"])){
        $query = 'INSERT INTO CBCCalander (CalanderName, CalanderStart, CalanderEnd) 
        VALUES ("' . $_POST['title'] . '", "' . $_POST['start'] . '", "' . $_POST['end'] .'")';
        $result = $conn->query($query);        
    }
}

?>