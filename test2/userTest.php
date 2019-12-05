<?php

 use PHPUnit\Framework\TestCase;
class userTest extends TestCase
{
	public function setUser() {
		$dbuser = 'KoZHfNDBQT';
		return $dbuser;
	}
	
	public function testDB()
	{
		$this->assertSame('KoZHfNDBQT', $this->setUser());
	}
	
	
}