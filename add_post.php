<?php 
	
	include "db_connect.php";
	
	// if the session is already set, ignore
	if(!isset($_SESSION))
    {
	session_start();
    }
	
	// get POST variable from the previous form in search_music
	$new_post = $_REQUEST["post_body"];
	
	//get super global variables
	$currentUser = $_SESSION["user_id"];
	$spotifyEmbed = $_SESSION["Spotify"];
	
	//post to database if there is a body for the post
	if($new_post) {
		echo "<h2>$new_post </h2>";
		$sql = "INSERT INTO user_posts (Content, User, Spotify) VALUES ('$new_post', '$currentUser', '$spotifyEmbed')";
		$result = $mysqli->query($sql);
	}
	
	//redirect back to home
	header("Location: home.php");
	exit;
?>
