<?php
use App\Model\authordash\ListBookModel;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\DataProvider;

class listBookTest extends TestCase
{
    #[DataProvider("idProvider")]
    public function testbook($id):void
    {
        $listBookobj = new ListBookModel();
        $listBookobj->setAuthorid($id);
        $present = $listBookobj->fetchBooksByAuthorId();
        $this->assertTrue($present,"not published yet");
        $book = $listBookobj->getBook();
        $this->assertIsArray($book);
    }
    /**
     * 2 should pass others must fail.
     *
     * @return array
     */
    public static function idProvider():array
    {
        $id=[[1],[2],[3],[4],[5],[6]];
        return $id;
    }
}