<?php
namespace App\Controller\accounts;
use App\Model\accounts\AccountsDTO;
use App\Model\accounts\RegisterModel;
use App\Controller\accounts\InputInterface;

/**
 * RegisterUser is responsible for RegisterUser
 */

class RegisterUser implements InputInterface
{
    private RegisterModel $register;
    private AccountsDTO $AccountsDTO;

    /**
     * Initialies registerModel
     * 
     * @access public 
     *
     * @param registerModel $registerModel
     */
    public function __construct(RegisterModel $registerModel,AccountsDTO $AccountsDTO)
    {
       $this->register=$registerModel;

       $this->AccountsDTO=$AccountsDTO;
    }
     /**
      * Process Input data
      *
      * @access public
      *
      * @return void
      */
    public function inputData(array $value):void
    {
      $this->AccountsDTO->setName($value["name"]??"not passed");
      $this->AccountsDTO->setEmail($value["email"]??"not passed");
      $this->AccountsDTO->setPassword($value["password"]??"not passed");
      $this->AccountsDTO->setId($value["UserRole"]??"not passed");
      $this->AccountsDTO->setSecurityQuestion($value["securityQuestion"]??"not passed");
    }

    /**
     * register User controlller function is responsible for
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
    public function registerAuthorController():void
    {
          $result=$this->register->registerAuthor($this->AccountsDTO);
          if($result)
          {
            $_SESSION["msg"]="Account created";
            header("Location: index.php?action=login");
          }
          else
          {
             $_SESSION["msg"]="Account already exists";
             header("Location: index.php?action=login");
          }
          
    }
}
