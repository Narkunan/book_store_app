<?php
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\DataProvider;
use App\Model\authordash\PublishPlatformModel;


class categoryTest extends TestCase
{
    #[DataProvider('categoryProvider')]
    public function testcategory($actual,$expected):void
    {
        $categoryobj = new PublishPlatformModel();
        $categoryobj->setCategory($actual);
        $category = $categoryobj->getCategory();
        $this->assertIsString($category);
        $this->assertEquals($actual,$expected);
    }
    /**
     *  1 should pass 4 should fail
     *
     * @return array
     */
    public static function categoryProvider():array
    {
           $category = [["computer","computer"],["mech","mecha"],["marine","mari"],["electr","elect"],
           ["civi","civil"]];
           return $category; 
    } 
}