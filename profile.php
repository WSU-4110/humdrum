
<!DOCTYPE html>
<meta name="viewport" content="width=device-width, initial-scale=1">


<html lang="en">
 <?php
 if(!isset($_SESSION))
    {
	session_start();
    }
 

 if ($_SESSION["user_id"] == NULL)
	 {
     header("Location: login.php");
     die();
	 }
 ?>

<head>
	<title> humdrum - Profile </title>
	<meta charset="utf-8">
<script src="https://kit.fontawesome.com/5704b8a73a.js" crossorigin="anonymous"></script>
<link href="humdrum.css" rel="stylesheet" type="text/css" media="screen" />
</head>


<nav>
	<?php include("navbar.php"); ?>
</nav>
	
<br><br>

<body>

	<div class= "wrapper">
		<?php
		if (!isset($_GET['user']))
			$profile_user = $_SESSION["user_id"];
		else
			$profile_user = $_GET['user'];
		?>
		<!--Left Page - Profile -->
		
		<div class= "box_wide">
		<?php include "util\profile_details.php" ?>
		</div>
		
		<!--Center Page - Timeline -->
		
		
		<div class= "box">
		<?php include "util\profile_timeline.php" ?>
		</div>
	
	</div>
		
</body>


<?php include "footer.php" ?>


</html>
