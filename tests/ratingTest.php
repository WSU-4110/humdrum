<?php

class ratingTest extends TestCase
{
    public function rating(){
        $rating = 'rating';
        return $rating;

    }
    public function testRating(){
        $this->assertSame('rating', $this->rating());
    }

}
?>
