<?php
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\DataProvider;
use App\Model\authordash\PublishPlatformModel;


class PriceTest extends TestCase
{
    #[DataProvider('priceProvider')]
    public function testPrice($actual,$expected):void
    {
        $priceobj = new PublishPlatformModel();
        $priceobj->setPrice($actual);
        $price = $priceobj->getPrice();
        $this->assertIsInt($price);
        $this->assertSame($price,$expected);
    }
    /**
     * 3 should pass 2 should fail
     *
     * @return array
     */
    public static function priceProvider():array
    {
           $price = [[123,123],[321,321],[456,446],[446,447],[999,999]];
           return $price; 
    } 
}