<?php
use PHPUnit\Framework\TestCase;
class ratingTest extends TestCase
{
    public function rating(){
        $userrating = $_REQUEST["rating"];
        return $userrating;

    }
    public function testRating(){
        $this->assertSame($_REQUEST["rating"], $this->rating());
    }

}
?>
