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

       try
       {
            $sql="INSERT INTO user_role (user_id,roleid) VALUES (:userid , 2);";
            $stm=$this->connection->prepare($sql);
            $stm->bindParam("userid",$authordashDTO->authorid);
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