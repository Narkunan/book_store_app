<?php
use App\Model\authordash\PublishPlatformModel;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
class nameTest extends TestCase
{
    #[DataProvider("nameProviders")]
    public function testname($actual,$excepted):void
    {
              $testname = new PublishPlatformModel();
              $testname->setAuthorname($actual);
              $name = $testname->getAuthorname();
              $this->assertIsString($name);
              $this->assertEquals($name,$excepted);

    } 
    /**
     * 2 pass others should fail
     *
     * @return array
     */
    public static  function nameProviders():array 
    {
        $name = [["narkunan","narkunan"],["tharun","thArun"],["samson","sams"],["john","john"]];
        return $name;
    }
}
