<?php

 
class passTest extends \PHPUnit_Framework_TestCase
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