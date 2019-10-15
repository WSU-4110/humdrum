
<!DOCTYPE html>
<meta name="viewport" content="width=device-width, initial-scale=1">


<html lang="en">
 <?php
 /*session_start();

 if ($_SESSION["user_id"] == NULL)
	 {
     header("Location: login.php");
     die();
	 }
*/
 ?>

<head>
	<title> humdrum </title>
	<meta charset="utf-8">
<script src="https://kit.fontawesome.com/5704b8a73a.js" crossorigin="anonymous"></script>
</head>
<link href="humdrum.css" rel="stylesheet" type="text/css" media="screen" />


	<?php include("navbar.php"); ?>
<br><br>

<div class= "wrapper">
	<body>

		<!--Left Page - Profile -->
		
		<div class="box">
		<?php include "profile_timeline.php" ?>
		</div>
		
		<!--Center Page - Timeline -->
		
		<div class="box">
		<?php include "timeline.php" ?>
		</div>
	
		<!--Right Page - Music Search -->
		
		<div class="box">
		<?php include "search_music.php" ?>
		</div>

	</body>
</div>
<?php include "footer.php" ?>


</html>
