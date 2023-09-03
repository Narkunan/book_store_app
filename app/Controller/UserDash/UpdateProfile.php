<?php
namespace App\Controller\UserDash;
require "../../../vendor/autoload.php";
session_start();
use App\Model\UserDash\UpdateProfileModel;
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
    public function executeAction():void
    {
        $this->model->setUserid($_SESSION['Userid']);
        $this->model->setEmail($_POST['email']);
        $this->model->setPassword($_POST['password']);
        $this->model->setName($_POST['name']);
        $Retunvalue=$this->model->updateUserProfile();
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
$editProfileConfirmModel=new UpdateProfileModel();
$ditprofileConfirm= new UpdateProfile ($editProfileConfirmModel);
$ditprofileConfirm->executeAction();