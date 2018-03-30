<?php
include_once("../models/missionsObject.php");
$missions = new missions(); 
//Placeholder for security
$secure = true;
?>

<!DOCTYPE HTML>
<html lang = "en">

<head>
	<meta charset = "UTF-8">	
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../../public/css/cbc.css">
	<?php include_once("../views/partials/css_includes.php"); ?>
    <link rel="icon" type="image/png" href="../../public/images/favicon.png">
</head>	
	

<body>

<?php
//Update database
if ($secure) {
    if(isset($_POST["body"])) {
        $id = $_POST["id"];
        $body = $_POST["body"];
        $name = $_POST["title"];
        $missions->EditMissionsBody($body, $id);
        $missions->EditMissionsName($name, $id);
        header("Location: ../views/mission.php?id=".$id); 
    }
    else {
    $id = $_POST["id"];
	if(isset($_POST["title".$id])) {
	$name = $_POST["title".$id];
    $descrip = $_POST["descrip".$id];
	$missions->EditMissionsName($name, $id);
    $missions->EditMissionsDescrip($descrip, $id); }
    header("Location: ../views/missions.php"); 
        }
    }
     ?>   

</body>
</html>