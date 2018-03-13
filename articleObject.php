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
	
			$stmt =$conn->prepare("UPDATE CBCArticle SET ArticleDeleted=1 WHERE ArticleID=?");
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
	function FetchArticleByPage($page){
				if (filter_var($page, FILTER_VALIDATE_INT) == false){
					return "Variables do not match required type";
				}

			include "inc.php";
			$conn = new mysqli($IP,$USERNAME,$PASSWORD, $DB);
	
			$stmt=$conn->prepare("SELECT * FROM CBCArticle WHERE ArticlePage = ? and ArticleDeleted = 0");
			$stmt->bind_param("i", $newPage);
			$newPage =mysqli_real_escape_string($conn, $page);


			$stmt->execute();
			$res = $stmt->get_result();
			$return = $res->fetch_all(MYSQLI_ASSOC);
			
			$stmt->close();
			$conn->close();
			return $return;
	}


}
?>