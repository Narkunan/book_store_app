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
    public function inputData(array $value):void
    {

        /**$dto = AccountsDTO::fromMethod($value);
        $dto->setName($value["name"]??"not passed");
        $dto->setRole($value["UserRole"]??"not passed");
        $this->registerAuthorController($dto);**/
        echo "<h1 style='font-size:50px;'> from register user controller</h1>";
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
    public function registerAuthorController(AccountsDTO $AccountsDTO):void
    {
          $result=$this->register->registerAuthor($AccountsDTO);
          if($result)
          {
            $_SESSION["msg"]="Account created";
            header("Location: login");
          }
          else
          {
             $_SESSION["msg"]="Account already exists";
             header("Location: login");
          }
          
    }
}
