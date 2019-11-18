<?php

session_start();
include "util\db_connect.php";
if ($mysqli->connect_errno)//
{
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}


$sql = "SELECT username, password FROM user_pass";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) 
{
    while($row = $result->fetch_assoc()) 
    {	
        if($row["username"] == $_POST["Username"] and $row["password"]==$_POST["Password"])//checks if user input matches a corresponding username and password in the database
        {
			
			$_SESSION["user_id"] =  $row["username"];
			if($_POST["UseSpotify"] == "true"){
				header("Location: spotifySignIn.php");//sends user to homepage in the event of a valid login
				exit;}
			else{
				header("Location: util/getAccessId.php");//sends user to homepage in the event of a valid login
				exit;}
        }
    }
    
    header("Location: index.php");//redirects user back to front page in the event of an invalid login
    exit;
} 
else 
{
    header("Location: index.php");//redirects back to front page in the case of no registered users
    exit;
}

$mysqli->close();

?>