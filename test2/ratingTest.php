<?php
require_once __DIR__ . '/vendor/autoload.php';
class ratingTest extends PHPUnit_Framework_TestCase
{
    public function rating(){
        $rating = 'rating';
        return $rating;

    }
    public function testRating(){
        $this->assertSame('rating', $this->testRating());
    }

}
?>
