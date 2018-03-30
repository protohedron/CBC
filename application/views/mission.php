<?php
include_once("../models/missionsObject.php");
$missions = new missions(); 

$id = $_GET["id"];
$missionsArray = $missions->FetchSingleMissions($id);

foreach($missionsArray as $missionCards) {
 $name = $missionCards["MissionsName"];
 $pTitle = $name;
 $descrip = $missionCards["MissionsDescrip"];
 $body = $missionCards["MissionsBody"];
 //Temporary stand in for permissions.  true shows editing layout, false shows  
 $secure = false;
//Strip name for title
 $pTitle = strip_tags($pTitle);
}
    
?>

<!DOCTYPE HTML>
<html lang = "en">

<head>
	<title>CBC - <?php echo $pTitle; ?></title>
	<meta charset = "UTF-8">	
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php include_once("../views/partials/css_includes.php"); ?>
    <link rel="stylesheet" href="../../public/css/cbc.css">
    <link rel="icon" type="image/png" href="../../public/images/favicon.png">
    <!-- include summernote css/js -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="../../public/js/bootstrap.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.js"></script>

	
</head>
<body>
<!--Logo and nav holder-->
<div class="top_bar_temp">
	<!--Logo holder-->
	<div class="logo_holder">
		<img class="logo" src="../../public/images/logo.png"></img>
	</div>
	
	<!--Nav bar-->  
	<nav>
		<a href="" class="black">Ministries</a>
		<a href="" class="black">Calendar</a>
		<a href="missions.php" class="black">Missions</a>
		<a href="" class="black">Online Giving</a>
		<a href="" class="black">Sermons</a>
		<a href="" class="black">About</a>
	</nav>
</div>

 <?php 
    if ($secure):
 ?>
<form id="edit" action="missions-edit.php" method="post">
    <div class="header_bar teal">
    <h4 class="header_title">Name</h4>
    <input type="hidden" name="id" value="<?php echo $id;?>">
    <textarea id="summernote_2"  name="title" form="edit"><?php echo str_replace("\\", "", $name);?></textarea>
	    <h1 class="header_title"></h1> 
    </div>
    <br> 
    <h1 style="text-align: center">Body</h1>
    <textarea id="summernote" name="body" form="edit"><?php echo str_replace("\\", "", $body);?></textarea>
    <div style="text-align: center">
        <br>
        <br>
        <input type="submit" class="btn btn-outline-secondary btn-lg"></input>
    </div>
    <script>
    //Summernote init
      $('#summernote').summernote({
        tabsize: 2,
        height: 300
      });
      $('#summernote_2').summernote({
        tabsize: 2,
        height: 50
      });
    </script>
</form> 
    <?php else :?>
<div class="header_bar teal">
	<h1 class="header_title"><?php echo str_replace("\\", "", $name);?></h1>
</div>
<div style="text-align: center">
<br>
</div>
</form>   
<!--Mission Page-->
<div class="card">
  <div class="card-body">
    <p class="card-text"><?php echo str_replace("\\", "", $body);?></p>
    <div style="text-align: center"><a href="mission.php?id=<?php echo $missionCards["MissionsID"]?>">
  </div>
</div>
<!--/Mission Page-->
    <?php 
endif; ?>
</body>
</html>