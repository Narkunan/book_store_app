<?php
namespace App\Controller\accounts;
use App\Model\accounts\ForgetModel;
use App\Controller\accounts\InputInterface;
use App\Model\accounts\AccountsDTO;
/**
 * Forget class is for forget password
 */
class Forget implements InputInterface
{
    private ForgetModel $forgetModel;
    private AccountsDTO $AccountsDTO;

    /**
     * initialize object for forgetModel
     * 
     * @access public 
     *
     * @param forgetModel $forgetModel
     */
    public function __construct(ForgetModel $forgetModel,AccountsDTO $AccountsDTO)
    {
       $this->forgetModel=$forgetModel;
       $this->AccountsDTO = $AccountsDTO;
       
    }

    /**
     * process input
     * 
     * @access public
     *
     * @return void
     */
    public function inputData(array $value):void
    {
        $this->AccountsDTO->setEmail($value["email"]??" ");
        $this->AccountsDTO->setPassword($value['password']??" ");
        $this->AccountsDTO->setSecurityQuestion($value['securityquestion']??" ");
    }

    /**
     * ForgetController will controll things like retrieve password 
     * 
     * and pass it to the Forgetview.
     *
     * @return void
     */
    public function forgetController():void
    {
        
        if($this->forgetModel->checkAccountExsits($this->AccountsDTO))
        {
            
           
            if($this->forgetModel->checkSecurityQuestion($this->AccountsDTO))
            {
                
                 if($this->forgetModel->updatePassword($this->AccountsDTO))
                 {
                    $_SESSION['msg']="password updated";
                    echo __DIR__;
                    header("Location: index.php?action=login");
                 }
            }
            else
            {   $_SESSION['msg']="security question wrong";
                echo __DIR__;
                header("Location: index.php?action=forget");
            }
            
        }
        else
        {  
            $_SESSION['msg'] = "Account does not exist";
            echo __DIR__;
            header("Location: index.php?action=register");
        }
        
    }
}
