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
	
	<form action="simpleSpotifyApp.php" method="post">
	Search for a song/artist:<br>
	<input type="text" name="SearchVal"><br>
	<input type="submit" value="Submit">
	
	</form>
	
	<br>

	<div>
	<!-- type your post here -->

	<form action="add_post.php" method = "post" >
	Submit a post:<br>
	<textarea id="msg" name="post_body"></textarea>
	<br>
	<input type="submit" value="Submit">

	</form>



	</div>
</div>
</div>