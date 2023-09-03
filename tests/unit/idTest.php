<?php
use App\Model\authordash\PublishPlatformModel;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\DataProvider;
class idTest extends TestCase
{
    #[DataProvider("idProvider")]
    public function testid($actual,$excepted):void
    {
        $idtest=new PublishPlatformModel();
        $idtest->setAuthorid($actual);
        $id = $idtest->getAuthorid();
        $this->assertIsInt($id);
        $this->assertEquals($id,$excepted);
    }
    /**
     * 2 should pass 3 should fail
     *
     * @return array 
     */
    public static function idProvider():array
    {
        $id = [[1,2],[2,3],[2,2],[3,3],[4,5]];
        return $id;
    }
}