<?php
namespace App\Controller\authordash;
require "../../../vendor/autoload.php";
use App\Model\authordash\BecomeUserModel;
use App\Controller\authordash\AuthorDashBase;
session_start();
class BecomeUser extends AuthorDashBase
{
    public function becomeUserController()
    {
        $this->model->setUserId($_SESSION['Userid']);
        $returnValue=$this->model->updateRole();
        if($returnValue)
        {
           $msg="You Are now Become the User";
           $loggedUser=$_SESSION['loggedUser'];
           $name =$_SESSION['UserName'];
           $this->view->displayAuthorMessage($msg,$loggedUser,$name);
        }
        else
        {
            echo "something happened";
        }

    }
}
$becomeusermodel = new BecomeUserModel();
$becomeUser = new BecomeUser($becomeusermodel);
$becomeUser->becomeUserController();