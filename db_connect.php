<?php


	public class db_connect {
		
		private $host;
		private $username;
		private $user_pass;
		private $database_in_use;
		
		public function __construct() {
		$this->host = "localhost";
		$this->username = "root";
		$this->user_pass = "usbw";
		$this->database_in_use = "test";
		}

		public function connect(){
		
		$mysqli = new mysqli($host, $username, $user_pass, $database_in_use);
		return $mysqli;
		}

	}

?>