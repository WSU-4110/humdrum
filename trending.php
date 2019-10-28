<!DOCTYPE html>
<meta name="viewport" content="width=device-width, initial-scale=1">


<html lang="en">
	<head>
		<title> humdrum </title>
		<meta charset="utf-8">
	</head>
	<link href="humdrum.css" rel="stylesheet" type="text/css" media="screen" />


	<nav>
		<?php include("navbar.php"); ?>
	</nav>

	<div class= "wrapper">
	<body>
	</body>
	</div>
	<div class= "wrapper">
	<div class= "box">
		<?php
		{
		echo "
			<img src=\"images/ProfileTest.jpg\" alt=\"Profile Picture.\" width=\"32\" height=\"32\">
		";
		}
		?>
	<?php include "profile_timeline.php" ?>
	</div>
	<br><br>
	<h1>Trending On Humdrum!</h1>
	<hr>
	<br>
	<h3>1. #TheBeatles</h3>
	<h3>2. #JonasBrothers</h3>
	<h3>3. #Kanye</h3>
	<h3>4. #MajidJordan</h3>
	<h3>5. #Drake</h3>
	<h3>6. #Beyonce</h3>
	<h3>7. #Jazz</h3>
	<h3>8. #R&B</h3>
	</div>

		<footer>
		Copyright © 2019 Team 7
		<br>
		<a href="mailto:scott@howard.com" target="_top"> Scott@Howard.com </a>
	</footer>

</html>
