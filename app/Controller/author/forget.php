<?php

namespace App\Controller\author;

require_once "../../../vendor/autoload.php";

use App\Model\author\ForgetModel;
use App\View\author\ForgetView;

class Forget
{
    private $forgetModel;
    public function __construct($forgetModel)
    {
       $this->forgetModel=$forgetModel;
    }
    public function forgetController()
    {
        $this->forgetModel->setEmail($_POST["email"]);
        $password=$this->forgetModel->forgetPassword();
        if($password)
        {
            ForgetView::displayPassword($this->forgetModel->getPassword());
        }
        else
        {
            echo "account not found";
        }
        
    }
}

$forgetModel=new ForgetModel();
$forget=new Forget($forgetModel);
$forget->forgetController();
