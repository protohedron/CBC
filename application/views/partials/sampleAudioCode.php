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
	include 'audioObject.php';
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
<form action="sampleAudioCode.php" Method="POST" enctype="multipart/form-data">
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
			<form action="sampleAudioCode.php" Method="POST" id="reset">
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
			<form action="sampleAudioCode.php" Method="POST">
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