<?php
require 'vendor/autoload.php';
class hashtagErrTest extends PHPUnit_Framework_TestCase
{
    public function hashtagError(){
        $tag_hash = 'hastagID';
        if($tag_hash != 'hashtagID'){
            return 'wrong ID';
        }

    }
    public function testHashtag(){
        $this->assertSame('Wrong ID', $this->hashtagError());
    }

}
?>
