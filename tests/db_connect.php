<?php

/*
$host = "localhost";
$username = "root";
$user_pass = "usbw";
$database_in_use = "test";

$mysqli = new mysqli($host, $username, $user_pass, $database_in_use);
*/

$database_in_use = "KoZHfNDBQT";
$dbhost = 'remotemysql.com:3306';
$dbuser = 'KoZHfNDBQT';
$dbpass = 'gj04IXapki';
//$mysqli = mysqli_connect($dbhost, $dbuser, $dbpass);
$mysqli = new mysqli($dbhost, $dbuser, $dbpass, $database_in_use);

if(! $mysqli ) {
die('Could not connect: ' . mysqli_error());
}




//mysqli_close($mysqli);

?>