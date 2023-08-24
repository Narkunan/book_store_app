<?php
namespace App\Model\UserDash;
require "../../../vendor/autoload.php";
use App\Model\Connection;
class EditProfileModel
{
   use Connection;
   private \PDO $conn;
   
   private int $userid;
   private array $userData;
   public function __construct()
   {
     $this->conn=$this->getConnection();
   }
   
   public function fetchUserProfile()
   {
        $sql="SELECT * FROM USER where id=:userid;";
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
    * Set the value of userid
    *
    * @return  self
    */ 
   public function setUserid($userid)
   {
      $this->userid = $userid;

      return $this;
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