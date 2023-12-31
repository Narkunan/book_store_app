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
        try
        {
             $sql="UPDATE USERs SET name=:username where user_id=:userid;";
             $stm=$this->conn->prepare($sql);
             $name = $userDashDTO->getName();
             $userid = $userDashDTO->getUserId();
             $stm->bindParam("username",$name);
             $stm->bindParam("userid",$userid);
             $stm->execute();
            if($stm)
            {
                return true;
            }
            else
            {
                return false;
            }
      }
      catch(\PDOException $e)
      {
            echo $e->getMessage();
            return false;
      }
    }
}