<?php
use PHPUnit\Framework\TestCase;
class keywordTest extends TestCase
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
