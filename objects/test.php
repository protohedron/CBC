<?php
	include "CalanderObject.php";

	$object = new calander();
	$return = $object->fetchSingleEvent(3);
	print_r($return);




?>