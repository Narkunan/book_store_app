<?php
namespace App\Controller\accounts;
session_start();
require_once "../../../vendor/autoload.php";

use App\Model\author\ForgetModel;
use App\View\author\forgetView;
use App\Controller\accounts\InputInterface;


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
       $this->forgetModel=$forgetModel;
       
    }

    /**
     * process input
     * 
     * @access public
     *
     * @return void
     */
    public function inputData():void
    {
        $this->forgetModel->setEmail($_POST["email"]);
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
        
        $password=$this->forgetModel->forgetPassword();
        if($password)
        {

            $pass=$this->forgetModel->getPassword();
            $forgetView=new forgetView();
            $forgetView->displayBook( $pass);
        }
        else
        {
            echo "account not found";
        }
        
    }
}

$forgetModel=new ForgetModel();
$forget=new Forget($forgetModel);
$forget->inputData();
$forget->forgetController();
