<?php
use PHPUnit\Framework\TestCase;
use App\Model\authordash\PublishPlatformModel;

    /**
     * 1 should fail 8 should works
     * 
     * subcategory should fail
     *
     */
class authorpropertyTest extends TestCase
{

    public function testid():void
    {
        $this->assertObjectHasProperty("authorid",new PublishPlatformModel);
    }
    public function testname():void
    {
        $this->assertObjectHasProperty("authorname",new PublishPlatformModel);
    }
    public function testPrice():void
    {
        $this->assertObjectHasProperty("price",new PublishPlatformModel);
    }
    public function testStock():void
    {
        $this->assertObjectHasProperty("stock",new PublishPlatformModel);
    }
    public function testCategory():void
    {
        $this->assertObjectHasProperty("category",new PublishPlatformModel);
    }
    public function testSubCategory():void
    {
        $this->assertObjectHasProperty("sub_category",new PublishPlatformModel);
    }
    public function testcoverPage():void
    {
        $this->assertObjectHasProperty("coverpage",new PublishPlatformModel);
    }
    public function testdescription():void
    {
        $this->assertObjectHasProperty("description",new PublishPlatformModel);
    }
    public function testTitle():void
    {
        $this->assertObjectHasProperty("title",new PublishPlatformModel);
    }
}