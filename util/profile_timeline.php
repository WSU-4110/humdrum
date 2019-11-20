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
	$content = array();
	$spotify = array();
    $postid = array();
	
	
	
	if ($result->num_rows > 0) {

		// output data of each row

		while($row = $result->fetch_assoc()) {
			if($row["User"] == $profile_user) {
				array_push($user, $row["User"]);
				array_push($content, $row["Content"]);
				array_push($spotify, $row["Spotify"]);
				array_push($postid, $row["PostID"]);
			}
		}

		if ($user != NULL) {
			// looping thru the results backwards ?>
			<h2>Posts from <?=$profile_user?>:</h2>
			<?php
			$i=sizeof($user) - 1;
			foreach($user as $value):

				include "post.php";

				$i--;

			endforeach;
		}
	}

	else {
		echo "no results";
	}
	?>

</div>
