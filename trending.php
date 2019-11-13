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
	<h1>Explore!</h1>
	<hr>
	<br>
	</div>
	<?php
	include "db_connect.php";
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
		$expression = "/#+[a-zA-Z0-9_]/";
		$taghash = preg_replace($expression, '<a href="hashtag.php?tag=$0">$0</a>', $taghash);
		return $taghash;
	}
	$sql = "SELECT user, content, tag FROM hashtag WHERE tag LIKE '%" . $keywordfromform . "%'";
	$result = $mysqli->query($sql);

	$taghash = "SELECT tag FROM hashtag WHERE content LIKE '%" . $keywordfromform . "%'";
	//$sql = convertHashtagtoLink($sql);
	if ($result->num_rows > 0) {
	// output data of each row
	while($row = $result->fetch_assoc()) {
		$taghash = convertHashtagtoLink($taghash);
	echo "<br>" . "<b>User: </b>" . $row["user"]. "<br>" . "<b>Post: </b>" . $row["content"]. "<br>";
	echo $taghash;

	}
	} else {
	echo "no results";
	}
	}
	$mysqli->close();
	?>
	<br>

		<footer>
		Copyright © 2019 Team 7
		<br>
		<a href="mailto:scott@howard.com" target="_top"> Scott@Howard.com </a>
	</footer>

</html>
