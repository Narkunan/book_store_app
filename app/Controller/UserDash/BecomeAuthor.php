<?php
namespace App\Controller\UserDash;
use App\Controller\UserDash\UserDashBase;
use App\Model\UserDash\BecomeAuthorModel;
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
        $this->userdashDTO->setUserId($_SESSION['Userid']);
        $returnValue=$this->model->updateRole($this->userdashDTO);
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
