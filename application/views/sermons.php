<style>
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
}
th {
    text-align: left;
}
</style>
<?php
	include '../models/audioObject.php';
	$audio= new audio();

	if(isset($_POST['delete'])){
		echo $audio->DeleteAudio($_POST['delete']);
	}
	if(isset($_POST['update']) and isset($_POST['updateTarget'])){
		echo $audio->editAudioName($_POST['updateTarget'], $_POST['update']);
	}

	if(isset($_POST['name']) AND isset($_POST['date']) AND isset($_FILES)){
		$name = $_POST['name'];
		$date = $_POST['date'];
		$file = $_FILES['audio']['name'];
		$tmpname = $_FILES['audio']['tmp_name'];
		if(!empty($name) and !empty($date) and !empty($file) and !empty($tmpname)){

			echo $audio->CreateAudio($name, $file ,$tmpname, $date);
		}
	}



?>

<!DOCTYPE HTML>
<html lang = "en">

<head>
	<title>CBC</title>
	<meta charset = "UTF-8">	
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../../public/css/cbc.css">
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
		<a href="" class="black">Missions</a>
		<a href="" class="black">Online Giving</a>
		<a href="" class="black">Sermons</a>
		<a href="" class="black">About</a>
	</nav>
</div>

<div class="header_bar teal">
	<h1 class="header_title">Sermons</h1>
</div>

<h4 style="font-family: tweb; text-align: center; margin-top: 6em;">Community Bible Church is passionate about producing genuine followers of Jesus Christ who join Him

in LOVING GOD, LOVING PEOPLE, and REDEEMING THE WORLD. Solid Biblical teaching and preaching is a vital

component of that process. Below is an archive of some of the recent sermons from CBC.</h4>
<form action="sermons.php" Method="POST" enctype="multipart/form-data">
	Name: <input type="text" name="name"><br><br>
	Date: <input type="date" name="date"> <br><br>
	<input type="file" name="audio" accept=".ogg,.flac,.mp3"><br><br>
	<input type="submit" value="Submit">
</form>

<table style="width:50%">
	<tr>
	    <th>Name</th>
	    <th>Podcast</th> 
	    <th>Date</th>
  	</tr>
<?php
	$podcasts = $audio->fetchAudioAll();

	foreach($podcasts as $podcast){
		?>
		<tr>
		<td> 
			<form action="sermons.php" Method="POST" id="reset">
				<input type="text" name="update" value=<?php echo $podcast['AudioName']; ?>>
			</form>
		</td>
		<td>
			<audio controls>
				<source src=<?php echo $podcast['AudioLocation']."\\".$podcast['AudioFile'] ?>>
			</audio>
		</td>
		<td> <?php echo $podcast['AudioDate']; ?> </td>
		<td> 
			<form action="sermons.php" Method="POST">
				<button type="submit" name="delete" value=<?php echo $podcast['AudioID'] ?> >Delete</button>
			</form>
		</td>
		<td>
			<button type="submit" name="updateTarget" form="reset" value=<?php echo $podcast['AudioID']?> >Update</button>
		</td>


		<?php
	}
?>
<table>

</body>
</html>