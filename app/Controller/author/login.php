<?php

namespace App\Controller\author;
session_start();
require_once "../../../vendor/autoload.php";

use App\Model\author\LoginModel;
use App\Controller\author\InputInterface;


/**
 * Login author is responsible for loginAuthor
 */
class LoginAuthor implements InputInterface
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
     * inputdata process input data given by input data
     *
     * @return void
     */
    public function inputData():void
    {
        $this->loginModel->setemail($_POST["email"]??"not passed");
        $this->loginModel->setPassword($_POST["password"]??"not passed");
        
    }

    /**
     * Loginauthor controller is responsible for check author credential
     * 
     * and redirect to the appropriate View
     *
     * @return void
     */
    public function LoginAuthorController():void
    {
        $result=$this->loginModel->LoginAuthor();
       
       if($result)
       {

             $this->manageCookie();
             echo "account exists cookies are also managed";
       }
       else
       {
         
         header("Location: ../../../public/assets/html/author/register.php?msg='Accoutn Does Not Exist'");
         echo "account does not exists";
       }
    }

    /**
     * manageCookie function is responsible for manageCookie
     * 
     * if cookie is empty we are setting cookie
     * 
     * else cookie willnot be set
     * 
     */

    public function manageCookie()
    {
        if(isset($_COOKIE["PHPSESSID"]))
        {
            $_SESSION['authorname']=$this->loginModel->getName();
            $_SESSION["authorid"]=$this->loginModel->getId();
            echo "cookies are already set";
            header("Location: ../../View/author/LoginView.php");  
        }
        else
        {
            $_SESSION['authorname']=$this->loginModel->getName();
            $_SESSION["authorid"]=$this->loginModel->getId();
            //setcookie("authorname",$this->loginModel->getName(),time()+(8600*10),"/");
            //setcookie("authorid",$this->loginModel->getId(),time()+(8600*10),"/");
            header("Location: ../../View/author/LoginView.php"); 
            
        }
    }
}

$loginmodel= new LoginModel();
$loginController= new LoginAuthor($loginmodel);
$loginController->inputData();
$loginController->LoginAuthorController();
