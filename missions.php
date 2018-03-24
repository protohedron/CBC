<?php
include_once("objects/missionsObject.php");
$missions = new missions(); 
//Placeholder for showing edit version or not
$secure = false;
?>

<!DOCTYPE HTML>
<html lang = "en">

<head>
	<title>CBC - Missions</title>
	<meta charset = "UTF-8">	
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/cbc.css">
	<?php include_once("php_partial/css_includes.php"); ?>
    <link rel="icon" type="image/png" href="img/favicon.png">
    <!-- Summernote-->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.js"></script>
	
</head>	
	

<body>

<!--Logo and nav holder-->
<div class="top_bar_temp">
	<!--Logo holder-->
	<div class="logo_holder">
		<img class="logo" src="img/logo.png"></img>
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

<div class="header_bar teal">
	<h1 class="header_title">Missions</h1>
    
</div>
<br>

<div class="mx-auto" style="width: 70%">
<img src="img/cbcComission.jpg" alt="Comission, fulfilling the goal together.">
<h4 style="text-align: center" class="filler-text">Community Bible Church helps to support over a dozen
 missionaries across the world and has been a part of several church plants. 
 </h4>
 </div>
<hr>

<?php 

$missionsArray = $missions->FetchAllMissions();

foreach($missionsArray as $missionCards) :

	if ($secure) :
	$name = $missionCards["MissionsName"];
	$descrip = $missionCards["MissionsDescrip"];
	$id = $missionCards["MissionsID"]
    ?>
<!--Missions Card Edit-->
<div class="card">
  <div class="card-body">
	<form method="post" action="missions-edit.php">
	<input type="hidden" name="id" value="<?php echo $id;?>">
		<h3 style="text-align: center">Title</h3>
		<br>
    	<textarea id="summernote_<?php echo $id; ?>" name="title<?php echo $id?>"><?php echo str_replace("\\", "", $name);?></textarea>
		<br>
		<h3 style="text-align: center">Description</h3>
    	<textarea id="summernote_<?php echo $id."_2"; ?>" name="descrip<?php echo $id?>"><?php echo str_replace("\\", "", $descrip);?></textarea>
		<script>
		//Summernote init
		$(document).ready(function () {
		
      $('#summernote_<?php echo $id ?>').summernote({
        tabsize: 2,
        height: 70
      });
      $('#summernote_<?php echo $id. "_2" ?>').summernote({
        tabsize: 2,
        height: 70
      });
	  $('textarea').html($('#summernote_<?php echo $id?>').code());
		});
	
	
    </script>
    	<div style="text-align: center">
		<br>
    	<input type="submit" class="btn btn-outline-secondary btn-lg"></input>
		<a href="mission.php?id=<?php echo $id;?>"><button type="button" class="btn btn-outline-secondary btn-lg">Edit</button></a>
		<a href="mission-delete.php?id=<?php echo $id;?>"><button type="button" class="btn btn-outline-secondary btn-lg">Delete</button></a>
	  </div>
	</form>
  </div>
</div>


<!--/Missions Cards-->
<?php 
	else : ?>
		<!--Missions Cards-->
		<div class="card">
		  <div class="card-body">
			<h5 class="card-title"><?php echo $missionCards["MissionsName"];?></h5>
			<p class="card-text"><?php echo $missionCards["MissionsDescrip"]?></p>
			<div style="text-align: center"><a href="mission.php?id=<?php echo $missionCards["MissionsID"]?>">
			<button type="button" class="btn btn-outline-secondary btn-lg">Read More</button></div> </a>
		  </div>
		</div>
	<?php endif;
		endforeach;?>
		<div style="text-align: center">
		<br>
	<a href="mission-create.php"><button type="button" class="btn btn-outline-secondary btn-lg">Create</button></a>
</div>
<!--/Missions Card Edit-->

</body>
</html>