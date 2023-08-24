<?php
namespace App\Controller\UserDash;
require "../../../vendor/autoload.php";
use App\Model\UserDash\EditProfileModel;
use App\View\Userdash\EditProfileView;
session_start();
class editprofile
{
    private EditProfileModel $editprofileModel;
    private EditProfileView $editProfileView;

    public function __construct($editprofileModel,$editProfileView)
    {
        $this->editprofileModel=$editprofileModel;
        $this->editProfileView=$editProfileView;
    }
    public function editProfileController()
    {
        $this->editprofileModel->setUserid($_SESSION['userid']);
        $returnvalue=$this->editprofileModel->fetchUserProfile();
        if($returnvalue)
        {

            
            $this->editProfileView->displayProfile($this->editprofileModel->getUserData());
        }
    }
}
$editprofileModel= new EditProfileModel();
$editProfileView = new EditProfileView();
$editprofile = new editprofile($editprofileModel,$editProfileView); 
$editprofile->editProfileController();