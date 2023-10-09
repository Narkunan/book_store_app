<?php
namespace App\Controller\accounts;
use App\Model\accounts\LoginModel;
use App\Model\accounts\loginuserDTO;
use App\View\ViewDTO;

/**
 * Login  is responsible for loginUser
 */
class LoginUser 
{
    private LoginModel $loginModel;

    protected array $data=[];
    
    /**
     * initialies loginmodel object
     * 
     * @access public
     *
     * @param loginmodel $loginModel
     */
    public function __construct(LoginModel $loginModel)
    {
        $this->loginModel = $loginModel;
    }

   /**
     * inputData function is responsible for 
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
     * @return ViewDTO
     */
    public function inputData(array $value):ViewDTO
    {
        $logindto = loginuserDTO::fromArray($value);

        if($this->loginModel->checkDualUser($logindto)) 
        {
           
            $this->manageSession("dual",$logindto);
            return $this->dualView();
            
        }
        else if($this->loginModel->checkUser($logindto))
        {
            
            $this->manageSession("user",$logindto);
            return $this->userView();
          
        }                
        else if($this->loginModel->checkAuthor($logindto))
        {
           
            $this->manageSession("author",$logindto);

            return $this->authorView();
        }
        else
        {    
            return $this->accountDoesNotExist();
           
        }
                 
    }
    
    /**
     * manageSession function is responsible for manageSession
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

    public function manageSession(string $role,loginuserDTO $dto):void
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
            $_SESSION['UserName']=$dto->getName();
            $_SESSION["Userid"]=$dto->getId();
          
    }
    private function dualView():ViewDTO{
         
       
            return new ViewDTO(
                "app/view/accounts","chooseRole.html.twig",$this->data
            );
    }
    private function userView():ViewDTO{
             
        return new ViewDTO(
            "app/view/userdash","chooseRole.html.twig",$this->data
       );
    }
    private function authorView():ViewDTO{
           
        return new ViewDTO(
            "app/view/authordash","welcome.html.twig",$this->data
        );
    }

    private function accountDoesNotExist():ViewDTO{

        $this->data=[
            "msg"=>"Account does not exist"
        ];
        return new ViewDTO(
            "app/view/accounts","register.html.twig",$this->data
        );
    }
}
