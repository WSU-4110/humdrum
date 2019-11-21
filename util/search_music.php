<div class="page">
<div class="post">
	<?php
	include "db_connect.php";
	//include "util\simpleSpotifyApp.php";

    if(!isset($_SESSION))
    {
        session_start();
    }
	?>
	<h2> Create a Post </h2>

	<form action="util/simpleSpotifyApp" method="post">
	Search for a song/artist:<br>
	<input type="text" name="SearchVal"><br>
	<select>
	<?php
	if(isset($_SESSION["SpotifyResult"])){
	foreach($_SESSION['SpotifyResult'] as $key=>$value)
    {
		?>
		<option>
		<?php
			// and print out the values
			echo $value;
			?>
		</option>

		<?php
    }}

	?>
	</select>
	<input type="submit" value="Submit">

	</form>

	<br>

	<div>
	<!-- type your post here -->

	<form action="util/add_post.php" method = "post" >
	Submit a post:<br>
	<textarea id="msg" name="post_body"></textarea>
	<br>
	Add a hashtag:<br>
	<textarea id="msg" name="tag_hash"></textarea>
	<br>
	<input type="submit" value="Submit">
	</form>



	</div>
</div>
</div>
