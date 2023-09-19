<?php
namespace App\Controller\accounts;
use App\Model\accounts\LoginModel;
use App\Controller\accounts\InputInterface;
use App\Model\accounts\AccountsDTO;

/**
 * Login  is responsible for loginUser
 */
class LoginUser implements InputInterface
{
    private LoginModel $loginModel;
    private $result;
    private AccountsDTO $accountsDTO;
    
    
    /**
     * initialies loginmodel object
     * 
     * @access public
     *
     * @param loginmodel $loginModel
     */
    public function __construct(LoginModel $loginModel,AccountsDTO $accountsDTO)
    {
        $this->loginModel = $loginModel;
        $this->accountsDTO = $accountsDTO;
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
    public function inputData(array $value):void
    {
        $this->accountsDTO->setemail($value["email"]??"not passed");
        $this->accountsDTO->setPassword($value["password"]??"not passed");
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
        if($this->loginModel->checkDualUser($this->accountsDTO)) 
        {
           
            $this->manageCookie("dual");
            header("Location: index.php?action=chooserole");
            
        }
        else if($this->loginModel->checkUser($this->accountsDTO))
        {
            
            $this->manageCookie("user");
            header("Location: .index.php?action=userwelcomepage");
        }                
        else if($this->loginModel->checkAuthor($this->accountsDTO))
        {
            
            $this->manageCookie("author");
            header("Location: index.php?action=AuthorWelcome");
        }
        else
        {    
            $_SESSION['msg']="Account does not exist";
            header("Location: index.php?action=register");
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

    public function manageCookie($role):void
    {
            if(str_contains($role,"user"))
            {
                
                $_SESSION['loggedUser']="user";
            }
            else if(str_contains($role,"author"))
            {
                
                $_SESSION['loggedUser']="author";
            }
            else
            {   
                $_SESSION['loggedUser']="Dual";
            }
            $_SESSION['UserName']=$this->accountsDTO->getName();
            $_SESSION["Userid"]=$this->accountsDTO->getId();
            
              
    }
}
