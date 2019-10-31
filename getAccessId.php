<?php

if(!isset($_SESSION))
    {
	session_start();
    }
include "db_connect.php";

require 'vendor/autoload.php';

$session = new SpotifyWebAPI\Session(
    'afb26d61a1f34dfd958e31def5798792',
    '74a1595ea6974b68bc9a10e2897750d0'
);

$session->requestCredentialsToken();
$accessToken = $session->getAccessToken();


echo $accessToken;
$api = new SpotifyWebAPI\SpotifyWebAPI();
$api->setAccessToken($accessToken);
$sql = "INSERT INTO SpotifyKey (AccessToken) VALUES ('$accessToken')";
		$result = $mysqli->query($sql);
?>