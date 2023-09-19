<?php
namespace App\Controller\UserDash;
use App\Model\UserDash\EditProfileModel;
use App\Controller\UserDash\UserDashBase;
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
    public function executeAction(array $value):void
    {
        echo "from editprofile.php";
        $this->userdashDTO->setUserid($_SESSION['Userid']);
        $returnvalue=$this->model->fetchUserProfile($this->userdashDTO);
        if($returnvalue)
        {
            echo "from query executed successfully";
            $data=$this->userdashDTO->getUserData();
            $this->view->editProfile($data ,$this->loggeduser,$this->name);
            
        }
    }
}
