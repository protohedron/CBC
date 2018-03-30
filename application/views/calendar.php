<!DOCTYPE HTML>
<html lang = "en">

<head>
	<title>CBC</title>
	<meta charset = "UTF-8">	
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href='fullcalendar-3.9.0\fullcalendar.css' />
	<link rel="stylesheet" href="../../public/css/cbc.css">
	<link rel="icon" type="image/png" href="../../public/images/favicon.png">
    <script src='../../public/libraries/fullcalendar-3.9.0\lib\jquery.min.js'></script>
    <script src='../../public/libraries/fullcalendar-3.9.0\lib\moment.min.js'></script>
    <script src='../../public/libraries/fullcalendar-3.9.0\fullcalendar.js'></script>
    
	<script>  
	
	//pull everything for calendar
     $(document).ready(function() {
         var calendar = $('#calendar').fullCalendar({
         editable: false,
         header: {
             left: 'prev,next today',
             center: 'title',
             right: 'month,agendaWeek,agendaDay'
        },
         events:'../controllers/uploadCalendar.php',
        });
    });
    </script>
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
		<a href="calendar.php" class="black">Calendar</a>
		<a href="" class="black">Missions</a>
		<a href="" class="black">Online Giving</a>
		<a href="" class="black">Sermons</a>
		<a href="" class="black">About</a>
	</nav>
</div>

<div class="header_bar teal">
	<h1 class="header_title">Calendar</h1>
</div>

<!--display events as text-->
<div>
<br>
<br>

<?php
//load events into page
include "../models/inc.php";

//connect to database
$conn = new mysqli($IP,$USERNAME,$PASSWORD, $DB);

//if cannot connect
if ($conn->connect_error) {
	die('Connect Error: ' . $conn->connect_error);
}

//if can connect
else{
	$query = "SELECT CalanderName, CalanderStart FROM CBCCalander"; 
	$result = '';
	$result = $conn->query($query);
	while($results = $result->fetch_array(MYSQLI_ASSOC)){
		print_r($results["CalanderName"]);
		echo '&nbsp';
		print_r($results["CalanderStart"]);
		echo '<br />';
	}
}
?>
</div>

<br>
<br>
<br>

<!--display calendar-->
<div class='container'>
    <div id='calendar'></div>
</div>
</body>
</html>