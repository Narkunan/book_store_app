<?php
namespace App\Controller\UserDash;
use App\Controller\UserDash\UserDashBase;

/**
 * editedprofileConfirm class will update userData
 * 
 * With changes made by the user.
 */
class UpdateProfile extends UserDashBase
{

    /**
     * executeAction will Update changes Made by the User
     * 
     * @access public
     *
     * @return void
     */
    public function executeAction(array $value):void
    {
        $this->userdashDTO->setUserid($_SESSION['Userid']);
        $this->userdashDTO->setName($value['name']);
        $Retunvalue=$this->model->updateUserProfile($this->userdashDTO);
        if($Retunvalue)
        {
            $this->msg="Your Profile Was Updated Successfully";
            $this->view->userMessage($this->msg,$this->loggeduser,$this->name);
        }
        else
        {
            echo "cannot update";
        }
    }
}
