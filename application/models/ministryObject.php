<?php
class ministry
{
	function CreateMinistry($name, $body){
		include "inc.php";
		$conn = new mysqli($IP,$USERNAME,$PASSWORD, $DB);

		$stmt =$conn->prepare("INSERT INTO CBCMinistry (MinistryName, MinistryBody) VALUES (?,?)");
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
	function EditMinistryBody($body, $id){
			if (filter_var($id, FILTER_VALIDATE_INT) == false){
				return "Variables do not match required type";
			}
			
		include "inc.php";
		$conn = new mysqli($IP,$USERNAME,$PASSWORD, $DB);

		$stmt =$conn->prepare("UPDATE CBCMinistry SET MinistryBody=? WHERE MinistryID=?");
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
	function EditMinistryName($name, $id){
			if (filter_var($id, FILTER_VALIDATE_INT) == false){
				return "Variables do not match required type";
			}

		include "inc.php";
		$conn = new mysqli($IP,$USERNAME,$PASSWORD, $DB);

		$stmt =$conn->prepare("UPDATE CBCMinistry SET MinistryName=? WHERE MinistryID=?");
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
	function DeleteMinistry($id){
			if (filter_var($id, FILTER_VALIDATE_INT) == false){
				return "Variables do not match required type";
			}

			include "inc.php";

			$conn = new mysqli($IP,$USERNAME,$PASSWORD, $DB);
	
			$stmt =$conn->prepare("UPDATE CBCMinistry SET MinistryDeleted=1 WHERE MinistryID=?");
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
	function FetchAllMinistry(){
			include "inc.php";
			$conn = new mysqli($IP,$USERNAME,$PASSWORD, $DB);
	
			$stmt =$conn->prepare("SELECT * FROM CBCMinistry WHERE MinistryDeleted = 0");
			$stmt->execute();
			$res = $stmt->get_result();
			$return = $res->fetch_all(MYSQLI_ASSOC);
			
			$stmt->close();
			$conn->close();
			return $return;
	}
	function FetchSingleMinistry($id){
			if (filter_var($id, FILTER_VALIDATE_INT) == false){
				return "Variables do not match required type";
			}
			
			include "inc.php";
			$conn = new mysqli($IP,$USERNAME,$PASSWORD, $DB);
	
			$stmt =$conn->prepare("SELECT * FROM CBCMinistry Where MinistryID = ? WHERE MinsityDeleted = 0");
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