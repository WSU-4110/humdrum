<?php

 use PHPUnit\Framework\TestCase;
class hostTest extends \PHPUnit_Framework_TestCase
{
	public function setHost() {
		$dbhost = 'remotemysql.com:3306';
		return $dbhost;
	}
	
	public function testHost()
	{
		$this->assertSame('remotemysql.com:3306', $this->setHost());
	}
	
	
}