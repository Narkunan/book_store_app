<?php
namespace App\Model\UserDash;
use App\Model\UserDash\UserDashModelBase;
/**
 * EditProfileModel function will
 * 
 * update user data in user table.
 */
class UpdateProfileModel extends UserDashModelBase
{
    
    /**
     * upadteuserprofile will update user profile .
     *
     * @return  bool
     */ 
    
    public function updateUserProfile(UserDashDTO $userDashDTO):bool
    {
 
             $sql="UPDATE USERs SET name=:username where user_id=:userid;";
             $args =[
                "username"=>$userDashDTO->getName(),
                "userid"=>$userDashDTO->getUserId()
             ];
             $result = $this->saveData($sql,$args);
            if($result)
            {
                return true;
            }
            else
            {
                return false;
            }
    }
}