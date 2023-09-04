<?php
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\DataProvider;
use App\Model\Home\HomeModel;

class SearchByIdTest extends TestCase
{
    #[DataProvider("idProvider")]
    public function testSearchById($id):void
    {
        $searchbyidobj = new HomeModel();
        $searchbyidobj->setBookId($id);
        $returnValue = $searchbyidobj->fetchBook();
        $this->assertTrue($returnValue,"book not found");

    }
    /**
     * 7 should pass one should fail.
     *
     * @return array
     */
    public static function idProvider():array
    {
        $id = [[13],[14],[15],[17],[18],[24],[25],[26]];
        return $id;
    }

}