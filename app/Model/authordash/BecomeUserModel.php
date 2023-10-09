<?php
namespace App\Model\authordash;
use App\Model\authordash\authordashAbstract;
/**
 * BecomeUserModel will 
 * 
 * assign Author as User
 */
class BecomeUserModel extends authordashAbstract
{
   /**
    * update Role Will UserRole
    *
    * @access public
    *
    *@return bool
    */

    public function updateRole(AuthordashDTO $authordashDTO):bool
    {

            $sql="INSERT INTO user_role (user_id,roleid) VALUES (:userid , 2);";
            $args =[
               "userid"=>$authordashDTO->getAuthorid()
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