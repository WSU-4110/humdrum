
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
	<title> humdrum </title>
	<meta charset="utf-8">
<script src="https://kit.fontawesome.com/5704b8a73a.js" crossorigin="anonymous"></script>
<link href="humdrum.css" rel="stylesheet" type="text/css" media="screen" />
</head>


<nav>
	<?php include("navbar.php"); ?>
</nav>

<br><br>

<body bgcolor= "white">

	<div class= "wrapper float_center">
		<?php
			$profile_user = $_SESSION["user_id"];
		?>
		<!--Left Page - Profile -->

		<div class= "box float_left">
			<?php include ('util\profile_timeline.php');?>
		</div>

		<!--Center Page - Timeline -->

		<div class= "box float_left">
			<?php include ('util\timeline.php');?>
		</div>

		<!--Right Page - Music Search -->

		<div class="box float_right">
			<?php include ('util\search_music.php');?>
		</div>
		
	</div>

</body>


<?php //include "footer.php" ?>


</html>
