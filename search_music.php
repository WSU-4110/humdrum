<div class="page">
<div class="post">
	<?php
	include "db_connect.php";
	include "util\simpleSpotifyApp.php";
	
	// if session is already started
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
	?>
	
	<!-- form that goes to the spotify search file -->
	<h2> Create a Post </h2>
	
	<form action="util\simpleSpotifyApp.php" method="post">
	Search for a song/artist:<br>
	<input type="text" name="SearchVal"><br>
	<?php //searchSpotify();?>
	<input type="submit" value="Submit">
	
	</form>
	
	<br>

	<div>
	<!-- type your post here -->

	<!-- send post to database -->
	<form action="add_post.php" method = "post" >
	Submit a post:<br>
	<textarea id="msg" name="post_body"></textarea>
	<br>
	<input type="submit" value="Submit">

	</form>



	</div>
</div>
</div>