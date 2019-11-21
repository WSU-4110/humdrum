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
	<br><br>

	<body bgcolor= "white">
	

		<div class= "wrapper float_center">
			<div class= "box float_left">
			<?php
			$profile_user = $_SESSION["user_id"];
			include "util\profile_timeline.php";
			?>
			
			</div>
			
			<div class= "box_wide float_right">
				<div class= "page">
					<br><br>
						<h1>Explore!</h1>
					<br>
					
					<?php
					include "util\db_connect.php";
					?>
					<form action="" method="post">
						Search for a hashtag:<br>
						<input type="text" name="keyword"><br>
						<input type="submit" value="Submit">
					</form>
					<?php
						if (!empty($_REQUEST['keyword'])) {
							$keywordfromform = $_REQUEST["keyword"];

							// search for keyword
							//$sql = "SELECT user, content, tag FROM hashtag WHERE tag LIKE '%" . $keywordfromform . "%'";
							//$result = $mysqli->query($sql);
							function convertHashtagtoLink($taghash){
								$expression = "/#+([a-zA-Z0-9_])+/";
								$taghash = preg_replace($expression, '<a href="hashtag.php?tag=$1">$0</a>', $taghash);
								return $taghash;
							}
							$sql = "SELECT User, Content, hashtag FROM user_posts WHERE hashtag LIKE '%" . $keywordfromform . "%'";
							$result = $mysqli->query($sql);

							$taghash =  $keywordfromform;
							$sql = convertHashtagtoLink($sql);
							if ($result->num_rows > 0) {
								// output data of each row
								while($row = $result->fetch_assoc()) {
									$taghash = convertHashtagtoLink($taghash);
									echo "<br>" . "<b>User: </b>" . $row["User"]. "<br>" . "<b>Post: </b>" . $row["Content"]. $taghash."<br>";
								}
							}
							
							else {
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
	
	
	<footer>
		Copyright © 2019 Team 7
		<br>
		<a href="mailto:scott@howard.com" target="_top"> Scott@Howard.com </a>
	</footer>


</html>
