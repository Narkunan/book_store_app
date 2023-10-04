<?php
namespace App\Controller\accounts;
use App\Model\accounts\ForgetModel;
use App\Controller\accounts\InputInterface;
use App\Model\accounts\AccountsDTO;
use App\view\ViewDTO;
/**
 * Forget class is for forget password
 */
class Forget implements InputInterface
{
    private ForgetModel $forgetModel;
    /**
     * initialize object for forgetModel
     * 
     * @access public 
     *
     * @param forgetModel $forgetModel
     */
    public function __construct(ForgetModel $forgetModel)
    {
       $this->forgetModel = $forgetModel;
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
        $forgetDTO = AccountsDTO::fromMethod($value);
        $this->forgetController($forgetDTO);
    }

    /**
     * ForgetController will controll things like retrieve password 
     * 
     * and pass it to the Forgetview.
     *
     * @return void
     */
    public function forgetController(AccountsDTO $accountsDTO):ViewDTO
    {
        
        if($this->forgetModel->checkAccountExsits($accountsDTO))
        {
            
           
            if($this->forgetModel->checkSecurityQuestion($accountsDTO))
            {
                
                 if($this->forgetModel->updatePassword($accountsDTO))
                 {
                    $data=[
                        "msg"=>"Password Updated"
                    ];
                    return new ViewDTO(
                        "app/View/accounts","login.html.twig",$data
                           
                    );
                 }
                 else
                 {
                    $data=[
                        "msg"=>"problem with updating password"
                    ];
                    return new ViewDTO("app/view/accounts","forget.html.twig",$data);
                 }
            }
            else
            {  
                $data = [
                    'msg'=>"security question wrong"
                    ];
                    return new ViewDTO(
                        "app/View/accounts","forget.html.twig",$data
                    );
                
            }
            
        }
        else
        {  
            $data =[
                'msg' =>"Account does not exist"
            ];
            return new ViewDTO(
                "app/view/accounts","register.htnl.twig",$data
            );
        }
        
    }
}
