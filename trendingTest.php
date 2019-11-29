<?php
require_once __DIR__ . '/vendor/autoload.php';
class hashtagConvertest extends PHPUnit_Framework_TestCase
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
