<?php
namespace App\Controller\UserDash;
use App\Controller\UserDash\UserDashBase;
use App\Model\UserDash\UpdateProfileModel;
use App\Model\UserDash\UserDashDTO;
use App\View\ViewDTO;

/**
 * editedprofileConfirm class will update userData
 * 
 * With changes made by the user.
 */
class UpdateProfile extends UserDashBase
{
     private UpdateProfileModel $model;

     public function __construct(UpdateProfileModel $model)
     {
        $this->model = $model;
     }
    /**
     * executeAction will Update changes Made by the User
     * 
     * @access public
     *
     * @return void
     */
    public function executeAction(array $value):ViewDTO
    {
        $userdashDTO = new UserDashDTO();
        $userdashDTO->setUserid($_SESSION['Userid']);
        $userdashDTO->setName($value['name']);
        $Retunvalue=$this->model->updateUserProfile($userdashDTO);
        if($Retunvalue)
        {
            $this->data=[
                "msg"=>"Your Profile Was Updated Successfully"
            ];
            return  $this->displayMessage();
        }
        else
        {
            $this->data=[
                "msg"=>"cannot update"
            ];
            return $this->displayMessage();
        }
    }
}
