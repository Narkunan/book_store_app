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

   private array $userData;
   
   /**
    * fetchUserProfile function will
    *
    * get User Profile
    *
    * @access public
    *
    * @return bool
    */
   public function fetchUserProfile():bool
   {
        $sql="SELECT name,email,password FROM USERs where user_id=:userid;";
        $stm=$this->conn->prepare($sql);
        $stm->bindParam("userid",$this->userid);
        $stm->execute();
        if($stm->rowCount()>0)
        {
            $this->setUserData($stm->fetchAll(\PDO::FETCH_ASSOC));
            return true;
        }
        else
        {
            return false;
        }
   }

   /**
    * Get the value of userData
    */ 
   public function getUserData()
   {
      return $this->userData;
   }

   /**
    * Set the value of userData
    *
    *@param array $userdata
    *
    * @return  self
    */ 
   public function setUserData($userData)
   {
      $this->userData = $userData;

      return $this;
   }
}