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
    <link rel="icon" type="image/png" href="../../images/favicon.png">
    <!-- Summernote-->

	
</head>	
	

<body>

<?php
//Delete selected mission
if ($secure) {
    $id = $_GET["id"];
    $missions->DeleteMissions($id);
    }
    header("Location: ../views/missions.php");
     ?>   

</body>
</html>