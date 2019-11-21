<link href="humdrum.css" rel="stylesheet" type="text/css" media="screen" />
<div class= "page">

	<?php
	include "db_connect.php"; 
    if(!isset($_SESSION))
    {
	session_start();
    }
	require 'vendor/autoload.php';
	// search for keyword
	
	$sql = "SELECT * FROM user_posts";
	$result = $mysqli->query($sql);
	
	?>


	
	
	<div class= "box_drawn">
	
	
		<!-- Profile Picture -->
		<div class= "float_left">
			<?php
			$pic = "profile_pics/". $profile_user . '.jpeg';
			?>

			<div class= "pic_shadow"><img src=<?=$pic?> alt="Profile Picture." width="96" height="96"></div>
		</div>
		
		
		<!-- Current User's Name -->
		
		<h2><?=$profile_user?></h2>
		
		<?php
		if ($profile_user != $_SESSION["user_id"]) { ?>
		
		
			<!-- ** follow button in progress - Not functional yet! ** -->
			<a href="profile.php?reset=true" name ="reset"><img src="images/follow.jpg" alt="Follow Button"></a>
			<?php
				include "db_connect.php";
				
				if (isset($_GET['reset'])) {
				addFollower();
				}
				function addFollower() {
				include "util/db_connect.php";
				$sql = "INSERT INTO user_follow (followers, following)
						select username, username
						FROM user_pass";
				$result = $mysqli->query($sql);
				}
				$mysqli->close();
		}
		?>
	</div>
	<br>
	
	
	
	<?php
	if ($profile_user == $_SESSION["user_id"]) { ?>
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
	} ?>
	
	
	
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
	
	
	<div>
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
	


	<br>
	<div class = "box_drawn">
	<h2> User Playlists </h2>
	<!-- GET SPOTIFY ACCESS TOKEN FOR USER, AND PRINT USER INFO -->
	<?php 
		include "db_connect.php";
		$api = new SpotifyWebAPI\SpotifyWebAPI();

		// Fetch the saved access token from somewhere. A database for example.
		$currUser = $_SESSION["user_id"];
		echo $currUser ."<br>";
		$sql = "SELECT SpotifyId FROM `user_pass` WHERE username = '$currUser'";
		$result = $mysqli->query($sql);
		
		//while($row = $result->fetch_assoc()){
		$row = $result->fetch_assoc();
		
		// get the username from the sql query. 
		//this will be used in the getUserPlaylists function
		if($row["SpotifyId"] != null){
			$spotifyUsername = $row["SpotifyId"];
			
			
			// there should be a session variable set with the access token
			// that allows us to use the functions in the api
			$accessToken = $_SESSION["accessToken"];
			
			
			// set the access token
			$api->setAccessToken($accessToken);

			// It's now possible to request data about the currently authenticated user
			// get current user. api->me returns json text that has variable information 
			// that we can use
			//$userId = $api->me();
			
			// print user login
			echo "Spotify Username: ". $spotifyUsername . "<br> <hr>";
			// get playlists for that user
			//$playlists = $api->getUserPlaylists($userId->id);
			$playlists = $api->getUserPlaylists($spotifyUsername);
			
			// set array to store each playlist
			$playlistArray = array();
			$iter = 0;
			// for each loop to go thru results and store each playlist in an array
			foreach ($playlists->items as $currPlaylist) {
				array_push($playlistArray, $currPlaylist->id);
				
				//$playlistArray[$iter] = str_replace("spotify:playlist:", "", $playlistArray[$iter]);
				$iter++;
			}
			
			// create variable to iterate thru array
			$iter = 0;
			$numberOfPlaylists = sizeof($playlistArray);
			while($iter <4 && $iter < $numberOfPlaylists){
			// put the playlist uri in an embed link 
				// break php code so that you can print html code 
				?>
				<iframe src="https://open.spotify.com/embed/playlist/
				<?php echo $playlistArray[$iter];?>" width="300" height="200" frameborder="0" 
				allowtransparency="true" allow="encrypted-media"></iframe> <?php 
				
				$iter++; // iterate
				}
				
		}
		else{
			echo "<br> No playlists to show :( <br>";
		}
	?>
	</div>
	<br>
</div>