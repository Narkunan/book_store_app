<?php
namespace App\Controller\accounts;
require_once "../../../vendor/autoload.php";

use App\Model\accounts\RegisterModel;
use App\Controller\accounts\InputInterface;

/**
 * RegisterUser is responsible for RegisterUser
 */

class RegisterUser implements InputInterface
{
    private RegisterModel $register;

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
      * Process Input data
      *
      * @access public
      *
      * @return void
      */
    public function inputData():void
    {
      $this->register->setName($_POST["name"]??"not passed");
      $this->register->setEmail($_POST["email"]??"not passed");
      $this->register->setPassword($_POST["password"]??"not passed");
      $this->register->setRoleid($_POST["UserRole"]??"not passed");
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
          $result=$this->register->registerAuthor();
          if($result)
          {
            header("Location: ../../../public/assets/html/accounts/login.php?msg=Account created Please Login");
            
          }
          else
          {
            
            header("Location: ../../../public/assets/html/accounts/login.php?msg=Account already exists");
          }
          
    }
}

$registerModel=new RegisterModel();
$register= new RegisterUser($registerModel);
$register->inputData();
$register->registerAuthorController();
