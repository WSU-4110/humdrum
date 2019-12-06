<?php
use PHPUnit\Framework\TestCase;
class trendingTest extends TestCase
{
    public function convertTag(){
        $taghash = '<a href="hashtag.php?tag=$1">$0</a>';
        if($taghash != '<a href="hashtag.php?tag=$1">$0</a>'){
          return 'error';
        }

    }
    public function testConversion(){
        $this->assertSame('<a href="hashtag.php?tag=$1">$0</a>', $this->convertTag());
    }

}
?>
