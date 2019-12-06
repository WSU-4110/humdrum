<?php
use PHPUnit\Framework\TestCase;
class hashtagTest extends TestCase
{
    public function hashtagError(){
        $expression = "/#+([a-zA-Z0-9_])+/";
        return $expression;

    }
    public function testHashtag(){
        $this->assertSame("/#+([a-zA-Z0-9_])+/", $this->hashtagError());
    }

}
?>
