<?php 
include "db_connect.php";
    if(!isset($_SESSION))
    {
	session_start();
    
    }

$postid = $_SESSION['postID'];
//$postid = 

//$postid = $_POST["var"];
    //postid[$i]

//print_r ($postid);
    
    
    $sql = "SELECT * FROM user_posts WHERE PostID = " . $postid . "";
	$result = $mysqli->query($sql);
    $row = $result->fetch_assoc();


     echo($row["User"] . "<br>");
     echo($row["Content"] . "<br>");
     echo($row["Spotify"] . "<br>");
     echo($row["Time"] . "<br><br><br>");


    echo "<br> this is the comment section: <br><br>";



$sql = "SELECT * FROM comments WHERE PostID = " . $postid . "";
	$result = $mysqli->query($sql);
    //$row = $result->fetch_assoc();

while($row = $result->fetch_assoc()) {

   echo($row["PostID"] . "<br>");
     echo($row["Content"] . "<br>");
     echo($row["Username"] . "<br>");
     echo($row["Time"] . "<br><br><br>"); 

}
?>