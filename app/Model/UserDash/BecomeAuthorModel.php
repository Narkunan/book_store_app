<?php
namespace App\Model\UserDash;
use App\Model\UserDash\UserDashModelBase;
class BecomeAuthorModel extends UserDashModelBase
{
    public function updateRole():bool
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
}