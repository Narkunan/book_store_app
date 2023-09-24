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
        $sql = "SELECT b.title, o.orderid ,o.ordervalue,b.coverpage FROM order_s as o 
              INNER JOIN orderdetails as od ON o.orderid = od.orderid
              INNER JOIN books as b ON od.bookid = b.bookid 
              WHERE o.userid = :userid;";
        $result=$this->conn->prepare($sql);
        $userid = $userDashDTO->getUserId();
        $result->bindParam("userid",$userid);
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