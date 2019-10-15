 <?php
 session_start();
 //include "home.php";
 
 //include "login.php";
 //include "add_post.php";
 
 $_SESSION["user_id"]= NULL;
?>
<!DOCTYPE html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<html lang="en">

	<head>
		<title> humdrum-login </title>
		<meta charset="utf-8">
		<link href="humdrum.css" rel="stylesheet" type="text/css" media="screen" />
	</head>
	
<header>
<div class= "pageTitle">
<h1><i>humdrum</i></h1><br><br>
</div>
</header>

<!--form for user to input their username and password.-->
<body>
<div class= "wrapperlogin">
 <form action="login.php" method="post">
  Username:<br>
  <input type="text" name="Username"><br>
  Password:<br>
  <input type="text" name="Password"><br><br>
  <input type="submit" value="Submit">

<?php

//the following code is for testing purposes only and displays all currently registered usernames and passwords.
//I reccomend commenting this out for all live demos.
include "db_connect.php";
if ($mysqli->connect_errno)
{
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

$sql = "SELECT username, password FROM user_pass";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<br>" . "username: " . $row["username"]. "<br>" . "password: " . $row["password"]. "<br>" . "<br>";
    }
} else {
    echo "wrong password or username";
}
$mysqli->close();

    
?>

</form>
</div>
</body>
</html>