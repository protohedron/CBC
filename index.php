<?php

?>

<!DOCTYPE HTML>
<html lang = "en">

	<head>
		<title>CBC</title>
		<meta charset = "UTF-8">	
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<?php include_once("php_partial/css_includes.php"); ?>
		<link rel="icon" type="image/png" href="img/favicon.png"> <!--  Favicon needs to be generated -->
	</head>

	<body>

		<!--Logo and nav holder-->
		<div class="top_bar">
			
			<!--Logo holder-->
			<div class="logo_holder">
				<img class="logo" src="img/logo.png"></img>
			</div>
			
			<!--Nav bar-->
			<nav>
				<a href="">Ministries</a>
				<a href="">Calendar</a>
				<a href="">Missions</a>
				<a href="">Online Giving</a>
				<a href="">Sermons</a>
				<a href="">About</a>
			</nav>
		</div>

		<!--Showcase Image-->
		<img class="shcase_img" src="img/img_1.png"></img>

		<!--Begin Sections-->
		<div class="container-fluid">
			<?php
				function printRow($color, $title, $content) {
			?>
					<div class="row">
						<!--Begin Get To know us Section-->
						<div class="col-md-4 <?php echo $color; ?>">
							<h1 class="section_title font"><?php echo $title; ?></h1>
						</div>
						
						<div class="col border-bottom border-secondary">
							<div class="row">
								<div class="col-1 d-none d-lg-block arrow-right <?php echo $color; ?>"></div>
								<div class="col">
									<h4 class="filler_text"><?php echo $content; ?></h4>
								</div>
							</div>
						</div>
						<!--End Get To Know Us-->
					</div>
			<?php
				}

				printRow("teal", "Get To Know Us",
				'Here at CBC our mission is to produce followers of Jesus Christ who join Him in loving God, loving people and redeeming the world.
				<br>
				[Then maybe a tad bit more about the Church]
				<br>
				[Also maybe put address here?]');

				printRow("darkgray", "Service Times",
				'Sunday Morning: 9:30am
				<br>
				Sunday Night: [time]
				<br>
				Wednesday Night: [time]');

				printRow("lightred", "Upcoming Events",
				'Event#1 - [date]
				<br>
				Event#2 - [date]
				<br>
				Event#3 - [date]
				<br>
				<br>
				<button type="button" class="btn btn-outline-secondary btn-lg">More</button>');

				printRow("darkgreen", "Missions",
				'Community Bible Church helps to support over a dozen missionaries across the world and has been a part of several church plants.
				<br>
				<br>
				<button type="button" class="btn btn-outline-secondary btn-lg">See More</button>');

				printRow("teal", "Sermon Podcasts",
				'CBC is passionate about producing genuine followers of Jesus Christ who join Him in LOVING GOD, LOVING PEOPLE, and REDEEMING THE WORLD. Solid Biblical teaching and preaching is a vital component of that process. **Listen to Sermons wherever you are..**
				<br>
				<br>
				<button type="button" class="btn btn-outline-secondary btn-lg">Listen to Sermons</button>');

				printRow("purplegray", "Ministries",
				'Through ministries like 180 , GED, LifeTRUTH and many others, Community Bible Church is committed to Being Jesus to our community and making a difference in the lives of those around us.
				<br>
				<br>
				<button type="button" class="btn btn-outline-secondary btn-lg">See All Ministries</button>');

				printRow("darkred", "Online Giving",
				'CBC is excited to offer the option of giving online with a credit/debit card or through a direct checking account withdrawal. Your gift will be processed promptly, and your financial information will be secure. May God bless you as you follow His direction in your giving!
				<br>
				<br>
				<button type="button" class="btn btn-outline-secondary btn-lg">Give Online</button>');

				printRow("mustard", "I'm New",
				'Whether this is your first time to Community Bible Church or you\'ve been attending for a while, we want to hear from you.
				<br>
				<br>
				<button type="button" class="btn btn-outline-secondary btn-lg">Get Info</button>');

				printRow("darkteal", "Contact and Info",
				'If you have any questions or would like to get plugged in at CBC please call us at 864-859-2662
				<br>
				<br>
				Our address is <u>8005 Highway 81 North in Easley, SC</u>');

				printRow("purplegray", "About CBC, Staff &amp; More",
				'Learn about our staff, our values, our history, and more!
				<br>
				<br>
				<button type="button" class="btn btn-outline-secondary btn-lg">Learn About CBC</button>');

				printRow("lightred", "Social Media",
				'Facebook, Instagram and YouTube');
			?>	
		</div>

		<!--Footer-->
		<footer class="footer">
			<div class="container text-center">
				<span class="text-muted"><!-- Place sticky footer content here. --></span> 
			</div>
		</footer>

	</body>
</html>