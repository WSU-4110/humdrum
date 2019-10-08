	
					<?php 
					require 'vendor/autoload.php';
					include "db_connect.php";
					$session = new SpotifyWebAPI\Session(
					'afb26d61a1f34dfd958e31def5798792',
					'74a1595ea6974b68bc9a10e2897750d0'
					);

					$session->requestCredentialsToken();
					$accessToken = $session->getAccessToken();
					
					
					
					
					echo "<h2>$accessToken </h2>";
					$sql = "INSERT INTO user_posts (Content) VALUES ('$accessToken')";
					$result = $mysqli->query($sql);
					// Store the access token somewhere. In a database for example.

					//header('Location: some-other-file.php');
				
					die();
					?>