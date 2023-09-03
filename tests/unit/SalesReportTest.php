<?php
use App\Model\authordash\SalesReportModel;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\DataProvider;

class SalesReportTest extends TestCase
{
    #[DataProvider("idProvider")]
    public function testbook($id):void
    {
        $salesreportobj = new SalesReportModel();
        $salesreportobj->setAuthorid($id);
        $returnValue = $salesreportobj->fetchBooks();
        $this->assertTrue($returnValue,"no book found for sales report");
        $book = $salesreportobj->getBook();
        $this->assertIsArray($book);
    }
    /**
     * 2 should pass 6  fail.
     *
     * @return array
     */
    public static function idProvider():array
    {
        $id=[[1],[2],[3],[4],[5],[6],[7],[8]];
        return $id;
    }
}