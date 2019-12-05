<?php
require_once __DIR__ . '/vendor/autoload.php';
use PHPUnit\Framework\TestCase;
class hashtagConvertest extends TestCase
{
    public function convertTag(){
        $expression = "/#+([a-zA-Z0-9_])+/";
        return $expression;

    }
    public function testConversion(){
        $this->assertSame("/#+([a-zA-Z0-9_])+/", $this->convertTag());
    }

}
?>
