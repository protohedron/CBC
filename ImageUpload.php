<?php
	include 'pictureObject.php';
	$name = $_FILES['image']['name'];
	$type = $_FILES['image']['type'];
	$tmpname = $_FILES['image']['tmp_name'];

	$picture = new picture();

	echo $picture->setMinistryPicture(2, $name, $tmpname, $type);



?>
<form action="ImageUpload.php" Method="POST" enctype="multipart/form-data">
	<input type="file" name="image"><br><br>
	<input type="submit" value="Submit">
</form>