<?php
	class staff
	{
		function CreateStaff($name, $info, $postition){
			include "inc.php";
			$conn = new mysqli($IP,$USERNAME,$PASSWORD, $DB);

			$stmt =$conn->prepare("INSERT INTO cbcStaff (StaffName, StaffInfo, StaffPosition) VALUES (?,?,?)");
			$stmt->bind_param("sss", $newName, $newInfo, $newPostition);

			$newName = mysqli_real_escape_string($conn, $name);
			$newInfo =mysqli_real_escape_string($conn, $info);
			$newPostition =mysqli_real_escape_string($conn, $postition);

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

		function EditStaff($name, $info, $postition, $id){
			if (filter_var($id, FILTER_VALIDATE_INT) == false){
				return "Variables do not match required type";
			}

			include "inc.php";
			$conn = new mysqli($IP,$USERNAME,$PASSWORD, $DB);

			$stmt =$conn->prepare("UPDATE cbcStaff SET StaffName=?, StaffInfo=?, StaffPosition=? WHERE StaffID=?");
			$stmt->bind_param("sssi", $newName, $newInfo, $newPostition, $newID);

			$newName =mysqli_real_escape_string($conn, $name);
			$newInfo =mysqli_real_escape_string($conn, $info);
			$newPostition =mysqli_real_escape_string($conn, $postition);
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

		function EditStaffName($name, $id){
			if (filter_var($id, FILTER_VALIDATE_INT) == false){
				return "Variables do not match required type";
			}

			include "inc.php";
			$conn = new mysqli($IP,$USERNAME,$PASSWORD, $DB);

			$stmt =$conn->prepare("UPDATE cbcStaff SET StaffName=? WHERE StaffID=?");
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

		function EditStaffInfo($info, $id){
			if (filter_var($id, FILTER_VALIDATE_INT) == false){
				return "Variables do not match required type";
			}

			include "inc.php";
			$conn = new mysqli($IP,$USERNAME,$PASSWORD, $DB);

			$stmt =$conn->prepare("UPDATE cbcStaff SET StaffInfo=? WHERE StaffID=?");
			$stmt->bind_param("si", $newInfo, $newID);

			$newInfo =mysqli_real_escape_string($conn, $info);
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

		function EditStaffPosition($postition, $id){
			if (filter_var($id, FILTER_VALIDATE_INT) == false){
				return "Variables do not match required type";
			}

			include "inc.php";
			$conn = new mysqli($IP,$USERNAME,$PASSWORD, $DB);

			$stmt =$conn->prepare("UPDATE cbcStaff SET StaffPosition=? WHERE StaffID=?");
			$stmt->bind_param("si", $newPostition, $newID);

			$newPostition =mysqli_real_escape_string($conn, $postition);
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

		function deleteStaff($id)
		{
			if (filter_var($id, FILTER_VALIDATE_INT) == false){
					return "Variables do not match required type";
			}
			include "inc.php";

			$conn = new mysqli($IP,$USERNAME,$PASSWORD, $DB);
	
			$stmt =$conn->prepare("UPDATE cbcStaff SET staffDelete = 1 WHERE staffID=?");
			$stmt->bind_param("i", $id);
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

		function FetchAllStaff(){
			include "inc.php";
			$conn = new mysqli($IP,$USERNAME,$PASSWORD, $DB);
	
			$stmt =$conn->prepare("SELECT * FROM CBCstaff");
			$stmt->execute();
			$res = $stmt->get_result();
			$return = $res->fetch_all(MYSQLI_ASSOC);
			
			$stmt->close();
			$conn->close();
			return $return;
		}

		function FetchSingleStaff($id){
			if (filter_var($id, FILTER_VALIDATE_INT) == false){
					return "Variables do not match required type";
			}

			include "inc.php";
			$conn = new mysqli($IP,$USERNAME,$PASSWORD, $DB);
	
			$stmt =$conn->prepare("SELECT * FROM cbcStaff WHERE staffId = ?");
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