<link href="humdrum.css" rel="stylesheet" type="text/css" media="screen" />
<div class= "page">

<?php

	include "db_connect.php";
	
	// search for keyword
	
	$sql = "SELECT * FROM user_posts";
	$result = $mysqli->query($sql);

	$user = $_SESSION["user_id"];
	$content = array();
	$spotify = array();
    $postid = array();

	if ($result->num_rows > 0) {
		
		// output data of each row
		
		while($row = $result->fetch_assoc()) {

			if($row["User"] == $_SESSION["user_id"]) {
				array_push($content, $row["Content"]);
				array_push($spotify, $row["Spotify"]);
				array_push($postid, $row["PostID"]);
			}
		}

		// looping thru the results backwards
		echo "<h2>Recent posts from ". $user . "</h2>";
		$i=sizeof($content) - 1;
		foreach($content as $value):
		
		include "post.php";
		
		$i--;
		
		endforeach;
	}
	
	else {
		echo "no results";
	}
	?>

</div>