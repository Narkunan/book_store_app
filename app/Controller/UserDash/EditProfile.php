<?php
namespace App\Controller\UserDash;
use App\Model\UserDash\EditProfileModel;
use App\Controller\UserDash\UserDashBase;
use App\Model\UserDash\UserDashDTO;
use App\View\ViewDTO;
/**
 * editprofile class will fetch already existing
 * 
 * data and display to user.
 * 
 */
class editprofile extends UserDashBase
{
    private $model;

    public function __construct($model)
    {
        $this->model = $model;
    }
    /**
     * executeAction will fetch user data 
     * 
     * by Userid
     * 
     * @access public
     *
     * @return void
     */
    public function executeAction(array $value):ViewDTO
    {
        $userdashDTO = new UserDashDTO();
        $userdashDTO->setUserid($_SESSION['Userid']);
        $returnvalue=$this->model->fetchUserProfile($userdashDTO);
        if($returnvalue)
        {
        
            $data=[
                "data"=>$userdashDTO->getUserData()
            ];
           // $this->view->editProfile($data ,$this->loggeduser,$this->name);
           return new ViewDTO(
                 "app/view/UserDash","EditProfileView.html.twig",$data
           );
            
        }
        else
        {
            $msg = "something happened";
            $data=[
                "data"=>$msg
            ];
            return new ViewDTO(
                "app/view/UserDash","UserMessage.html.twig",$data
            );
        }
    }
}
