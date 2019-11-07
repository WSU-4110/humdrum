<?php

class SpotifyConnect{
    
include "db_connect.php";
require 'vendor/autoload.php';
    
private static $instance = null;
private $accessToken = null;

private $session = new SpotifyWebAPI\Session(
    'afb26d61a1f34dfd958e31def5798792',
    '74a1595ea6974b68bc9a10e2897750d0');
    
    function __construct( $name, $age ) {
		$session->requestCredentialsToken();
        $accessToken = $session->getAccessToken();
        
        $api = new SpotifyWebAPI\SpotifyWebAPI();
        $api->setAccessToken($accessToken);
        $sql = "INSERT INTO SpotifyKey (AccessToken) VALUES ('$accessToken')";
		$result = $mysqli->query($sql);
}}
	
    static function SpotifyConnect getConnection(){
        if ($instance== null )
            instance = new SpotifyConnect() ;
        return instance;  
    
    


?>