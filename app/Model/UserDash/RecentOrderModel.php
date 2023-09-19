<?php
namespace App\Model\UserDash;
use App\Model\UserDash\UserDashModelBase;
/**
 * RecentOrderModel will fetch
 * 
 * Recently Placed Orders.
 */
class RecentOrderModel extends UserDashModelBase
{
    

    /**
     * fetchRecentOrder will fetch recent placed by 
     * 
     * user.
     * 
     * @access public
     *
     * @return bool
     */ 

    public function fetchRecentOrder(UserDashDTO $userDashDTO):bool
    {
        try
        {
        $sql="SELECT b.title, o.order_id ,o.ordervalue,b.coverpage FROM book as b JOIN orders as o on b.bookid=o.bookid where o.user_id=:userid;";
        $result=$this->conn->prepare($sql);
        $result->bindParam("userid",$userDashDTO->userid);
        $result->execute();
         
        if($result->rowCount()>0)
        {
           
            $userDashDTO->setOrders($result->fetchAll(\PDO::FETCH_ASSOC));
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