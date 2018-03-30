<?php
	include_once("../models/missionsObject.php");
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
		<link rel="stylesheet" href="../../public/css/cbc.css">
		<?php include_once("../views/partials/css_includes.php"); ?>
		<?php include_once("../views/partials/js_includes.php"); ?>
		<link rel="icon" type="image/png" href="../../public/images/favicon.png">
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
		<div class="container-fluid">
			<div class="row teal">
				<div class="col">
					<h1 class="header_title">Missions</h1>
				</div>
			</div>

			<div class="row rowPadVert rowPadHorz">
				<div class="col text-center">
					<img class="img-fluid" src="../../public/images/cbcComission.jpg" alt="Comission, fulfilling the goal together.">
					<h4 class="filler-text">Community Bible Church helps to support over a dozen missionaries across the world and has been a part of several church plants.</h4>
				</div>
			</div>
		</div>
		<div class="container-fluid">
			<?php 
				$missionsArray = $missions->FetchAllMissions();

				foreach($missionsArray as $missionCards) {
					if ($secure) {
						$name = $missionCards["MissionsName"];
						$descrip = $missionCards["MissionsDescrip"];
						$id = $missionCards["MissionsID"]
			?>
						<div class="row rowPadVert">
							<div class="col-lg-8 offset-lg-2">
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
											<?php include_once("php_partial/summernote.php"); ?>
											<div style="text-align: center">
												<br>
												<input type="submit" class="btn btn-outline-secondary btn-lg"></input>
												<a href="mission.php?id=<?php echo $id;?>"><button type="button" class="btn btn-outline-secondary btn-lg">Edit</button></a>
												<a href="../controllers/mission-delete.php?id=<?php echo $id;?>"><button type="button" class="btn btn-outline-secondary btn-lg">Delete</button></a>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
			<?php
					}
					else {
			?>
						<div class="row rowPadVert">
							<div class="col-lg-8 offset-lg-2">
								<div class="card">
									<div class="card-body">
										<h5 class="card-title"><?php echo $missionCards["MissionsName"];?></h5>
										<p class="card-text"><?php echo $missionCards["MissionsDescrip"]?></p>
										<div class="text-center">
											<a href="mission.php?id=<?php echo $missionCards["MissionsID"]?>" class="btn btn-outline-secondary btn-lg">Read More</button></a>
										</div>
									</div>
								</div>
							</div>
						</div>
			<?php
					}
				}
				if ($secure) {
			?>
					<div class="row rowPadVert">
						<div class="col text-center">
							<a href="../controllers/mission-create.php" class="btn btn-outline-secondary btn-lg">Create</a>
						</div>
					</div>
			<?php
				}
			?>
		</div>
	</body>
</html>