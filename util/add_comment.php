<?php 
include "db_connect.php";

session_start();

$postid = $_POST["var"];
$user = $_SESSION["user_id"];
$content =$_POST["comment"];
$_SESSION["postID"] = $postid;

//print_r ($postid);
    
    
    $sql = "SELECT * FROM user_posts WHERE PostID = " . $postid . "";
    //$sql = "SELECT * FROM user_posts WHERE PostID = " . $_SESSION("postID") . "";
	$result = $mysqli->query($sql);

    $row = $result->fetch_assoc();


    $sql = "INSERT INTO comments (PostID, Username, Content) VALUES ('$postid', '$user', '$content')";

    $result = $mysqli->query($sql);

    
    header("Location:../home.php");

?>