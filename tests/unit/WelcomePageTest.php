<?php
use App\Model\authordash\WelcomePageModel;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\DataProvider;

class WelcomePageTest extends TestCase
{
    #[DataProvider("idProvider")]
    public function testbook($id):void
    {
        $welcomeobj = new WelcomePageModel();
        $welcomeobj->setAuthorid($id);
        $returnValue = $welcomeobj->fetchBookByCategory();
        $this->assertTrue($returnValue,"we can't display published books");
        $book = $welcomeobj->getBook();
        $this->assertIsArray($book);
    }
    /**
     * 2 should pass 6 must fail.
     *
     * @return array
     */
    public static function idProvider():array
    {
        $id=[[1],[2],[3],[4],[5],[6],[7],[8]];
        return $id;
    }
}