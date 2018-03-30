<?php
	include_once "objects/staffObject.php";
	$object = new staff();
	$return = $object->FetchAllElders();
	$admin = 0;

	if(isset($_POST['delete'])){
		if(!empty($_POST['delete'])){
			$object->DeleteElder($_POST['delete']);
			header('Location: elders.php');
		}
	}
	if(isset($_POST['name']) && isset($_POST['position']) ){
		if(!empty($_POST['name']) && !empty($_POST['name'])){
			$object->CreateElder($_POST['name'],$_POST['position'] );
			header('Location: elders.php');
		}
	}
?>

<!DOCTYPE HTML>
<html lang = "en">

<head>
	<title>CBC</title>
	<meta charset = "UTF-8">	
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/cbc.css">
	<link rel="icon" type="image/png" href="img/favicon.png">
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
		<a href="" class="black">Missions</a>
		<a href="" class="black">Online Giving</a>
		<a href="" class="black">Sermons</a>
		<a href="" class="black">About</a>
	</nav>
</div>

<div class="header_bar teal">
	<h1 class="header_title">Elders/Deacons</h1>
</div>

<h1 style="font-family: tweb; text-align: center; margin-top: 6em;">
<table style="width:100%">
  <tr>
    <th>Elders</th>
  </tr>
    <?php 
    foreach($return as $elder){
    	?><tr><?php
    	if($elder['elderPosition'] == 'Elder'){
    		?><td><?php echo $elder['elderName']; ?></td>
    <?php
    	if($admin == 1){ ?>
    	<td>
    	<form action="elders.php" method = "POST">
    	<button type="submit" name="delete" value=<?php echo $elder['elderID'] ?>>Delete</button>
    	</form>
    	</td>
    	</tr>
    	<?php }
    	}
    	
    }
    ?>
    
  </tr>
</table>
<table style="width:100%">
  <tr>
    <th>Deacons</th>
  </tr>
    <?php 
    foreach($return as $elder){
    	?><tr><?php
    	if($elder['elderPosition'] == 'Deacon'){
    		?><td><?php echo $elder['elderName']; ?></td>
    	<?php
    		if($admin == 1){ ?>
	    	<td>
	    	<form action="elders.php" method = "POST">
	    	<button type="submit" name="delete" value=<?php echo $elder['elderID'] ?>>Delete</button>
	    	</form>
	    	</td>
    		</tr>
	    <?php }
    	}
    }
    ?>
</table>
</h1>
	<?php if($admin == 1){ ?>
		<form action="elders.php" method="post">
		Name: <input type="text" name="name"><br>
		<select name ="position">
		  <option value="Deacon">Deacon</option>
		  <option value="Elder">Elder</option>
		</select>
		<input type="submit">
		</form>
	<?php } ?>

</body>
</html>