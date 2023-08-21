<?php

namespace App\Controller\user;

require_once "../../../vendor/autoload.php";

use App\Model\user\LoginModel;



/**
 * Login User is responsible for loginuser
 */
class LoginUser
{
    private $loginModel;

     /**
     * initialies loginmodel object
     *
     * @param loginmodel $loginModel
     */
    public function __construct($loginModel)
    {
        $this->loginModel=$loginModel;
    }

    /**
     * Loginuser controller is responsible for check author credential
     * 
     * and redirect to the appropriate View
     *
     * @return void
     */
    public function LoginUserController():void
    {
       $this->loginModel->setemail($_POST["email"]??"not passed");
       $this->loginModel->setPassword($_POST["password"]??"not passed");
       if($this->loginModel->Loginuser())
       {
        echo "redirect to dashboard";
        if($_POST["remeber"]??"not on"=="on")
        {
            if(empty($_COOKIE["username"]))
            {
                setcookie("username",$this->loginModel->getName(),time()+(8600*10),"/");
                setcookie("userid",$this->loginModel->getId(),time()+(8600*10),"/");
                
            }
            else
            {
                echo "cookies are already set";
            }
        }
        else
        {
           echo "no need for setting cookie";
        }
       }
       else
       {
        header("Location: ../../../public/assets/html/user/register.html");
        echo "<h1>acccount not found should be redirect to register.html</h1>";
       }
    }
}

$loginmodel= new LoginModel();
$loginController= new LoginUser($loginmodel);
$loginController->LoginuserController();
