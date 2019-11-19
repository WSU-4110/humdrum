<link href="humdrum.css" rel="stylesheet" type="text/css" media="screen" />
<?php require 'vendor/autoload.php';
	  include "db_connect.php";?>
<div class= "page">

	<div class= "padd">

		<!-- Profile Picture -->
		<div class= "padd">
		<img src="images/ProfileTest.jpg" alt="Profile Picture." width="128" height="128">
		</div>
		
		<!-- Current User's Name -->
		<div class= "box_drawn">
		<?php
		include "db_connect.php";
		$sql = "SELECT username FROM user_pass";
		$result = $mysqli->query($sql);
		if ($result->num_rows > 0) {
		// output data of each row
			$row = $result->fetch_assoc();
		// I just commented it out cause it could just be replaced with session[user_id]
			//echo "<h2>" . $row["username"]. "</h2><br>";
		} else {
			echo "error: no username in user_pass table";
		}
		$mysqli->close();
		
		//print the current user
		echo "<h2>". $_SESSION["user_id"] . "</h2> ";
		?>
		
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
	
	<!-- Information -->
	<div class= "box_drawn">
	
	<h2>Stats:</h2><br>
		Join date: 8/30/2025<br>
		Posts: 12<br>
		
	</div>	
	
	<!-- Bio -->
	<div class= "box_drawn">
	
	<h2>Bio:</h2><br>
		Just a Wayne State computer scientist.
		
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