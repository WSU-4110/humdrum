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


     echo("<h2>". $row["User"] . "</h2><br>");

     //echo($row["Spotify"] . "<br>");
	 ?>
	 <iframe src="https://open.spotify.com/embed/artist/<?php echo $row["Spotify"]?>" width="300" height="380" frameborder="0" allowtransparency="true" allow="encrypted-media"></iframe> 
	 <?php
	 echo("<h4>Content: ". $row["Content"] . "</h4>");
     


    



$sql = "SELECT * FROM comments WHERE PostID = " . $postid . "";
	$result = $mysqli->query($sql);
    //$row = $result->fetch_assoc();

while($row = $result->fetch_assoc()) {

	echo( "<h4>". $row["Username"] . " commented: ". $row["Content"] . "<br> </h4>");
		
     
     echo($row["Time"] . "<br><br><br>"); 

}
?>