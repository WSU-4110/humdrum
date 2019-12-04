<?php

 use PHPUnit\Framework\TestCase;
class sqlErrTest extends TestCase
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