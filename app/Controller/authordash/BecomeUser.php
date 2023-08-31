<?php
namespace App\Controller\authordash;
require "../../../vendor/autoload.php";
use App\Model\authordash\BecomeUserModel;
use App\Controller\authordash\AuthorDashBase;
session_start();

/**
 * BecomeUser class is responsible will author
 * 
 * the user privilleges that means they can bought book. 
 * 
 */
class BecomeUser extends AuthorDashBase
{
    /**
     * BecomeUserController method will take 
     * 
     * care of making Author as User
     * 
     * @access public
     *
     * @return void
     */
    public function becomeUserController():void
    {
        $this->model->setAuthorId($_SESSION['Userid']);
        $returnValue=$this->model->updateRole();
        if($returnValue)
        {
           $this->msg="You Are now Become the User";
           $this->loggedUser=$_SESSION['loggedUser'];
           $this->name =$_SESSION['UserName'];
           $this->displayMessages();
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