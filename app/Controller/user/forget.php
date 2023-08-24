<?php
namespace App\Controller\user;

require_once "../../../vendor/autoload.php";

use App\Model\user\ForgetModel;
use App\View\user\ForgetView;

/**
 * Forget class is for forget password
 */

class Forget
{
     /**
     * initialize object for forgetModel
     *
     * @param forgetModel $forgetModel
     */
    private ForgetModel $forgetModel;
    private  ForgetView $forgetView;
    public function __construct($forgetModel,$forgetView)
    {
       $this->forgetModel=$forgetModel;
       $this->forgetView=$forgetView;
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
        $this->forgetModel->setEmail($_POST["email"]);
        $password=$this->forgetModel->forgetPassword();
        if($password)
        {
            $this->forgetView->displayPassword($this->forgetModel->getPassword());
        }
        else
        {
            echo "account not found";
        }
        
    }
}

$forgetModel=new ForgetModel();
$forgetView=new ForgetView();
$forget=new Forget($forgetModel,$forgetView);
$forget->forgetController();
