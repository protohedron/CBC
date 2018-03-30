<?php
	include "userObject.php";

	$object = new user();
	echo $return = $object->login('admin', 'password');
	echo $_SESSION['LOGIN'];



?>