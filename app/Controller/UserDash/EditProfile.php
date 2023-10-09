<?php
namespace App\Controller\UserDash;
use App\Model\UserDash\EditProfileModel;
use App\Controller\UserDash\UserDashBase;
use App\Model\UserDash\UserDashDTO;
use App\View\ViewDTO;
use App\Controller\UserDash\UserdashI;
/**
 * editprofile class will fetch already existing
 * 
 * data and display to user.
 * 
 */
class editprofile extends UserDashBase implements UserdashI
{
    private EditProfileModel $model;

    public function __construct(EditProfileModel $model)
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
        
            $this->data=[
                "data"=>$userdashDTO->getUserData()
            ];
           
            return $this->displayData();
        }
        else
        {
            $this->data=[
                "data"=>"something happened"
            ];
           return $this->displayMessage();
        }
    }
    public function displayData():ViewDTO{
        return new ViewDTO(
            "app/view/UserDash","EditProfileView.html.twig",$this->data
      );
    }
}
