<?php
class missions
{
	function CreateMissions($name, $body){
		include "inc.php";
		$conn = new mysqli($IP,$USERNAME,$PASSWORD, $DB);

		$stmt =$conn->prepare("INSERT INTO CBCMissions (MissionsName, MissionsBody) VALUES (?,?)");
		$stmt->bind_param("ss", $newName, $newBody);

			$newName = mysqli_real_escape_string($conn, $name);
			$newBody =mysqli_real_escape_string($conn, $body);

			if($stmt->execute()){
				return "the process is complete";
				$stmt->close();
				$conn->close();
			}else{
				return "this process has failed";
				$stmt->close();
				$conn->close();
			}
	}
	function EditMissionsBody($body, $id){
			if (filter_var($id, FILTER_VALIDATE_INT) == false){
				return "Variables do not match required type";
			}

		include "inc.php";
		$conn = new mysqli($IP,$USERNAME,$PASSWORD, $DB);

		$stmt =$conn->prepare("UPDATE CBCMissions SET MissionsBody=? WHERE MissionsID=?");
		$stmt->bind_param("si", $newBody, $newID);

		$newBody =mysqli_real_escape_string($conn, $body);
		$newID =mysqli_real_escape_string($conn, $id);

		if($stmt->execute()){
				return "the process is complete";
				$stmt->close();
				$conn->close();
			}else{
				return "this process has failed";
				$stmt->close();
				$conn->close();
			}
	}
	function EditMissionsName($name, $id){
			if (filter_var($id, FILTER_VALIDATE_INT) == false){
				return "Variables do not match required type";
			}
			
		include "inc.php";
		$conn = new mysqli($IP,$USERNAME,$PASSWORD, $DB);

		$stmt =$conn->prepare("UPDATE CBCMissions SET MissionsName=? WHERE MissionsID=?");
		$stmt->bind_param("si", $newName, $newID);

		$newName =mysqli_real_escape_string($conn, $name);
		$newID =mysqli_real_escape_string($conn, $id);

		if($stmt->execute()){
				return "the process is complete";
				$stmt->close();
				$conn->close();
			}else{
				return "this process has failed";
				$stmt->close();
				$conn->close();
			}
	}
	function DeleteMissions($id){
			if (filter_var($id, FILTER_VALIDATE_INT) == false){
				return "Variables do not match required type";
			}
			
			include "inc.php";

			$conn = new mysqli($IP,$USERNAME,$PASSWORD, $DB);
	
			$stmt =$conn->prepare("DELETE FROM CBCMissions WHERE MissionsID=?");
			$stmt->bind_param("i", $id);

			if($stmt->execute()){
				return "the process is complete";
				$stmt->close();
				$conn->close();
			}else{
				return "this process has failed";
				$stmt->close();
				$conn->close();
			}
	}
	function FetchAllMissions(){
			include "inc.php";
			$conn = new mysqli($IP,$USERNAME,$PASSWORD, $DB);
	
			$query ="SELECT * FROM CBCMissions";
			$results = $conn->query($query);
			$return = $results->fetch_all(MYSQLI_ASSOC);
			$conn->close();
			return $return;
	}
	function FetchSingleMissions($id){
			if (filter_var($id, FILTER_VALIDATE_INT) == false){
				return "Variables do not match required type";
			}
			
			include "inc.php";
			$conn = new mysqli($IP,$USERNAME,$PASSWORD, $DB);
	
			$query ="SELECT * FROM CBCMissions Where MissionsID = $id";
			$results = $conn->query($query);
			$return = $results->fetch_all(MYSQLI_ASSOC);
			$conn->close();
			return $return;
	}


}
?>