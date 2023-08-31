<?php
namespace App\Controller\UserDash;
require "../../../vendor/autoload.php";
use App\Controller\UserDash\UserDashBase;
use App\Model\UserDash\BecomeAuthorModel;
session_start();

/**
 * BecomeAuthor will make 
 * 
 * user as Author.
 * 
 */
class BecomeAuthor extends UserDashBase
{
    /**
     * executeAction will assign user 
     * 
     * with author privilleges.
     * 
     * @access public
     *
     * @return void
     */
    public function executeAction():void
    {
        $this->model->setUserId($_SESSION['Userid']);
        $returnValue=$this->model->updateRole();
        if($returnValue)
        {
            $this->msg="You are Now Become Author";
            $this->view->userMessage($this->msg,$this->loggeduser,$this->name);
        }
        else
        {
            echo "some error occured";
        }

    }
}
$becomeAuthorModel=new BecomeAuthorModel();
$becomeAuthor=new BecomeAuthor($becomeAuthorModel);
$becomeAuthor->executeAction();