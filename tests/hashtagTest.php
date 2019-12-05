<?php
require 'vendor/autoload.php';
use PHPUnit\Framework\TestCase;
class hashtagErrTest extends TestCase
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
