<?php
namespace App\Model\orders;
require "../../../vendor/autoload.php";
use App\Model\Connection;

class ordersModel
{
    use connection;
    private \PDO $conn;

    private int $userid;

    private int $bookid;

    private int $totalPrice;
    
    private int $quantity;
    public function __construct()
    {
       $this->conn=$this->getConnection();
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

    /**
     * Set the value of bookid
     *
     * @return  self
     */ 
    public function setBookid($bookid)
    {
        
        $this->bookid = $bookid;

        return $this;
    }

    /**
     * Set the value of totalPrice
     *
     * @return  self
     */ 
    public function setTotalPrice($totalPrice)
    {
        
        $this->totalPrice = $totalPrice;

        return $this;
    }

    public function placeOrder()
    {
        if($this->createOrder())
        {
            
            if($this->updateSaleCount())
            {
                 if($this->updateStockCount())
                 {
                    
                    return true;
                 }
                 else
                 {
                    
                    return false;
                 }

            }
            else
            {
                
                return false;
            }
        }
        else
        {
            
           
            return false;
            
        }
    }
    
    public function updateStockCount():bool
    {
        $sql="UPDATE book SET stock=stock-:quantity where bookid=:bookid;";
        $stm=$this->conn->prepare($sql);
        $stm->bindParam("quantity",$this->quantity);
        $stm->bindParam("bookid",$this->bookid);
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
    public function createOrder():bool
    {
        
        $sql="INSERT INTO ORDERS (user_id,bookid,order_date,ordervalue) values(:userid,:bookid,:orderdate,:ordervalue);";
        $stm=$this->conn->prepare($sql);
        $stm->bindParam("userid",$this->userid);
        $stm->bindParam("bookid",$this->bookid);
        $date=date("Y-m-d");
        $stm->bindParam("orderdate",$date);
        $stm->bindParam("ordervalue",$this->totalPrice);
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
    public function updateSaleCount():bool
    {
       $sql="UPDATE book SET sales_count=sales_count+:quantity where bookid=:bookid;";
       $stm=$this->conn->prepare($sql);
       $quantity=$this->quantity;
       $bookid=$this->bookid;
       $stm->bindParam("quantity",$quantity);
       $stm->bindParam("bookid",$bookid);
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

    /**
     * Set the value of quantity
     *
     * @return  self
     */ 
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }
}