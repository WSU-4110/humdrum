<?php
//require_once __DIR__ . '/vendor/autoload.php';
class keyword extends PHPUnit_Framework_TestCase
{
    public function keywordFind(){
        $keywordfromform = 'keyword';
        return $keywordfromform;

    }
    public function testKeyword(){
        $this->assertSame('keyword', $this->testKeyword());
    }

}
?>
<?php
