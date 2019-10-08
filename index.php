<!DOCTYPE html>
<html lang="en">
	<head>
		<title> humdrum </title>
		<meta charset="utf-8">
	</head>
	<style type="text/css">
		header, nav, footer {
			width: 100%;
			background-color: lightblue;
			/*color: rgba(255, 255, 255, 0.7);*/
			color: white;
			font-family: georgia;
			padding: 20px;
		}
		header {
			display: float;
			float: top;
		}
		nav {
			position: relative;
			display: inline-block;
			font-family: Verdana;
		}

		body {
			background-color: lightblue;
			color: #666666;
			font-family: arial;
		}
		.wrapper {
			position: center;
			min-width:1200px;
			width: 100%;
		}
		.box {
					min-height: 1024px;

			float: left;
			border: 2px solid black;
		}
		.box:nth-child(1) {
			width: 33%;
			background-color: red;
		}
		.box:nth-child(2) {
			width: 33%;
			background-color: green;
		}
		.box:nth-child(3) {
			width: 33%;
			background-color: yellow;
		}
		.page {
		
			background-color: white;
			color: black;
			font-family: Verdana;
			padding: 20px;
		}
		.post {
			min-height:160px;
			background-color: white;
			color: black;
			font-family: Verdana;
			padding: 20px;
		}
		footer {
			position: fixed;
			bottom: 0px;
			width: 100%;
			height: 40px;
			background-color: white;
			color: #666666;
			font-family: arial;
			padding: 20px;
		}
	</style>

	<header>
		<div>
			<h1><i> <img src="images/banner.jpg"> </i></h1>
		</div>
	</header>

	<nav>

		<a href="index.html"> <img src="images/home.jpg"> </a> &nbsp; <a href="profile.html"> <img src="images/profile.jpg"> </a> &nbsp; <a href="trending.html"> <img src="images/trending.jpg"> </a> &nbsp; <a href="notifications.html"> <img src="images/notifications.jpg"> </a> &nbsp;
		

	</nav>

	<div class= "wrapper">
		<body>

			<!--Left Page - Profile -->
			<div class="box">

				<div class="page">

					<div>
						<img src="images/ProfileTest.jpg" alt="Profile Picture." width="32" height="32">
						<b>Manny Calavera</b>
					</div>

				</div>
			</div>

			<!--Center Page - Timeline -->
			<div class="box">
				<div class="page">

					<div class="post">
						<div>
						<img src="images/ProfileTest.jpg" alt="Profile Picture." width="32" height="32">
						<b>Manny Calavera</b> shared Humdrum by Peter Gabriel
						</div>
						<div>
							<iframe width=80% height=80% src="https://www.youtube.com/embed/rLOuwNfF050"></iframe>
						</div>
					</div>

				</div>
			</div>

			<!--Right Page - Music Search -->
			<div class="box">

				<div class="page">

					<div>
					<?php
					include "db_connect.php";
					
					?>
					<form action="" method="post">
					Search for a song/artist:<br>
					<input type="text" name="keyword"><br>
					<input type="submit" value="Submit">
					</form>
					<?php
					if (!empty($_REQUEST['keyword'])) {
					$keywordfromform = $_REQUEST["keyword"];

					// search for keyword
					$sql = "SELECT artist, song, url FROM music WHERE artist LIKE '%" . $keywordfromform . "%'";
					$result = $mysqli->query($sql);

					if ($result->num_rows > 0) {
					// output data of each row
					while($row = $result->fetch_assoc()) {
					echo "<br>" . "<b>Artist: </b>" . $row["artist"]. "<br>" . "<b>Song: </b>" . $row["song"]. "<br>" . "<b>Youtube Link: </b>" . $row["url"] . "<br>";
					}
					} else {
					echo "no results";
					}
					}
					$mysqli->close();
					?>
					<br>
						
					</div>

				</div>
			</div>

		</body>
	</div>
	<footer>
		Copyright © 2019 Team 7
		<br>
		<a href="mailto:scott@howard.com" target="_top"> Scott@Howard.com </a>
	</footer>

</html>
