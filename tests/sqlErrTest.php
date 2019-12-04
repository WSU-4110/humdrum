<?php

 use PHPUnit\Framework\TestCase;
class sqlErrTest extends \PHPUnit_Framework_TestCase
{
	public function sendError() {
		$mysqli = 'error';
		if ($mysqli = 'error')
			{
			return 'Failed to connect to MySQL:';
			}
	}
	
	public function testError()
	{
		$this->assertSame('Failed to connect to MySQL:', $this->sendError());
	}
	
	
}