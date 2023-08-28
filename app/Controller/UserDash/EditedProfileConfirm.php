<?php
namespace App\Controller\UserDash;
require "../../../vendor/autoload.php";
session_start();
use App\Model\UserDash\EditProfileConfirmModel;
use App\Controller\UserDash\UserDashBase;
class EditedProfileConfirm extends UserDashBase
{

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
$editProfileConfirmModel=new EditProfileConfirmModel();
$ditprofileConfirm= new EditedProfileConfirm($editProfileConfirmModel);
$ditprofileConfirm->executeAction();