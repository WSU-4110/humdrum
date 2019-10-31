<div class="page">
<div class="post">
	<?php
	include "db_connect.php";
	//include "simpleSpotifyApp.php";
	
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
	?>
	<h2> Create a Post </h2>
	<form action="" method="post">
	Search for a song/artist:<br>
	<input type="text" name="keyword"><br>
	<input type="submit" value="Submit">
	</form>
	<?php
	if (!empty($_REQUEST['keyword'])) {
	$keywordfromform = $_REQUEST["keyword"];

	echo "<h2> It is running in heeerrrreee</h2>";
	// search for keyword
	$sql = "SELECT artist, song, url FROM music WHERE artist LIKE '%" . $keywordfromform . "%'";
	$result = $mysqli->query($sql);

	if ($result->num_rows > 0) {
	// output data of each row
	while($row = $result->fetch_assoc()) {
	echo "<br>" . "<b>Artist: </b>" . $row["artist"]. "<br>" . "<b>Song: </b>" . $row["song"]. "<br>" . "<b>Youtube Link: </b> <br>" . $row["url"] . "<br>";

	//$_SESSION["spotify"] = $row["url"];

	}
	} else {
	echo "no results";
	}
	}
	$mysqli->close();
	?>
	<br>

	<div>
	<!-- type your post here -->

	<form action="add_post.php" method = "post" >
	Submit a post:<br>
	<textarea id="msg" name="post_body"></textarea>
	<br>
	<input type="submit" value="Submit">

	</form>

<?php echo $_SESSION["Spotify"];
?>
	<form action="simpleSpotifyApp.php" method="post">
	Search for a song/artist:<br>
	<input type="text" name="SearchVal"><br>
	<input type="submit" value="Submit">
	
	</form>

	</div>
</div>
</div>