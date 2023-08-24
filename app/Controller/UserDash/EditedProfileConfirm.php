<?php
namespace App\Controller\UserDash;
require "../../../vendor/autoload.php";
session_start();
use App\Model\UserDash\EditProfileConfirmModel;
use App\View\Userdash\EditProfileConfirmView;

class EditedProfileConfirm
{
    private EditProfileConfirmModel $editProfileConfirmModel;
    private EditProfileConfirmView $editProfileConfirmView;
    public function __construct($editProfileConfirmModel,$editProfileConfirmView)
    {
        $this->editProfileConfirmModel=$editProfileConfirmModel;
        $this->editProfileConfirmView=$editProfileConfirmView;
    }
    public function editConfirmController():void
    {
        $this->editProfileConfirmModel->setUserid($_SESSION['userid']);
        $this->editProfileConfirmModel->setEmail($_POST['email']);
        $this->editProfileConfirmModel->setAddress($_POST['address']);
        $this->editProfileConfirmModel->setPassword($_POST['password']);
        $this->editProfileConfirmModel->setName($_POST['name']);
        $Retunvalue=$this->editProfileConfirmModel->updateUserProfile();
        if($Retunvalue)
        {
            $this->editProfileConfirmView->displayStatus("Your Profile Was Updated Successfully");
        }
        else
        {
            echo "cannot update";
        }
    }
}
$editProfileConfirmModel=new EditProfileConfirmModel();
$editProfileConfirmView = new EditProfileConfirmView();
$ditprofileConfirm= new EditedProfileConfirm($editProfileConfirmModel,$editProfileConfirmView);
$ditprofileConfirm->editConfirmController();