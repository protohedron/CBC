<?php
class json{
	function eventToJSON(){
			include "inc.php";
				$conn = new mysqli($IP,$USERNAME,$PASSWORD, $DB);

				$return_arr = array();

				$query = "SELECT * FROM CBCCalander"; 
				$results = $conn->query($query);

				foreach($results as $result) {
			   		 $row_array['id'] = $result['CalanderID'];
			   		 $string =$result['CalanderStart'];
			   		 $string[strpos($string, " ")] = 'T';
			   		 $row_array['start'] = $string;
			   		 $string =$result['CalanderEnd'];
			   		 $string[strpos($string, " ")] = 'T';
			    	 $row_array['end'] = $string;
			    	 $row_array['title'] = $result['CalanderName'];

			    	 array_push($return_arr,$row_array);
				}

				$jsonFile = json_encode($return_arr);
				$myfile = fopen("calander.json", "w") or die("Unable to open file!");
				fwrite($myfile, $jsonFile);
				fclose($myfile);
		}
}

class calander{
	function createEvent($name, $start, $end, $description){
		include "inc.php";
			$conn = new mysqli($IP,$USERNAME,$PASSWORD, $DB);
	
			$stmt =$conn->prepare("INSERT INTO CBCCalander (CalanderName, CalanderDescription, CalanderStart, CalanderEnd) VALUES (?,?,?,?)");
			$stmt->bind_param("ssss", $newName, $newDescription, $newStart, $newEnd);

			$newName = mysqli_real_escape_string($conn, $name);
			$newDescription =mysqli_real_escape_string($conn, $description);
			$newStart = mysqli_real_escape_string($conn, $start);
			$newEnd = mysqli_real_escape_string($conn, $end);

		if($stmt->execute()){
			$stmt->close();
			$conn->close();
			$json = new json;
			$json->eventToJSON();
			return true;
		}else{
			$stmt->close();
			$conn->close();
			return false;
		}
	}

	function updateEvent($id, $name, $start, $end, $description){
		include "inc.php";
			if (filter_var($id, FILTER_VALIDATE_INT) == false){
	    		return "id must be a valid integer";
			}
		
			$conn = new mysqli($IP,$USERNAME,$PASSWORD, $DB);
	
			$stmt =$conn->prepare("UPDATE CBCCalander SET CalanderName=?, CalanderDescription=?, CalanderStart=?, CalanderEnd=? WHERE CalanderID=?");
			$stmt->bind_param("ssssi", $newName, $newDescription, $newStart, $newEnd, $newID);

			$newName = mysqli_real_escape_string($conn, $name);
			$newDescription =mysqli_real_escape_string($conn, $description);
			$newStart = mysqli_real_escape_string($conn, $start);
			$newEnd = mysqli_real_escape_string($conn, $end);
			$newID = mysqli_real_escape_string($conn, $id);

		if($stmt->execute()){
			$stmt->close();
			$conn->close();
			$json = new json;
			$json->eventToJSON();
			return true;
		}else{
			$stmt->close();
			$conn->close();
			return false;
		}
	}

	function deleteEvent($id){
		include "inc.php";
		if (filter_var($id, FILTER_VALIDATE_INT) == false){
	    	return "id must be a valid integer";
		}

			$conn = new mysqli($IP,$USERNAME,$PASSWORD, $DB);
	
			$stmt =$conn->prepare("DELETE FROM CBCCalander WHERE CalanderID=?");
			$stmt->bind_param("i", $newID);
			$newID = mysqli_real_escape_string($conn, $id);

		if($stmt->execute()){
			$stmt->close();
			$conn->close();
			$json = new json;
			$json->eventToJSON();
			return true;
		}else{
			$stmt->close();
			$conn->close();
			return false;
		}
	}

	function fetchAllEvents(){
		include "inc.php";
		
		$conn = new mysqli($IP,$USERNAME,$PASSWORD, $DB);
	
		$query ="SELECT * FROM CBCCalander";

		if($results = $conn->query($query)){
			$return = $results->fetch_all(MYSQLI_ASSOC);
			$conn->close();
			return $return;
		}else{
			$conn->close();
			return false;
		}
	}

	function fetchSingleEvent($id){
		include "inc.php";
		if (filter_var($id, FILTER_VALIDATE_INT) == false){
	    	return "id must be a valid integer";
		}
		$conn = new mysqli($IP,$USERNAME,$PASSWORD, $DB);
	
		$stmt =$conn->prepare("SELECT * FROM CBCCalander WHERE CalanderID = ?");
		$stmt->bind_param("i", $newID);
		$newID = mysqli_real_escape_string($conn, $id);

		$stmt->execute();
		$res = $stmt->get_result();
		$return = $res->fetch_all(MYSQLI_ASSOC);
			
		$stmt->close();
		$conn->close();
		return $return;
	}


}




?>