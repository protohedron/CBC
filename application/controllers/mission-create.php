<?php
include_once("objects/missionsObject.php");
$missions = new missions(); 
//Placeholder for security
$secure = true;
?>

<!DOCTYPE HTML>
<html lang = "en">

<head>
	<meta charset = "UTF-8">	
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/cbc.css">
	<?php include_once("php_partial/css_includes.php"); ?>
    <link rel="icon" type="image/png" href="img/favicon.png">
   
	
</head>	
	

<body>

<?php
//Create mission to appear in list
if ($secure) {
    $missions->CreateMissions("New Mission","","");
    }
    header("Location: missions.php");
     ?>   

</body>
</html>