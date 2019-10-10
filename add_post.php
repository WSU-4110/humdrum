<?php 
					include "db_connect.php";
					
					$new_post = $_REQUEST["post_body"];
					
					if($new_post)
					{
					echo "<h2>$new_post </h2>";
					$sql = "INSERT INTO user_posts (Content, User, Spotify) VALUES ('$new_post', 'Maclo4', '$artist[0]')";
					$result = $mysqli->query($sql);
					}
					
					?>
<?php
   header("Location: index.php");
   exit;
?>