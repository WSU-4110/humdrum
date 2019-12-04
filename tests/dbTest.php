<?php

 use PHPUnit\Framework\TestCase;
class dbTest extends TestCase
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