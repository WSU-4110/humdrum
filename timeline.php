<link href="humdrum.css" rel="stylesheet" type="text/css" media="screen" />
<script src="https://kit.fontawesome.com/5704b8a73a.js" crossorigin="anonymous"></script>
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

			array_push($user, $row["User"]);
			array_push($content, $row["Content"]);
			array_push($spotify, $row["Spotify"]);
            array_push($postid, $row["PostID"]);
		}


		// looping thru the results backwards
		echo "<h2>Timeline</h2>";
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

</div>

