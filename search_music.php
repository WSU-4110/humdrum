<div class="page">

	<div>
	<?php
	include "db_connect.php";

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

	// search for keyword
	$sql = "SELECT artist, song, url FROM music WHERE artist LIKE '%" . $keywordfromform . "%'";
	$result = $mysqli->query($sql);

	if ($result->num_rows > 0) {
	// output data of each row
	while($row = $result->fetch_assoc()) {
	echo "<br>" . "<b>Artist: </b>" . $row["artist"]. "<br>" . "<b>Song: </b>" . $row["song"]. "<br>" . "<b>Youtube Link: </b> <br>" . $row["url"] . "<br>";

	$_SESSION["spotify"] = $row["url"];

	}
	} else {
	echo "no results";
	}
	}
	$mysqli->close();
	?>
	<br>

	</div>
	<div>
	<!-- type your post here -->

		<form action="add_post.php" method = "post" >
	Submit a post:<br>
	<textarea id="msg" name="post_body"></textarea>
	<br>
	<input type="submit" value="Submit">

	</form>


	<script async src="https://cse.google.com/cse.js?cx=004780170324679756711:jppohlwwgaz"></script>
	<div class="gcse-search" ></div>


	</div>

</div>