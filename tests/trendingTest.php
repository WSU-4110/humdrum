<?php
use PHPUnit\Framework\TestCase;
class trendingTest extends TestCase
{
    public function convertTag(){
        $taghash = preg_replace($expression, '<a href="hashtag.php?tag=$1">$0</a>', $taghash);
        return $taghash;

    }
    public function testConversion(){
        $this->assertSame(preg_replace($expression, '<a href="hashtag.php?tag=$1">$0</a>', $taghash), $this->convertTag());
    }

}
?>
