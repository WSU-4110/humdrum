<div class= "page">

	<?php

	include "db_connect.php";
    if(!isset($_SESSION))
    {
	session_start();
    }
	// search for keyword

	$sql = "SELECT * FROM user_posts";
	$result = $mysqli->query($sql);

	$user = array();
	$tag = array();
	$content = array();
	$spotify = array();
	$postid = array();
	$musicType = array();

	if ($result->num_rows > 0) {

		// output data of each row

		while($row = $result->fetch_assoc()) {
			if($row["User"] != $_SESSION["user_id"]) {
				array_push($user, $row["User"]);
				array_push($content, $row["Content"]);
				array_push($tag, $row["hashtag"]);
				array_push($spotify, $row["Spotify"]);
				array_push($postid, $row["PostID"]);
				array_push($musicType, $row["MusicType"]);
			}
		}


		// looping thru the results backwards
		echo "<h2>Timeline:</h2>";
		$i=sizeof($user) - 1;
		foreach($user as $value):

			include "post.php";

			$i--;

		endforeach;
	}

	else {
		echo "no results";
	}
	?>
<br>
</div>
