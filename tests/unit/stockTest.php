<?php
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\DataProvider;
use App\Model\authordash\PublishPlatformModel;


class stockTest extends TestCase
{
    #[DataProvider('stockProvider')]
    public function testStock($actual,$expected):void
    {
        $stockobj = new PublishPlatformModel();
        $stockobj->setStock($actual);
        $stock = $stockobj->getStock();
        $this->assertIsInt($stock);
        $this->assertSame($expected,$stock);
    }
    /**
     * 4 should pass 1 should fail
     *
     * @return array
     */
    public static function stockProvider():array
    {
           $stock = [[23,23],[31,31],[46,46],[44,44],[9,8]];
           return $stock; 
    } 
}