<link href="humdrum.css" rel="stylesheet" type="text/css" media="screen" />
<div class= "page">

	<?php
	include "db_connect.php"; 
    if(!isset($_SESSION))
    {
	session_start();
    }
	// search for keyword
	
	$sql = "SELECT * FROM user_posts";
	$result = $mysqli->query($sql);
	
	
	// WILL change to reflect which profile page is used
	$profile_user = $_SESSION["user_reder"];
	?>


	<div class= "padd">



		<!-- Profile Picture -->
		<div class= "padd">
			<?php
			$pic = "profile_pics/". $profile_user . '.jpeg';
			?>

			<img src=<?=$pic?> alt="Profile Picture." width="96" height="96">
		</div>
		
		
		
		<!-- Current User's Name -->
		<div class= "box_drawn">
		<h2><?=$profile_user?></h2>
			<!-- ** follow button in progress - Not functional yet! ** -->
			<a href="profile.php?reset=true" name ="reset"><img src="images/follow.jpg" alt="Follow Button"></a>
			<?php
				include "db_connect.php";
				
				if (isset($_GET['reset'])) {
				addFollower();
				}
				function addFollower() {
				include "db_connect.php";
				$sql = "INSERT INTO user_follow (followers, following)
						select username, username
						FROM user_pass";
				$result = $mysqli->query($sql);
				}
				$mysqli->close();
			?>
		</div>
		
	</div>
	
	<br>
	
	
	<?php
	if ($profile_user = $_SESSION["user_id"]) {
		?>
		<div class= "padd">
			<form action="util/upload_img.php" method="post" enctype="multipart/form-data">
			Select Image File to Upload:
			<input type="file" name="file">
			<input type="submit" name="submit" value="Upload">
			<input type='hidden' name='profile_user' value='<?php echo "$profile_user";?>'> 
		</form>
		</div>
		
		<br>
		<?php
	}
	?>
	
	<!-- Calculating post number... -->
	<?php
	$post_num = 0;
	if ($result->num_rows > 0) {
		
		// Add post to counter
		
		while($row = $result->fetch_assoc()) {
			if($row["User"] == $profile_user) {
				$post_num++;
			}
		}

	}
	?>
	
	
	<!-- Information -->
	<div class= "box_drawn">
		<?php
		include "db_connect.php"; 
		$sql = "SELECT * FROM user_pass";
		$result = $mysqli->query($sql);
		
		while($row = $result->fetch_assoc()) {
			if($row["username"] == $profile_user) {
				$join_date = $row["join_date"];
				$bio = $row["bio"];
			}
		}
		
		?>
		
		<h2>Stats:</h2><br>
			Join date: <?=$join_date?><br>
			Posts: <?=$post_num?><br>
			
	</div>
	
	<br>
	
	<!-- Bio -->
	<div class= "box_drawn">
	
	<h2>Bio:</h2><br>
		<?=$bio?>
		
	</div>
	
	<br>
	
	<!-- Reccomendations -->
	<div class= "box_drawn">
	
	<h2>Music Reccomendations:</h2><br>
		MUSIC LINKS
		
	</div>
	
	<div class= "box_drawn">
	
	<h2>Followers</h2><br>
	<?php
	include "db_connect.php";
	$sql = "SELECT followers FROM user_follow";
	$result = $mysqli->query($sql);
	if ($result->num_rows > 0) {
    // output data of each row
		while($row = $result->fetch_assoc()) {
			echo "<br>" . $row["followers"]. "<br>";
		}
	} else {
		echo "This user has no followers";
	}
	$mysqli->close();
	
	?>
		
	</div>
	
	<div class= "box_drawn">
	
	<h2>Following</h2><br>
	<?php
	include "db_connect.php";
	$sql = "SELECT following FROM user_follow";
	$result = $mysqli->query($sql);
	if ($result->num_rows > 0) {
    // output data of each row
		while($row = $result->fetch_assoc()) {
			echo "<br>" . $row["following"]. "<br>";
		}
	} else {
		echo "This user is not following anyone";
	}
	$mysqli->close();
	
	
	?>
		
		
	</div>


</div>