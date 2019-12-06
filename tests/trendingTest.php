<?php
use PHPUnit\Framework\TestCase;
class trendingTest extends TestCase
{
    public function convertTag(){
      $hash_tag= "tag_hag";
      if($hash_tag != "tag_hash"){
        return 'error';
      }
    }
    public function testConversion(){
        $this->assertEquals('error', $this->convertTag());
    }

}
?>
