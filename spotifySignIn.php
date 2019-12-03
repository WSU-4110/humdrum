<?php
include 'util/db_connect.php';
require 'vendor/autoload.php';
if(!isset($_SESSION))
    {
	session_start();
    }

// set the spotify api session variable, this will also call the login
// part of the api where it prompts the user to log into their spotify account
$session = new SpotifyWebAPI\Session(
    'afb26d61a1f34dfd958e31def5798792',
    '74a1595ea6974b68bc9a10e2897750d0',
    'https://humdrum-php-humdrum-azure-branch.azurewebsites.net/home.php'
);

// this is the variable that uses the API to call functions
$api = new SpotifyWebAPI\SpotifyWebAPI();

// but first, you have to retrieve the code given to us by the spotify login
// then set the api variable access token in order to actually use the functions
if (isset($_GET['code'])) {
    $session->requestAccessToken($_GET['code']);
    $api->setAccessToken($session->getAccessToken());
	
	// put the access token in the database
	$accessToken = $session->getAccessToken();
	var_dump($accessToken);
	//TESTING THIS, MAKE THE ACCESS TOKEN A SESSION VARIABLE
	$_SESSION["accessToken"] = $accessToken;
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