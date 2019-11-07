<?php
class DbConnection {
    function __construct( $name, $age ) {
		$mysqli = new mysqli($host, $username, $user_pass, $database_in_use);}
	
    static function DbConnection getDbConnection() {
        if ($instance== null )
            instance = new DbConnection() ;
        return instance;    }
    
private static $instance = null;
private $host = "localhost";
private $username = "root";
private $user_pass = "usbw";
private $database_in_use = "test";
private $mysqli;
}
?>