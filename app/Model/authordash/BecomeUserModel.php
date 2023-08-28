<?php
namespace App\Model\authordash;
use App\Model\Connection;
class BecomeUserModel
{
    private int $userid;
    
    use Connection;
    private \PDO $conn;

    public function __construct()
    {
        $this->conn = $this->getConnection();
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
    public function updateRole():bool
    {
         $sql="INSERT INTO user_role (user_id,roleid) VALUES (:userid , 2);";
         $stm=$this->conn->prepare($sql);
         $stm->bindParam("userid",$this->userid);
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
}