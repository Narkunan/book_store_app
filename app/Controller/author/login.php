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
    private $result;
    
    
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
        $this->result=$this->loginModel->LoginAuthor();
        if(!str_contains($this->result,"No"))
        {
            $this->manageCookie();
        }
        switch ($this->result) 
        {
            case "Dual" :
                
                header("Location: ../../../public/assets/html/author/chooseRole.html");
                break;

            case "user" :
                
                header("Location: ../../View/user/LoginView.php");
                break;

            case "author" :
                
                header("Location: ../../View/author/LoginView.php");
                break;

            default :
                
                header("Location: ../../../public/assets/html/author/register.php?msg=Account Does not exist");
                break;
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
            if(str_contains($this->result,"user"))
            {
                $_SESSION['loggedUser']="user";
            }
            else if(str_contains($this->result,"author"))
            {
                $_SESSION['loggedUser']="author";
            }
            else
            {
                $_SESSION['loggedUser']="Dual";
            }
            $_SESSION['UserName']=$this->loginModel->getName();
            $_SESSION["Userid"]=$this->loginModel->getId();
            echo "cookies are already set";
              
    }
}

$loginmodel= new LoginModel();
$loginController= new LoginAuthor($loginmodel);
$loginController->inputData();
$loginController->LoginAuthorController();
