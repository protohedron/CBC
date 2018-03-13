<?php
	include "userObject.php";

	$object = new user;

	$return = $object->checkAnswerByID('Jon' ,2);
	print_r($return);




?>