<?php

 use PHPUnit\Framework\TestCase;
class passTest extends TestCase
{
	public function setPass() {
		$dbpass = 'gj04IXapki';
		return $dbpass;
	}
	
	public function testPass()
	{
		$this->assertSame('gj04IXapki', $this->setPass());
	}
	
	
}