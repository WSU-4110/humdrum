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
</div>
<?php
include "db_connect.php";
?>
<div class="page">
<div class="post">
	<?php
	include "db_connect.php";
	?>

	<?php


	// search for keyword
	$sql = "SELECT tag, COUNT('tag') AS value_occurence FROM hashtag GROUP BY tag ORDER BY value_occurence DESC LIMIT 2";
	$result = $mysqli->query($sql);

	if ($result->num_rows > 0) {
	// output data of each row
	while($row = $result->fetch_assoc()) {
	echo $row["tag"]."<br>";

	}
	}
	$mysqli->close();
	?>
	<br>

	<div>

	<script async src="https://cse.google.com/cse.js?cx=004780170324679756711:jppohlwwgaz"></script>
	<div class="gcse-search" ></div>
	</div>
</div>
</div>
<br>

  <footer>
  Copyright © 2019 Team 7
  <br>
  <a href="mailto:scott@howard.com" target="_top"> Scott@Howard.com </a>
</footer>

</html>
