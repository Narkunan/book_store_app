<?php
use App\Model\author\LoginModel;
use PHPUNIT\Framework\TestCase;

class LoginTest extends TestCase
{
    public function atest()
    {
       $loginmodel=new LoginModel();
       $loginmodel->setEmail("nak@gm.com");
       $loginmodel->setPassword("narkukunan");
       $name=$loginmodel->getName();
       $this->assertSame($name,"nark");
    }
}