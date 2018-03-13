<?php
//This Class is designed to handle all interactions with the Audio table of the database this is where we will be storing the locations of any audio files hosted on the website
	class audio{
		
		function CreateAudio($name, $file, $tmpName, $date){
				
			include "inc.php";

				$location = "audio\\".$file;
				move_uploaded_file($tmpName, $location);

				$conn = new mysqli($IP,$USERNAME,$PASSWORD, $DB);
				$name1 = mysqli_real_escape_string($conn, $name);
				$file1 = mysqli_real_escape_string($conn, $file);
				$location1 = mysqli_real_escape_string($conn, "audio"); 
				$date1 = mysqli_real_escape_string($conn, $date);
	
				$query = "INSERT INTO cbcaudio(AudioName, AudioLocation, AudioFile, AudioDate)VALUES('$name1','$location1', '$file1', '$date1')";
				$results = $conn->query($query);

				$conn->close();

		}
		function DeleteAudio($id){
			include "inc.php";
					if (filter_var($id, FILTER_VALIDATE_INT) == false){
			    		return "ID must be a valid integer";
					}
			$conn = new mysqli($IP,$USERNAME,$PASSWORD, $DB);

			$query = "SELECT * FROM cbcaudio WHERE audioID=$id";
			$results = $conn->query($query);

			$rows = $results->fetch_all(MYSQLI_ASSOC);
			foreach($rows as $row){
				$remove = $row['AudioLocation']."\\".$row['AudioFile'];
				unlink($remove);
			}

			$query = "DELETE FROM cbcaudio WHERE audioID='$id'";
			$results = $conn->query($query);
			$conn->close();
		}
		function editAudioName($id, $name){
			if (filter_var($id, FILTER_VALIDATE_INT) == false){
				return "Variables do not match required type";
			}
			include "inc.php";
			$conn = new mysqli($IP,$USERNAME,$PASSWORD, $DB);

			$stmt =$conn->prepare("UPDATE CBCAudio SET AudioName=? WHERE AudioID=?");
			$stmt->bind_param("si", $newName, $newID);

			$newName =mysqli_real_escape_string($conn, $name);
			$newID =mysqli_real_escape_string($conn, $id);

			$stmt->execute();
			$stmt->close();
			$conn->close();
		}
		function fetchAudioAll(){
			include "inc.php";
			$conn = new mysqli($IP,$USERNAME,$PASSWORD, $DB);
	
			$query ="SELECT * FROM CBCAudio ORDER BY audioDate";
			$results = $conn->query($query);
			$return = $results->fetch_all(MYSQLI_ASSOC);
			$conn->close();
			return $return;
		}
		function fetchAudioSingle($id){
			if (filter_var($id, FILTER_VALIDATE_INT) == false){
				return "Variables do not match required type";
			}

			include "inc.php";
			$conn = new mysqli($IP,$USERNAME,$PASSWORD, $DB);
	
			$query ="SELECT * FROM CBCAudio WHERE audioID = $id";
			$results = $conn->query($query);
			$return = $results->fetch_all(MYSQLI_ASSOC);
			$conn->close();
			return $return;

		}

	}

	?>