<?php
class article
{
	function createArticle($name, $body, $page){
			if (filter_var($page, FILTER_VALIDATE_INT) == false){
				return "Variables do not match required type";
			}
		
		include "inc.php";
		$conn = new mysqli($IP,$USERNAME,$PASSWORD, $DB);

		$stmt =$conn->prepare("INSERT INTO cbcarticle (ArticleName, ArticleBody, ArticlePage) VALUES (?,?,?)");
		$stmt->bind_param("ssi", $newName, $newBody, $newPage);

			$newName = mysqli_real_escape_string($conn, $name);
			$newBody =mysqli_real_escape_string($conn, $body);
			$newPage =mysqli_real_escape_string($conn, $page);

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
	function EditArticleBody($body, $id){
			if (filter_var($id, FILTER_VALIDATE_INT) == false){
				return "Variables do not match required type";
			}

		include "inc.php";
		$conn = new mysqli($IP,$USERNAME,$PASSWORD, $DB);

		$stmt =$conn->prepare("UPDATE CBCArticle SET ArticleBody=? WHERE ArticleID=?");
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
	function EditArticleName($name, $id){
			if (filter_var($id, FILTER_VALIDATE_INT) == false){
				return "Variables do not match required type";
			}

		include "inc.php";
		$conn = new mysqli($IP,$USERNAME,$PASSWORD, $DB);

		$stmt =$conn->prepare("UPDATE CBCArticle SET ArticleName=? WHERE ArticleID=?");
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
		$conn->close();
	}
	function DeleteArticle($id){
				if (filter_var($id, FILTER_VALIDATE_INT) == false){
					return "Variables do not match required type";
				}
			include "inc.php";

			$conn = new mysqli($IP,$USERNAME,$PASSWORD, $DB);
	
			$stmt =$conn->prepare("DELETE FROM CBCArticle WHERE ArticleID=?");
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
	function FetchArticleByPage($page){
				if (filter_var($page, FILTER_VALIDATE_INT) == false){
					return "Variables do not match required type";
				}

			include "inc.php";
			$conn = new mysqli($IP,$USERNAME,$PASSWORD, $DB);
	
			$query ="SELECT * FROM CBCArticle WHERE ArticlePage = $page";
			$results = $conn->query($query);
			$return = $results->fetch_all(MYSQLI_ASSOC);
			$conn->close();
			return $return;
	}


}
?>