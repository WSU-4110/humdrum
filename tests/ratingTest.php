<?php
use PHPUnit\Framework\TestCase;
class ratingTest extends TestCase
{
    public function rating(){
        $userrating = "ratin";
        if($userrating != "rating"){
          return 'error';
        }

    }
    public function testRating(){
        $this->assertSame('error', $this->rating());
    }

}
?>
