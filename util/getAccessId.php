<?php

if(!isset($_SESSION))
    {
	session_start();
    }
include "db_connect.php";

require 'C:/wamp64/www/humdrum/vendor/autoload.php';

$session = new SpotifyWebAPI\Session(
    'afb26d61a1f34dfd958e31def5798792',
    '74a1595ea6974b68bc9a10e2897750d0'
);

$session->requestCredentialsToken();
$accessToken = $session->getAccessToken();

// trying out having the access tokens stored in session variables
$_SESSION["accessToken"] = $accessToken;

// OUTDATED. DOES NOT NEED TO PUT IN DATABASE ANYMORE BUT IT DOESN'T HURT
// put the access token in the database	
$sql = "INSERT INTO SpotifyKey (AccessToken) VALUES ('$accessToken')";
	$result = $mysqli->query($sql);
echo $accessToken;
$api = new SpotifyWebAPI\SpotifyWebAPI();
$api->setAccessToken($accessToken);
//$testResult = $api->getUserPlaylists("scooterhoward96");
//var_dump($testResult);

header("Location: ../home.php");//sends user to homepage in the event of a valid login
	exit;
?>