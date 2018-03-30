<?php
class missions
{
	function CreateMissions($name, $body, $descrip){
		include "inc.php";
		$conn = new mysqli($IP,$USERNAME,$PASSWORD, $DB);

		$stmt =$conn->prepare("INSERT INTO CBCMissions (MissionsName, MissionsBody, MissionsDescrip) VALUES (?,?,?)");
		$stmt->bind_param("sss", $newName, $newBody, $newDescrip);

			$newName = mysqli_real_escape_string($conn, $name);
			$newBody =mysqli_real_escape_string($conn, $body);
			$newDescrip =mysqli_real_escape_string($conn, $descrip);

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
	function EditMissionsDescrip($descrip, $id){
			if (filter_var($id, FILTER_VALIDATE_INT) == false){
				return "Variables do not match required type";
			}
			
		include "inc.php";
		$conn = new mysqli($IP,$USERNAME,$PASSWORD, $DB);

		$stmt =$conn->prepare("UPDATE CBCMissions SET MissionsDescrip=? WHERE MissionsID=?");
		$stmt->bind_param("si", $newDescrip, $newID);

		$newDescrip =mysqli_real_escape_string($conn, $descrip);
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
	
			$stmt =$conn->prepare("UPDATE CBCMissions SET MissionsDeleted = 1 WHERE MissionsID=?");
			$stmt->bind_param("i", $newID);

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
	function FetchAllMissions(){
			include "inc.php";
			$conn = new mysqli($IP,$USERNAME,$PASSWORD, $DB);
	
			$stmt =$conn->prepare("SELECT * FROM CBCMissions WHERE MissionsDeleted = 0");
			$stmt->execute();
			$res = $stmt->get_result();
			$return = $res->fetch_all(MYSQLI_ASSOC);
			
			$stmt->close();
			$conn->close();
			return $return;
	}
	function FetchSingleMissions($id){
			if (filter_var($id, FILTER_VALIDATE_INT) == false){
				return "Variables do not match required type";
			}
			
			include "inc.php";
			$conn = new mysqli($IP,$USERNAME,$PASSWORD, $DB);
	
			$stmt =$conn->prepare("SELECT * FROM CBCMissions Where MissionsID = ? and MissionsDeleted = 0");
			$stmt->bind_param("i", $newID);

			$newID =mysqli_real_escape_string($conn, $id);

			$stmt->execute();
			$res = $stmt->get_result();
			$return = $res->fetch_all(MYSQLI_ASSOC);
			
			$stmt->close();
			$conn->close();
			return $return;
	}


}
?>