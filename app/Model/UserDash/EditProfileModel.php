<?php
namespace App\Model\UserDash;
use App\Model\UserDash\UserDashModelBase;
/**
 * editProfileModel will retrieve 
 * 
 * existing values of user 
 */
class EditProfileModel extends UserDashModelBase
{

   
   
   /**
    * fetchUserProfile function will
    *
    * get User Profile
    *
    * @access public
    *
    * @return bool
    */
   public function fetchUserProfile(UserDashDTO $userDashDTO):bool
   {
      try
      {
        $sql="SELECT name FROM USERs where user_id=:userid;";
        $stm=$this->conn->prepare($sql);
        $userid = $userDashDTO->getUserId();
        $stm->bindParam("userid",$userid);
        $stm->execute();
        if($stm->rowCount()>0)
        {
            $userDashDTO->setUserData($stm->fetchAll(\PDO::FETCH_ASSOC));
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