<?php

	class picture{
		function CreatePicture($name, $tmpName, $page, $type){
				if (filter_var($page, FILTER_VALIDATE_INT) == false){
					return "Variables do not match required type";
				}
				

			include "inc.php";

			if($type == "images/jpeg" OR "images/jpg" OR "images/png" OR "images/gif"){
				$location = "images\\".$name;
				move_uploaded_file($tmpName, $location);

				$conn = new mysqli($IP,$USERNAME,$PASSWORD, $DB);
				$name1 = mysqli_real_escape_string($conn, $name);
				$location1 = mysqli_real_escape_string($conn, "images"); 
				$page1 = mysqli_real_escape_string($conn, $page);
	
				$query = "INSERT INTO cbcpicture(PictureName, PictureLocation, PicturePage)VALUES('$name1','$location1',$page1)";
				$results = $conn->query($query);

				$conn->close();

			}else{
				return "This is not a valid file type";
			}
			
		}
		function DeletePicture($id){
			include "inc.php";
					if (filter_var($id, FILTER_VALIDATE_INT) == false){
			    		return "ID must be a valid integer";
					}
			$conn = new mysqli($IP,$USERNAME,$PASSWORD, $DB);

			$query = "SELECT * FROM cbcpicture WHERE pictureID=$id";
			$results = $conn->query($query);

			$rows = $results->fetch_all(MYSQLI_ASSOC);
			foreach($rows as $row){
				$remove = $row['PictureLocation']."\\".$row['PictureName'];
				unlink($remove);
			}

			$stmt =$conn->prepare("UPDATE cbcpicture SET PictureDeleted = 1 WHERE PictureID=?");
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
		function fetchLocationByPage($page){
			include "inc.php";
			$conn = new mysqli($IP,$USERNAME,$PASSWORD, $DB);
			$num = 0;
			$return = array();

			if (filter_var($page, FILTER_VALIDATE_INT) == false){
			    return "Page must be a valid integer";
			}

					$stmt =$conn->prepare("SELECT * FROM cbcpicture WHERE picturePage=?");
					$stmt->bind_param("i", $newPage);

					$newID =mysqli_real_escape_string($conn, $page);

					$stmt->execute();
					$res = $stmt->get_result();
					$rows = $res->fetch_all(MYSQLI_ASSOC);
					foreach($rows as $row){
						$return[$num] = $row['PictureLocation']."\\".$row['PictureName'];
						$num++;
					}
					return $return;
		}

		function fetchAll(){
			include "inc.php";
			$conn = new mysqli($IP,$USERNAME,$PASSWORD, $DB);
			$stmt =$conn->prepare("SELECT * FROM cbcpicture WHERE pictureDeleted=0");
			$stmt->execute();
			$res = $stmt->get_result();
			$return = $res->fetch_all(MYSQLI_ASSOC);
			return $return;
		}

		function setMinistryPicture($minID, $name, $tmpname, $type){
			include "inc.php";
			$conn = new mysqli($IP,$USERNAME,$PASSWORD, $DB);

			if($type == "images/jpeg" OR "images/jpg" OR "images/png" OR "images/gif"){
				$location = "images\\".$name;
				move_uploaded_file($tmpname, $location);
				
				$name1 = mysqli_real_escape_string($conn, $name);
				$location1 = mysqli_real_escape_string($conn, "images"); 
				$page1 = mysqli_real_escape_string($conn, $minID);
	
				$query = "INSERT INTO cbcpicture(PictureName, PictureLocation, PicturePage)VALUES('$name1','$location1', $page1)";
				$results = $conn->query($query);

			}else{
				return "This is not a valid file type";
			}

			$query = "SELECT * FROM pictureministry WHERE ministryID=$minID";
			$results = $conn->query($query);

			$rows = $results->fetch_all(MYSQLI_ASSOC);
			foreach($rows as $row){
				$pictureID = $row['PictureID'];
				$query = "SELECT * FROM cbcpicture WHERE pictureID = $pictureID";
				$result = $conn->query($query);
				$pictures = $results->fetch_all(MYSQLI_ASSOC);
				foreach ($pictures as $picture) {
					$remove = $picture['pictureLocation']."\\".$picture['pictureName'];
					unlink($remove);
					$id = $picture['pictureID'];
					$query = "DELETE FROM cbcpicture WHERE pictureID='$id'";
					$delete = $conn->query($query);
				}

			}
			$query = "DELETE FROM pictureministry WHERE ministryID='$minID'";
			if($delete = $conn->query($query))




			$query = "SELECT pictureID FROM cbcpicture WHERE picturePage=$minID ANd pictureName='$name'";
			$results = $conn->query($query);
			$rows = $results->fetch_all(MYSQLI_ASSOC);
			foreach($rows as $row){
				$picID = $row['pictureID'];
			}
			$picID1 = mysqli_real_escape_string($conn, $picID);
			$minID1 = mysqli_real_escape_string($conn, $minID); 
			$query = "INSERT INTO pictureministry(PictureID, MinistryID) VALUES ($picID1 ,$minID1)";
			if($results = $conn->query($query)){
				return "TRUE";
			}



		}






	}
	?>