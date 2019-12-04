<?php

 
class dbTest extends \PHPUnit_Framework_TestCase
{
	public function setDB() {
		$database_in_use = 'KoZHfNDBQT';
		return $database_in_use;
	}
	
	public function testDB()
	{
		$this->assertSame('KoZHfNDBQT', $this->setDB());
	}
	
	
}