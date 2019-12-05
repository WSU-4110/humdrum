<?php
//require_once __DIR__ . '/vendor/autoload.php';
use PHPUnit\Framework\TestCase;
class keyword extends TestCase
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
