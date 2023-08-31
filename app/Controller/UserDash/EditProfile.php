<?php
namespace App\Controller\UserDash;
require "../../../vendor/autoload.php";
use App\Model\UserDash\EditProfileModel;
use App\Controller\UserDash\UserDashBase;
session_start();
/**
 * editprofile class will fetch already existing
 * 
 * data and display to user.
 * 
 */
class editprofile extends UserDashBase
{
    /**
     * executeAction will fetch user data 
     * 
     * by Userid
     * 
     * @access public
     *
     * @return void
     */
    public function executeAction():void
    {
        $this->model->setUserid($_SESSION['Userid']);
        $returnvalue=$this->model->fetchUserProfile();
        if($returnvalue)
        {

            $data=$this->model->getUserData();
            $this->view->editProfile($data ,$this->loggeduser,$this->name);
            
        }
    }
}
$editprofileModel= new EditProfileModel();
$editprofile = new editprofile($editprofileModel); 
$editprofile->executeAction();