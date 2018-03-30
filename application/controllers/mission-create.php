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
//Create mission to appear in list
if ($secure) {
    $missions->CreateMissions("New Mission","","");
    }
    header("Location: ../views/missions.php");
     ?>   

</body>
</html>