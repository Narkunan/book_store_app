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
    public function updateRole(UserDashDTO $dto):bool
    {
        
            $sql="INSERT INTO user_role (user_id,roleid) VALUES (:user_id,1);";
            $args=[
                "user_id"=>$dto->getUserId()
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