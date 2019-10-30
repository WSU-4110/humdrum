<div class= "page">
	<?php 
		session_start();
		include "db_connect.php";
		
		$new_post = $_REQUEST["post_body"];
		$currentUser = $_SESSION["user_id"];
		$spotifyEmbed = $_SESSION["spotify"];
		
		if($new_post) {
			echo "<h2>$new_post </h2>";
			$sql = "INSERT INTO user_posts (Content, User, Spotify) VALUES ('$new_post', '$currentUser', '$spotifyEmbed')";
			$result = $mysqli->query($sql);
		}
		
		header("Location: home.php");
		exit;
	?>
</div>