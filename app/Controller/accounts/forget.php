<?php
namespace App\Controller\accounts;
use App\Model\accounts\ForgetModel;
use App\Model\accounts\AccountsDTO;
use App\view\ViewDTO;
/**
 * Forget class is for forget password
 */
class Forget
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
     * ForgetController will controll things like retrieve password 
     * 
     * and pass it to the Forgetview.
     *
     * @return void
     */
    public function inputData(array $value):ViewDTO
    {

        $forgetDTO = AccountsDTO::fromMethod($value);
        
        if($this->forgetModel->checkAccountExsits($forgetDTO))
        {
            if($this->forgetModel->checkSecurityQuestion($forgetDTO))
            {
                 if($this->forgetModel->updatePassword($forgetDTO))
                 {  
                         return $this->passwordUpdate();  
                 }
                 else
                 {  
                      return $this->problemWithUpdate();
                 }
            }
            else
            {  
                return $this->wrongSecurityQuestion();
            }
        }
        else
        {  
            return $this->accountDoesNotExist();
        }
    }

    
    private function passwordUpdate():ViewDTO
    {
        $data=[
            "msg"=>"Password Updated"
        ];
        return new ViewDTO(
            "app/View/accounts","login.html.twig",$data
               
        );
    }
    private function wrongSecurityQuestion():ViewDTO
    {
        $data = [
            'msg'=>"security question wrong"
            ];
            return new ViewDTO(
                "app/View/accounts","forget.html.twig",$data
            );
    }
    private function accountDoesNotExist():ViewDTO
    {
        $data =[
            'msg' =>"Account does not exist"
        ];
        return new ViewDTO(
            "app/view/accounts","register.html.twig",$data
        );
    }
    private function problemWithUpdate():ViewDTO
    {
        $data=[
            "msg"=>"problem with updating password"
        ];
        return new ViewDTO("app/view/accounts","forget.html.twig",$data);
    }
}
