<?php
use PHPUnit\Framework\TestCase;
class ratingTest extends TestCase
{
    public function rating(){
        $userrating = "rating";
        if($userrating != "rating"){
          return 'error';
        }

    }
    public function testRating(){
        $this->assertSame('error', $this->rating());
    }

}
?>
