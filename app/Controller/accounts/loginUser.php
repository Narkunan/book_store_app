<?php
namespace App\Controller\accounts;
session_start();
require_once "../../../vendor/autoload.php";
use App\Model\author\LoginModel;
use App\Controller\accounts\InputInterface;


/**
 * Login  is responsible for loginUser
 */
class LoginUser implements InputInterface
{
    private LoginModel $loginModel;
    private $result;
    
    
    /**
     * initialies loginmodel object
     * 
     * @access public
     *
     * @param loginmodel $loginModel
     */
    public function __construct(LoginModel $loginModel)
    {
        $this->loginModel=$loginModel;
    }


    /**
     * Inputdata function process the data 
     * 
     * getting by POST Method
     * 
     * @access public 
     *
     * @return void
     */
    public function inputData():void
    {
        $this->loginModel->setemail($_POST["email"]??"not passed");
        $this->loginModel->setPassword($_POST["password"]??"not passed");
        
    }

    /**
     * LoginUser controller function is responsible for 
     * 
     * check User credential
     * 
     * and redirect to the appropriate View
     * 
     * if User has two role like Author and User
     * 
     * they will be redirected to the ChooseRole page
     * 
     * if the user is an user they will redirect to the user LoginView
     * 
     * if the user is an author they will redirect to the author LoginView.
     * 
     * @access public
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
                
                header("Location: ../../../public/assets/html/accounts/chooseRole.html");
                break;

            case "user" :
                
                header("Location: ../../View/userdash/LoginView.php");
                break;

            case "author" :
                
                header("Location: ../../View/authordash/LoginView.php");
                break;

            default :
                
                header("Location: ../../../public/assets/html/accounts/register.php?msg=Account Does not exist");
                break;
        }
      
    }

    /**
     * manageCookie function is responsible for manageCookie
     * 
     * if cookie is empty we are setting cookie
     * 
     * else cookie willnot be set.
     * 
     * @return void
     * 
     * @access public
     * 
     */

    public function manageCookie():void
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
$loginController= new LoginUser($loginmodel);
$loginController->inputData();
$loginController->LoginAuthorController();
