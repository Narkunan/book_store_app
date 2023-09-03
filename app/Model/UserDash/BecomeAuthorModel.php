<?php
namespace App\Model\UserDash;
use App\Model\UserDash\UserDashModelBase;
/**
 * BecomeAuthorModel class will make 
 * 
 * user as author
 */
class BecomeAuthorModel extends UserDashModelBase
{
    /**
     * UpdateRole function will update User Role
     *
     * @access public
     * 
     * @return boolean
     */
    public function updateRole():bool
    {
        try
        {
            $sql="INSERT INTO user_role (user_id,roleid) VALUES (:user_id,1);";
            $stm= $this->conn->prepare($sql);
            $stm->bindParam("user_id",$this->userid);
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