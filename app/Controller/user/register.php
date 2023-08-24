<?php

namespace App\Controller\user;

require_once "../../../vendor/autoload.php";

use App\Model\user\RegisterModel;
use App\Controller\user\InputInterface;

/**
 * RegisterAuthor is responsible for RegisterAuthor
 */

class Register implements InputInterface
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
      * Process Input data
      *
      * @return void
      */
    public function inputData():void
    {
      $this->register->setName($_POST["name"]??"not passed");
      $this->register->setEmail($_POST["email"]??"not passed");
      $this->register->setPassword($_POST["password"]??"not passed");
      $this->register->setAddress($_POST['address']??"not passed");
    }

    /**
     * register author controlller function is responsible for
     * 
     * register author and redirect to the appropriate view
     * 
     *
     * @return void
     */
    public function registerUserController():void
    {
          $result=$this->register->registerUser();
          if($result)
          {
            header("Location: ../../../public/assets/html/user/login.php?msg=Account created Please Login");
            echo "account created";
          }
          else
          {
            echo "redirectted to login.html user exists";
            header("Location: ../../../public/assets/html/user/login.php?msg=Account already exists");
          }
          
    }
}

$registerModel=new RegisterModel();
$register= new Register($registerModel);
$register->inputData();
$register->registerUserController();
