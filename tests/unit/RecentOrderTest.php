<?php
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\DataProvider;
use App\Model\UserDash\RecentOrderModel;

class RecentOrderTest extends TestCase
{
    #[DataProvider("idProvider")]
    public function testRecentOrder($id):void
    {
        $recentorder = new RecentOrderModel();
        $recentorder->setUserId($id);
        $returnValue = $recentorder->fetchRecentOrder();
        $this->assertTrue($returnValue,"no order was placed");

    }
    /**
     * 4 should fail 2 should pass
     *
     * @return array
     */
    public static function idProvider():array
    {
        $id =[[1],[2],[3],[9],[7],[8]];
        return $id;
    }
}