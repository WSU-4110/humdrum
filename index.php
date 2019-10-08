<!DOCTYPE html>
<meta name="viewport" content="width=device-width, initial-scale=1">

<?php
require_once 'vendor/autoload.php';
?>
<html lang="en">
	<head>
		<title> humdrum </title>
		<meta charset="utf-8">
	</head>
	<link href="humdrum.css" rel="stylesheet" type="text/css" media="screen" />

	<header>
		<div>
			<h1><i> <img src="images/banner.jpg"> </i></h1>
		</div>
	</header>


	<nav>

		<a href="index.php"> <img src="images/home.jpg"> </a> &nbsp; <a href="profile.html"> <img src="images/profile.jpg"> </a> &nbsp; <a href="trending.html"> <img src="images/trending.jpg"> </a> &nbsp; <a href="notifications.html"> <img src="images/notifications.jpg"> </a> &nbsp;
		

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
				
					<!--Example Posts-->
				
					
				
					
					
					<div class="post">
						<div class="postDiv">
						<img src="images/ProfileTest.jpg" alt="Profile Picture." width="32" height="32">
						<b>Manny Calavera</b> shared at 11:32 a.m.<br>
						<b>Weird Part of the Night<br>
						Louis Cole</b>
						</div>
						<div class="postDiv">
							<iframe width=80% height=80% src="https://www.youtube.com/embed/glgPZmSwC4M"></iframe>
							</div>
						<div class="postDiv">
						Average Rating: 5/5
						</div>
						
						<div class="postDiv"> 
						<?php
					include "db_connect.php";
					
					?>
					<form action="" method="post">
					Comment:<br>
					<input type="text" name="keyword">
					<input type="submit" value="Submit">
					</form>
					
						</div>
						
					</dxiv>
					
					
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
					<div>
					<!-- type your post here -->
				
						<form action="" method = "post" >
					Submit a post:<br>
					<textarea id="msg" name="post_body"></textarea>
					<br>
					<input type="submit" value="Submit">
					
					</form>
					<?php 
					include "db_connect.php";
					$new_post = $_REQUEST["post_body"];
					echo "<h2>$new_post </h2>";
					$sql = "INSERT INTO user_posts (Content) VALUES ('$new_post')";
					$result = $mysqli->query($sql);
					
					?>
					<iframe src="https://open.spotify.com/embed/track/1cYDIA4W6eSL4VkPBm1vw7" 
					width="300" height="380" frameborder="0" allowtransparency="true" allow="encrypted-media"></iframe>
					<script async src="https://cse.google.com/cse.js?cx=004780170324679756711:jppohlwwgaz"></script>
					<div class="gcse-search" ></div>
				
					
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
