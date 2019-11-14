<?php 
include "db_connect.php";

session_start();

$postid = $_POST["var"];
$user = $_SESSION["user_id"];
$_SESSION["postID"] = $postid;

//print_r ($postid);
    
    
    $sql = "SELECT * FROM user_posts WHERE PostID = " . $postid . "";
    //$sql = "SELECT * FROM user_posts WHERE PostID = " . $_SESSION("postID") . "";
	$result = $mysqli->query($sql);

    $row = $result->fetch_assoc();


    //$result = $mysqli->query($sql);

    
    header("Location: view_post.php");

?>