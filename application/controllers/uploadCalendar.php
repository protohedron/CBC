<?php
//load events into the calender
include "objects/inc.php";

//connect to database
$conn = new mysqli($IP,$USERNAME,$PASSWORD, $DB);

//if cannot connect
if ($conn->connect_error) {
	die('Connect Error: ' . $conn->connect_error);
}

//if can connect
else{
    $return_arr = array();
    $query = "SELECT * FROM CBCCalander"; 
    $result = $conn->query($query);
    foreach($result as $row){
        $return_arr[] = array(
            'id'   => $row["CalanderID"],
            'title'   => $row["CalanderName"],
            'start'   => $row["CalanderStart"],
            'end'   => $row["CalanderEnd"]
        );
    }
}
echo json_encode($return_arr);

?>