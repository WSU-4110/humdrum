<?php 
	
	include "db_connect.php";
	if(!isset($_SESSION))
    {
	session_start();
    }
	$new_post = $_REQUEST["post_body"];
	$currentUser = $_SESSION["user_id"];
	$spotifyEmbed = $_SESSION["Spotify"];
	// $userToFollow = "zach";
	
	if($new_post) {
		echo "<h2>$new_post </h2>";
		$sql = "INSERT INTO user_posts (Content, User, Spotify) VALUES ('$new_post', '$currentUser', '$spotifyEmbed')";
		//$sql = "insert into `user_follow` values($currentUser, $userToFollow)"
		$result = $mysqli->query($sql);
	}
	
	header("Location: ../home.php");
	exit;
?>
