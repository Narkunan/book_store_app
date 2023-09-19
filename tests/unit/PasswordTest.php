<?php
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\DataProvider;
use App\Model\accounts\LoginModel;

class PasswordTest extends TestCase
{
    #[DataProvider("idProvider")]
    public function testPassword($email,$password,$user)
    {
         $loginobj = new LoginModel();
         $loginobj->setEmail($email);
         $loginobj->setPassword($password);
         $returnValue = $loginobj->LoginAuthor();
         $this->assertStringContainsStringIgnoringCase($returnValue,$user);
         

    }
    public static function idProvider():array
    {
          return [["narkunand@gm.com","narkunan","dual"],["narkunanauthor@gm.com","narkunan","author"]
          ,["narkunanuser@gm.com","narkunan","user"],["narkunan9585@gm.com","narkunan","no"],
          ["nark@gm.com","narkunan","user"],["naekuj@gm.com","narkunan","no"]];
    }
}