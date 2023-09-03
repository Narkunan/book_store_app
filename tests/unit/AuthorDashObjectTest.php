<?php
use App\Model\authordash\PublishPlatformModel;
use App\Model\authordash\BecomeUserModel;
use App\Model\authordash\WelcomePageModel;
use App\Model\authordash\ListBookModel;
use App\Model\authordash\SalesReportModel;
use App\Model\authordash\UpdateBookModel;
use PHPUnit\Framework\TestCase;
class AuthorDashObjectTest extends TestCase
{
    public function testPublishPlatformModelobject():void
    {
         $this->assertInstanceOf(PublishPlatformModel::class,new PublishPlatformModel);
    }
    public function testBecomeUserModel():void
    {
        $this->assertInstanceOf(BecomeUserModel::class,new BecomeUserModel);
    }
    public function testUpdateBookModel():void
    {
        $this->assertInstanceOf(UpdateBookModel::class , new UpdateBookModel);
    }
    public function testSalesReportModel():void
    {
        $this->assertInstanceOf(SalesReportModel::class,new SalesReportModel);
    }
    public function testListBookModel():void
    {
        $this->assertInstanceOf(ListBookModel::class,new ListBookModel);
    }
    public function testWelcomePageModel():void
    {
        $this->assertInstanceOf(WelcomePageModel::class,new WelcomePageModel);
    }
}
