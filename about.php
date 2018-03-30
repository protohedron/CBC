<?php

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

<?php 
/*
	include_once('objects/articleObject.php');

	$titles = ["HISTORY OF CBC", "MISSION OF CBC", "VALUES OF CBC"];
	$contents = ["<p>In the spring of 1991, Heritage Bible Church purchased property in the Powdersville/Wren area, one of the state's fastest growing communities. John Barnett who was the youth and family pastor at Heritage wanted to pursue a pastorate of his own. It was in March of 1992 that John began the church plant in the Powdersville/Wren area with the first church meetings being held in the Wren High School auditorium.</p><p>Community Bible Church grew so quickly that we needed to build our own church building. Construction began in July of 1993 and continued with volunteer labor until February of 1994 when the building was completed and paid in full. With great joy and pride we dedicated the church building to the glory of God on Sunday, March 27th, 1994.</p><p>Our desire as a church is for every member of CBC to use their talents and gifts to honor Christ and be an active member of His body. It is exciting to see our people ministering each Sunday and throughout the week in the areas that God has blessed them. </p>", "<p>Community Bible Church exists to produce genuine followers of Jesus Christ who join Him in loving God, loving people and redeeming the world.</p>", "<ol><li>1. Our world makes no sense without GOD.</li><li>2. The answer to life's questions is JESUS.</li><li>3. People matter eternally.</li><li>4. Only broken people can become Christ followers.</li><li>5. Grace and Truth ALWAYS go together.</li><li>6. Growth and change are lifelong pursuits.</li></ol>"];
	$page = "about";

	//one time use to upload to DB.
	for ($i=0; $i < 3; $i++) { 
		article::createArticle($titles[$i], $contents[$i], 1);
	}
	*/

?>

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
	<h1 class="header_title">About</h1>
</div>

<?php 
	article::FetchArticleByPage(1);
?>

</body>
</html>