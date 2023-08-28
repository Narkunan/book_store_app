<?php
namespace App\Model\UserDash;
use App\Model\UserDash\UserDashModelBase;
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
     * @return  self
     */ 
    public function setOrders($orders)
    {
        $this->orders = $orders;

        return $this;
    }

    /**
     * Set the value of userid
     *
     * @return  self
     */ 

    public function fetchRecentOrder():bool
    {
        $sql="SELECT b.title as title , o.order_id ,o.ordervalue,b.coverpage FROM book b JOIN orders o on b.bookid=o.bookid where o.user_id=:userid;";
        $result=$this->conn->prepare($sql);
        $result->bindParam("userid",$this->userid);
        $result->execute();
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
}