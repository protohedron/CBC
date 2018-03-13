<?php
	class user{
		function signup($username, $first, $last, $password, $passwordconfirm, $question, $answer, $email, $premission){
			include 'inc.php';
			$conn = new mysqli($IP,$USERNAME,$PASSWORD, $DB);

			$query ="SELECT userName FROM cbcuser";
			$results = $conn->query($query);
			$rows = $results->fetch_all(MYSQLI_ASSOC);
			foreach($rows as $row){
				if($username == $row["userName"]){
					return "Username already taken";
				}
			}
			if($password == $passwordconfirm){

				$stmt = $conn->prepare("INSERT INTO cbcUser (userName, userPassword, userFirst, userLast, userEmail, userQuestion, userAnswer, userPremission) VALUES (?,?,?,?,?,?,?,?)");
				$stmt->bind_param("sssssssi", $newUsername, $newPassword, $newFirst, $newLast, $newEmail, $newQuestion, $newAnswer, $newPremission);

				$newUsername = mysqli_real_escape_string($conn, $username);
				$newPassword =password_hash($password, PASSWORD_DEFAULT);
				$newEmail =mysqli_real_escape_string($conn, $email);
				$newFirst =mysqli_real_escape_string($conn, $first);
				$newLast =mysqli_real_escape_string($conn, $last);
				$newQuestion =mysqli_real_escape_string($conn, $question);
				$newAnswer =password_hash($answer, PASSWORD_DEFAULT);
				$newPremission =mysqli_real_escape_string($conn, $premission);

			if($stmt->execute()){
				return "the process is complete";
				$stmt->close();
				$conn->close();
			}else{
				return "this process has failed";
				$stmt->close();
				$conn->close();
			}
			}else{
				return "Passwords do not match";
			}

		}

		function updatePassword($password, $passwordConfirm, $id){
			include "inc.php";
				if (filter_var($id, FILTER_VALIDATE_INT) == false){
		    		return "ID must be a valid integer";
				}
				$conn = new mysqli($IP,$USERNAME,$PASSWORD, $DB);

				if($password == $passwordConfirm){
					$stmt =$conn->prepare("UPDATE cbcuser SET userPassword=? WHERE userID=$id");
					$stmt->bind_param("s", $newPassword);

					$newPassword =password_hash($password, PASSWORD_DEFAULT);
					if($stmt->execute()){
						return "the process is complete";
						$stmt->close();
						$conn->close();
					}else{
						return "this process has failed";
						$stmt->close();
						$conn->close();
					}
				}else{
					return "Passwords do not match";
				}
		}

		function updateFirst($first, $id){
			include "inc.php";
				if (filter_var($id, FILTER_VALIDATE_INT) == false){
		    		return "ID must be a valid integer";
				}
				$conn = new mysqli($IP,$USERNAME,$PASSWORD, $DB);
		
				$stmt =$conn->prepare("UPDATE cbcuser SET userFirst=? WHERE userID=$id");
				$stmt->bind_param("s", $newFirst);

				$newFirst =mysqli_real_escape_string($conn, $first);
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
		function updateLast($last, $id){
			include "inc.php";
				if (filter_var($id, FILTER_VALIDATE_INT) == false){
		    		return "ID must be a valid integer";
				}
				$conn = new mysqli($IP,$USERNAME,$PASSWORD, $DB);
		
				$stmt =$conn->prepare("UPDATE cbcuser SET userLast=? WHERE userID=$id");
				$stmt->bind_param("s", $newLast);

				$newLast =mysqli_real_escape_string($conn, $last);
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
		function updateEmail($email, $id){
			include "inc.php";
				if (filter_var($id, FILTER_VALIDATE_INT) == false){
		    		return "ID must be a valid integer";
				}
				$conn = new mysqli($IP,$USERNAME,$PASSWORD, $DB);
		
				$stmt =$conn->prepare("UPDATE cbcuser SET userEmail=? WHERE userID=$id");
				$stmt->bind_param("s", $newEmail);

				$newEmail =mysqli_real_escape_string($conn, $email);
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
		function upadetQuestionAnswer($question, $answer, $id){
			include "inc.php";
			if(filter_var($id, FILTER_VALIDATE_INT) == false){
				return "ID must be an integer";
			}
			$conn = new mysqli($IP, $USERNAME, $PASSWORD, $DB);

			$stmt=$conn->prepare("UPDATE cbcuser set userQuestion=?, userAnswer=? WHERE userID=$id");
			$stmt->bind_param("ss", $newQuestion, $newAnswer);

			$newQuestion  = mysqli_real_escape_string($conn, $question);
			$newAnswer = password_hash($answer, PASSWORD_DEFAULT);

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
		function updatePermission($permission, $id){
			include "inc.php";
			if(filter_var($id, FILTER_VALIDATE_INT) == false){
				return "ID must be an integer";
			}
			$conn = new mysqli($IP, $USERNAME, $PASSWORD, $DB);

			$stmt=$conn->prepare("UPDATE cbcuser set userPremission=? WHERE userID=$id");
			$stmt->bind_param("i", $newPermission);

			$newPermission  = mysqli_real_escape_string($conn, $permission);

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
		function deleteUser($id){
		include "inc.php";
			if (filter_var($id, FILTER_VALIDATE_INT) == false){
	    		return "ID must be a valid integer";
			}
			$conn = new mysqli($IP,$USERNAME,$PASSWORD, $DB);
	
			$stmt=$conn->prepare("UPDATE cbcuser SET userDeleted = 1 WHERE userID=?");
			$stmt->bind_param("i", $newID);
			$newID = mysqli_real_escape_string($conn, $id);
			$stmt->execute(); 
			$stmt->close();

			$conn->close();
		}
		function fetchUser($id){
			include "inc.php";
			if (filter_var($id, FILTER_VALIDATE_INT) == false){
	    		return "ID must be a valid integer";
			}
			$conn = new mysqli($IP,$USERNAME,$PASSWORD, $DB);
			$stmt=$conn->prepare("SELECT UserName, UserFirst, UserLast, userEmail, userQuestion FROM cbcuser WHERE UserID = ?");
			$stmt->bind_param("i", $newID);
			$newID = mysqli_real_escape_string($conn, $id);

			$stmt->execute();
			$res = $stmt->get_result();
			$return = $res->fetch_all(MYSQLI_ASSOC);
			
			$stmt->close();
			$conn->close();
			return $return;
		}
		function fetchAllUsers(){
			include "inc.php";
			
			$conn = new mysqli($IP,$USERNAME,$PASSWORD, $DB);
			$stmt=$conn->prepare("SELECT UserName, UserFirst, UserLast, userEmail, userQuestion FROM cbcuser");
			$stmt->execute();
			$res = $stmt->get_result();
			$return = $res->fetch_all(MYSQLI_ASSOC);
			
			$stmt->close();
			$conn->close();
			return $return;
		}
		function fetchUserByName($username){
			include "inc.php";
			
			$conn = new mysqli($IP,$USERNAME,$PASSWORD, $DB);
			$stmt=$conn->prepare("SELECT UserName, UserFirst, UserLast, userEmail, userQuestion FROM cbcuser WHERE UserName = '?'");
			$stmt->bind_param("s", $newUsername);
			$newUsername = mysqli_real_escape_string($conn, $username);

			$stmt->execute();
			$res = $stmt->get_result();
			$return = $res->fetch_all(MYSQLI_ASSOC);
			
			$stmt->close();
			$conn->close();
			return $return;
		}
		function checkAnswer($answer, $username){
		include "inc.php";
			$conn = new mysqli($IP,$USERNAME,$PASSWORD, $DB);
	
			$query ="SELECT userAnswer FROM cbcuser WHERE userName = '$username'";
			$results = $conn->query($query);
			$return = $results->fetch_all(MYSQLI_ASSOC);

			if(password_verify($answer,$return[0]['userAnswer'])){
				return 1;
			}
			else {
				return 0;
			}
		}
		
		function checkAnswerByID($answer, $id){
		include "inc.php";
			$conn = new mysqli($IP,$USERNAME,$PASSWORD, $DB);
	
			$query ="SELECT userAnswer FROM cbcuser WHERE userID = $id";
			$results = $conn->query($query);
			$return = $results->fetch_all(MYSQLI_ASSOC);

			if(password_verify($answer,$return[0]['userAnswer'])){
				return 1;
			}
			else {
				return 0;
			}
		}
	}