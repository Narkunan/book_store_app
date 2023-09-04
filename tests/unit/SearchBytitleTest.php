<?php
use App\Model\Home\SearchByTitleModel;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\DataProvider;

class SearchBytitleTest extends TestCase
{
    #[DataProvider("titleProvider")]
    public function testSearchByTitle(string $title):void
    {
        $searchBytitle = new SearchByTitleModel();
        $searchBytitle->setTitle($title);
        $retunValue = $searchBytitle->fetchBook();
        $this->assertTrue($retunValue,"book not found");
    }
    /**
     * two books only found 
     * 
     * others not found.
     *
     * @return array
     */
    public static function titleProvider():array
    {
          $title = [["Operating Systems"],["Microcontrollers"],["micro"],["programming"]];
          return $title;
    }
}