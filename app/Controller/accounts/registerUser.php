<?php
namespace App\Controller\accounts;
use App\Model\accounts\AccountsDTO;
use App\Model\accounts\RegisterModel;
use App\View\ViewDTO;

/**
 * RegisterUser is responsible for RegisterUser
 */

class RegisterUser 
{
    private RegisterModel $register;
    protected array $data=[];
    /**
     * Initialies registerModel
     * 
     * @access public 
     *
     * @param registerModel $registerModel
     */
    public function __construct(RegisterModel $registerModel)
    {
       $this->register=$registerModel;
    }
     /**
     * inputData function is responsible for
     * 
     * register user and redirect to the appropriate view
     * 
     * if user is already exists redirect they to the login page 
     * 
     * if user account created we are redirect them to the login 
     * 
     * @access public
     * 
     * @return void
     */
    public function inputData(array $value):ViewDTO
    {

        $dto = AccountsDTO::fromMethod($value);
        $dto->setName($value["name"]??"not passed");
        $dto->setRole($value["UserRole"]??"not passed");
        
        $result=$this->register->registerAuthor($dto);
        if($result)
        {
          $this->data=["msg"=>"Account created"];
          return $this->accountCreated();
        }
        else
        {
           $this->data=["msg"=>"Account already exists"];
           return $this->accountExists();
        }
        
    }

    private function accountCreated():ViewDTO{
      return new ViewDTO(
        "app/view/accounts","login.html.twig",$this->data
      );

    }
    private function accountExists():ViewDTO{

      return new ViewDTO(
        "app/view/accounts","login.html.twig",$this->data
      );

    } 
}
