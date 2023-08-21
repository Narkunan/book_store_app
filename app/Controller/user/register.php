<?php

namespace App\Controller\user;

require_once "../../../vendor/autoload.php";

use App\Model\user\RegisterModel;

/**
 * Registeruser is responsible for RegisterUser
 */

class RegisterUser
{
    private $register;
       
    /**
     * Initialies registerModel
     *
     * @param registerModel $registerModel
     */

    public function __construct($registerModel)
    {
       $this->register=$registerModel;
    }


      /**
     * registerUser controlller function is responsible for
     * 
     * registerUser and redirect to the appropriate view
     * 
     *
     * @return void
     */
    public function registerUserController(): void
    {
          $this->register->setName($_POST["name"]??"not passed");
          $this->register->setEmail($_POST["email"]??"not passed");
          $this->register->setPassword($_POST["password"]??"not passed");
          $this->register->setAddress($_POST["address"]??"not passed");
          if($this->register->registerUser())
          {
           // header("Location: ../../../public/assets/html/user/login.html");
           echo "should be redirect to login.html";
          }
          else
          {
            echo "redirectted to login.html user exists";
          }
          
    }
}

$registerModel=new RegisterModel();
$register= new RegisterUser($registerModel);
$register->registerUserController();
