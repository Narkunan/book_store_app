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
    private array $orders;
    /**
     * Get the value of orders
     */ 
    public function getOrders()
    {
        return $this->orders;
    }

    /**
     * Set the value of orders
     * 
     * @param array $orders
     *
     * @return  self
     */ 
    public function setOrders(array $orders)
    {
        $this->orders = $orders;

        return $this;
    }

    /**
     * fetchRecentOrder will fetch recent placed by 
     * 
     * user.
     * 
     * @access public
     *
     * @return bool
     */ 

    public function fetchRecentOrder():bool
    {
        try
        {
        $sql="SELECT b.title, o.order_id ,o.ordervalue,b.coverpage FROM book as b JOIN orders as o on b.bookid=o.bookid where o.user_id=:userid;";
        $result=$this->conn->prepare($sql);
        $result->bindParam("userid",$this->userid);
        $result->execute();
         echo $result->rowCount();
        if($result->rowCount()>0)
        {
           
            $this->setOrders($result->fetchAll(\PDO::FETCH_ASSOC));
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