<?php
use PHPUnit\Framework\TestCase;
class trendingTest extends TestCase
{
    public function convertTag(){
        $taghash = '<a href="hashtag.php?tag=$1">$0</a>';

    }
    public function testConversion(){
        $this->assertEquals('<a href="hashtag.php?tag=$1">$0</a>', $this->convertTag());
    }

}
?>
