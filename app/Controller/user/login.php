<?php
namespace App\Controller\user;
session_start();
require_once "../../../vendor/autoload.php";

use App\Model\user\LoginModel;
use App\Controller\user\InputInterface;


/**
 * Login author is responsible for loginAuthor
 */
class Login implements InputInterface
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
    public function loginUserController():void
    {
        $result=$this->loginModel->loginUser();
       
       if($result)
       {

             $this->manageCookie();
             echo "account exists cookies are also managed";
       }
       else
       {
         
         header("Location: ../../../public/assets/html/user/register.php?msg='Accoutn Does Not Exist'");
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
            $_SESSION['username']=$this->loginModel->getName();
            $_SESSION["userid"]=$this->loginModel->getId();
            $_SESSION['userlogin']=1;
            echo "cookies are already set";
            header("Location: ../../../public/assets/html/first.php");  
        }
        else
        {
            $_SESSION['username']=$this->loginModel->getName();
            $_SESSION["userid"]=$this->loginModel->getId();
            $_SESSION['userlogin']=1;
            header("Location: ../../../public/assets/html/first.php"); 
            
        }
    }
}

$loginmodel= new LoginModel();
$loginController= new Login($loginmodel);
$loginController->inputData();
$loginController->loginUserController();
