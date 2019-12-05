<?php

	include "db_connect.php";
	if(!isset($_SESSION))
    {
	session_start();
    }
	$new_post = $_REQUEST["post_body"];
	$hash_tag = $_REQUEST["tag_hash"];
	$userrating = $_REQUEST["rating"];
	$currentUser = $_SESSION["user_id"];
	$spotifyEmbed = $_SESSION["Spotify"];
	$musicType = $_SESSION["musicType"];
	$spotifyEmbed = $_REQUEST["musicId"];
	echo $spotifyEmbed;
	echo $musicType;
	// $userToFollow = "zach";

	if($new_post) {
		echo "<h2>$new_post </h2>";
		$sql = "INSERT INTO user_posts (Content, hashtag, User_rating, User, Spotify, MusicType) VALUES ('$new_post', '$hash_tag', '$userrating', '$currentUser', '$spotifyEmbed', '$musicType')";
		//$sql = "insert into `user_follow` values($currentUser, $userToFollow)"
		$result = $mysqli->query($sql);
	}

	header("Location: ../home.php");
	exit;
?>
