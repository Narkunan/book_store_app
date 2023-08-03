<?php

namespace App\Controller\author;

require_once "../../../vendor/autoload.php";

use App\Model\author\LoginModel;

class LoginAuthor
{
    private $loginModel;

    public function __construct($loginModel)
    {
        $this->loginModel=$loginModel;
    }
    public function LoginAuthorController()
    {
       $this->loginModel->setemail($_POST["email"]??"not passed");
       $this->loginModel->setPassword($_POST["password"]??"not passed");
       if($this->loginModel->LoginAuthor())
       {
        
        if($_POST["remeber"]??"not on"=="on")
        {
            if(empty($_COOKIE["authorname"]))
            {
                setcookie("authorname",$this->loginModel->getName(),time()+(8600*10),"/");
                setcookie("authorid",$this->loginModel->getId(),time()+(8600*10),"/");
                header("Location: ../../View/author/LoginView.php"); 
            }
            else
            {
                echo "cookies are already set";
                header("Location: ../../View/author/LoginView.php");
            }
        }
        else
        {
           header("Location: ../../View/author/LoginView.php");
           echo "no need for setting cookie";
        }
       }
       else
       {
        header("Location: ../../../public/assets/html/register.html");
       }
    }
}

$loginmodel= new LoginModel();
$loginController= new LoginAuthor($loginmodel);
$loginController->LoginAuthorController();
