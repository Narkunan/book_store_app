<?php

namespace App\Controller\author;

require_once "../../../vendor/autoload.php";

use App\Model\author\RegisterModel;
class RegisterAuthor
{
    private $register;
    public function __construct($registerModel)
    {
       $this->register=$registerModel;
    }
    public function registerAuthorController()
    {
          $this->register->setName($_POST["name"]??"not passed");
          $this->register->setEmail($_POST["email"]??"not passed");
          $this->register->setPassword($_POST["password"]??"not passed");
          if($this->register->registerAuthor())
          {
            header("Location: ../../../public/assets/html/login.html");
          }
          else
          {
            echo "redirectted to login.html user exists";
          }
          
    }
}

$registerModel=new RegisterModel();
$register= new RegisterAuthor($registerModel);
$register->registerAuthorController();
