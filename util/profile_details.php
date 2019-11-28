<link href="humdrum.css" rel="stylesheet" type="text/css" media="screen" />
<div class= "page">

	<?php
	include "db_connect.php"; 
    if(!isset($_SESSION))
    {
	session_start();
    }
	require("../vendor/autoload.php");
	// search for keyword
	
	$sql = "SELECT * FROM user_posts";
	$result = $mysqli->query($sql);
	


// Functions

    class ProfileDetails
    {
        // Function 1
        static function uploadProfilePic($pic_user)
        {
            if ($pic_user == $_SESSION["user_id"]) { ?>
                <div class="padd">
                    <form action="util/upload_img.php" method="post" enctype="multipart/form-data">
                        Select Image File to Upload:
                        <input type="file" name="file">
                        <input type="submit" name="submit" value="Upload">
                        <input type='hidden' name='profile_user' value='<?php echo "$pic_user"; ?>'>
                    </form>
                </div>

                <br>
                <?php
            }
        }

        // Function 2
        static function postNum($result, $profile_user)
        {
            $post_num = 0;
            if ($result->num_rows > 0) {

                // Add post to counter

                while ($row = $result->fetch_assoc()) {
                    if (isset($row["User"])) {
                        if ($row["User"] == $profile_user) {
                            $post_num++;
                        }
                    }
                }

            }
            return $post_num;
        }

        // Function 3
        static function showBio($profile_user, $bio)
        {
            if ($profile_user != $_SESSION["user_id"]) { ?>
                <div class="box_drawn">
                    <h3>Bio:</h3><br>
                    <?= $bio ?>
                </div>
                <?php
            } else { ?>
                <div class="padd">
                    <form action="update_bio.php" method="post">
                        Bio:<br><textarea name="bio" maxlength="256" width="512" rows="6"><?= $bio ?></textarea><br><br>
                        <input type="submit">
                    </form>
                </div>
            <?php }
        }

        // Function 4
        static function showFollowers($mysqli, $profile_user)
        {
            include "db_connect.php";
            $sql = "SELECT followers FROM user_follow";
            $result = $mysqli->query($sql);
            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    $followers = $row["followers"];
                    if ($followers != $profile_user) {
                        ?>
                        <a href="profile.php?user=<?= $followers ?>">
                            <div class="pic_padd">
                                <?php
                                $pic = "../profile_pics/" . $followers . ".jpeg";
                                ?>
                                <img src=<?= $pic ?> alt=" " width="48" height="48">
                                <b><?= $followers ?></b>
                            </div>
                            <br>
                        </a>
                        <?php
                    }
                }
            } else {
                echo "This user has no followers";
            }
            $mysqli->close();
        }

        // Function 5
        static function showFollowing($mysqli, $profile_user)
        {
            include "db_connect.php";
            $sql = "SELECT following FROM user_follow";
            $result = $mysqli->query($sql);
            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    $following = $row["following"];
                    if ($following != $profile_user) {
                        ?>
                        <a href="profile.php?user=<?= $following ?>">
                            <div class="pic_padd">
                                <?php
                                $pic = "../profile_pics/" . $following . ".jpeg";
                                ?>
                                <img src=<?= $pic ?> alt=" " width="48" height="48">
                                <b><?= $following ?></b>
                            </div>
                            <br>
                        </a>
                        <?php
                    }
                }
            } else {
                echo "This user is not following anyone";
            }
            $mysqli->close();
        }

        // Function 6
        static function showPlaylists($mysqli, $profile_user)
        {
            include "db_connect.php";
            $api = new SpotifyWebAPI\SpotifyWebAPI();

            // Fetch the saved access token from somewhere. A database for example.
            $sql = "SELECT SpotifyId FROM `user_pass` WHERE username = '$profile_user'";
            $result = $mysqli->query($sql);

            //while($row = $result->fetch_assoc()){
            $row = $result->fetch_assoc();

            // get the username from the sql query.
            //this will be used in the getUserPlaylists function
            if ($row["SpotifyId"] != null) {
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
                echo "Spotify Username: <b>" . $spotifyUsername . "</b><br> <hr>";
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
                while ($iter < 4 && $iter < $numberOfPlaylists) {
                    // put the playlist uri in an embed link
                    // break php code so that you can print html code
                    ?>
                    <iframe src="https://open.spotify.com/embed/playlist/
				<?php echo $playlistArray[$iter]; ?>" width="300" height="200" frameborder="0"
                            allowtransparency="true" allow="encrypted-media"></iframe> <?php

                    $iter++; // iterate
                }

            } else {
                echo "<br> No playlists to show :( <br>";
            }
        }
    }
    ?>
	
	
	<div class= "box_drawn">
	
	
		<!-- Profile Picture -->
		<div class= "float_left">
			<?php
			$pic = "profile_pics/". $profile_user . '.jpeg';
			?>

			<div class= "pic_shadow"><img src=<?=$pic?> alt="Profile Picture." width="96" height="96"></div>
		</div>
		
		
		<div class= "padd">
			<!-- Current User's Name -->
			<h3><?=$profile_user?></h3>
			
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
	</div>
	<br>
	
	
	<!-- FUNCTION 1 - Upload Profile Picture -->
    <?=ProfileDetails::uploadProfilePic($profile_user)?>

	<div class= "box_drawn">

        <!-- FUNCTION 2 - Calculating/Displaying post number -->
        <?php
        // Function 2
        include "db_connect.php";
        $sql = "SELECT * FROM user_pass";
        $result = $mysqli->query($sql);

        while($row = $result->fetch_assoc()) {
            if($row["username"] == $profile_user) {
                $join_date = $row["join_date"];
                $bio = $row["bio"];
                $music_links = $row["music_links"];
            }
        }

        if (!isset($join_date))
            $join_date = "NULL";
        if (!isset($bio))
            $bio = "This user hasn't shared their biography yet...";
        if (!isset($music_links))
            $music_links = "This user hasn't shared their music yet...";
        ?>

        <h3>Stats:</h3><br>
			Join date: <?=$join_date?><br>
			Posts: <?=ProfileDetails::postNum($result, $profile_user)?><br>
			
	</div>
	
	<br>
	
	<!-- FUNCTION 3 - Display Bio -->
	<?php
    ProfileDetails::showBio($profile_user, $bio);
	?>
	
	
	<br>
	
	<!-- Reccomendations -->
	<div class= "box_drawn">
	
	<h3>Music Reccomendations:</h3><br>
		<?=$music_links?>
		
	</div>
	
	
	<div>
		<div class= "box_drawn">
		<!-- FUNCTION 4 - Display Followers -->
		<h3>Followers:</h3><br>
		<?php
        ProfileDetails::showFollowers($mysqli, $profile_user);
		?>
			
		</div>
		
		<div class= "box_drawn">
		<!-- FUNCTION 5 - Display Following -->
		<h3>Following:</h3><br>
		<?php
        ProfileDetails::showFollowing($mysqli, $profile_user);
		?>
		</div>
	</div>
	


	<br>
	<div class = "box_drawn">
	<h3>User Playlists:</h3>
	<!-- GET SPOTIFY ACCESS TOKEN FOR USER, AND PRINT USER INFO -->
	<?php
    ProfileDetails::showPlaylists($mysqli, $profile_user);
	?>
	</div>
	<br><br><br>
</div>