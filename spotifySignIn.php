<?php
require 'vendor/autoload.php';
include 'util\db_connect.php';
$session = new SpotifyWebAPI\Session(
    'afb26d61a1f34dfd958e31def5798792',
    '74a1595ea6974b68bc9a10e2897750d0',
    'http://localhost:8282/humdrum/spotifySignIn.php'
);

$api = new SpotifyWebAPI\SpotifyWebAPI();

if (isset($_GET['code'])) {
    $session->requestAccessToken($_GET['code']);
    $api->setAccessToken($session->getAccessToken());
	
	// put the access token in the database
	$accessToken = $session->getAccessToken();
	echo "<br> token: " . $accessToken . "<br>";
	
	$sql = "INSERT INTO SpotifyKey (AccessToken) VALUES ('$accessToken')";
		$result = $mysqli->query($sql);

    
	// dump user data
	print_r($api->me());
} else {
    $options = [
        'scope' => [
            'user-read-email',
        ],
    ];

    header('Location: ' . $session->getAuthorizeUrl($options));
    die();
}

?>