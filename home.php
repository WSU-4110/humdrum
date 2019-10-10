
<!DOCTYPE html>
<meta name="viewport" content="width=device-width, initial-scale=1">


<html lang="en">
 <?php 
 session_start();
 
 if ($_SESSION["user_id"] == NULL)
	 {
     header("Location: login.php");
     die();
	 }
 ?>

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
				
					
				
					
					
					<!--<div class="post">
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
						
					
					
					
					</div> -->
					<?php
					
					

						include "db_connect.php";
					// search for keyword
					$sql = "SELECT * FROM user_posts";
					$result = $mysqli->query($sql);

					$user = array();
					$content = array();
					$spotify = array();
					
					if ($result->num_rows > 0) {
					// output data of each row
					while($row = $result->fetch_assoc()) {
						
						array_push($user, $row["User"]); 
						array_push($content, $row["Content"]); 
					array_push($spotify, $row["Spotify"]);
					}
					
					// looping thru the results backwards
					$i=sizeof($user) - 1;
					foreach($user as $value){
					echo "<div class=\"post\">
						<div class=\"postDiv\">
						<img src=\"images/ProfileTest.jpg\" alt=\"Profile Picture.\" width=\"32\" height=\"32\">
						". $user[$i] . "</b>
						</div>
						<div class=\"postDiv\">
							". $spotify[$i] . "
							</div>
						<div class=\"postDiv\">
						<div>". $content[$i] ." </div>
						Average Rating: 5/5
						</div>
					</form>
						</div>
					";
					
					$i--;
					}
					} 
					 else {
					echo "no results";
					}
					?>
				</div>

			<!--Right Page - Music Search -->
			<div class="box">

				<div class="page">

					<div>
					<?php
					include "db_connect.php";
					
					?>
					<h2> Create a Post </h2>
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
					echo "<br>" . "<b>Artist: </b>" . $row["artist"]. "<br>" . "<b>Song: </b>" . $row["song"]. "<br>" . "<b>Youtube Link: </b> <br>" . $row["url"] . "<br>";
					
					$_SESSION["spotify"] = $row["url"];
				
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
				
						<form action="add_post.php" method = "post" >
					Submit a post:<br>
					<textarea id="msg" name="post_body"></textarea>
					<br>
					<input type="submit" value="Submit">
					
					</form>
					
					
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
