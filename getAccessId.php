<?php

// if the session is already started ignore
if(!isset($_SESSION))
    {
	session_start();
    }
include "db_connect.php";
// connect to the apotify php library from github
require 'vendor/autoload.php';

//initialize variable from the spotify api class with our client credentials
$session = new SpotifyWebAPI\Session(
    'afb26d61a1f34dfd958e31def5798792',
    '74a1595ea6974b68bc9a10e2897750d0'
);

// gett acess token
$session->requestCredentialsToken();
$accessToken = $session->getAccessToken();

// just for testing purposes print it
echo $accessToken;

// store to database
$api = new SpotifyWebAPI\SpotifyWebAPI();
$api->setAccessToken($accessToken);
$sql = "INSERT INTO SpotifyKey (AccessToken) VALUES ('$accessToken')";
		$result = $mysqli->query($sql);
?>