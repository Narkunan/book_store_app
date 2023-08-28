<?php
namespace App\Model\UserDash;
use App\Model\UserDash\UserDashModelBase;
class EditProfileModel extends UserDashModelBase
{

   private array $userData;
   
   public function fetchUserProfile()
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
    * @return  self
    */ 
   public function setUserData($userData)
   {
      $this->userData = $userData;

      return $this;
   }
}