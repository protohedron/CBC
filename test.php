<?php
	include "ministryObject.php";

	$object = new ministry;

	$return = $object->FetchAllMinistry();
	print_r($return);




?>