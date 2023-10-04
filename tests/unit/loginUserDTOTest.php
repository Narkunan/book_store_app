<?php
require_once "../../vendor/autoload.php";
use PHPUnit\Framework\TestCase;
use App\Model\accounts\loginuserDTO;

class loginUserDTOTest extends TestCase{

    public function testname()
    {
          $values = [
            "email"=>"narkunanp@gmail.com",
            "password"=>"narkunan1@"
          ];
          $dto = loginuserDTO::fromArray($values);
          $emaila = $dto->getEmail();
          $passworda = $dto->getPassword();
          $this->assertEqualsIgnoringCase("narkunanp@gmail.com",$emaila);
          $this->assertEqualsIgnoringCase("narkunan1@",$passworda);
          $dto->setName("narkunan");
          $namea = $dto->getName();
          $this->assertEqualsIgnoringCase("narkunan",$namea);
          $dto->setId(122344);
          $ida = $dto->getId();
          $this->assertEqualsIgnoringCase(122344,$ida);

    }
}