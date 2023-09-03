<?php
namespace App\Model\orders;
use App\Model\Connection;
/**
 * orderModel is responsible for create order record. 
 * 
 * 
 */
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
     * @param int $userid
     *
     * @return  self
     */ 
    public function setUserid(int $userid):self
    {
       
        $this->userid = $userid;

        return $this;
    }

    /**
     * Set the value of bookid
     * 
     * @param int $bookid
     *
     * @return  self
     */ 
    public function setBookid(int $bookid):self
    {
        
        $this->bookid = $bookid;

        return $this;
    }

    /**
     * Set the value of totalPrice
     *
     * @param float $totalprice
     * 
     * @return  self
     */ 
    public function setTotalPrice(float $totalPrice):self
    {
        
        $this->totalPrice = $totalPrice;

        return $this;
    }
    /**
     * placeorder will create order
     * 
     * record.
     *
     * @access public 
     * 
     * @return boolean
     */
    public function placeOrder():bool
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
    
    /**
     * updatestockcount function will update stock count.
     * 
     * @access public
     * 
     *
     * @return boolean
     */
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
    /**
     * createOrder will create order record in order table.
     * 
     * @access public
     *
     * @return boolean
     */
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
    /**
     * updatesalescount function will upadte 
     * 
     * sale Count in boook table.
     * 
     * @access public 
     *
     * @return boolean
     */
    public function updateSaleCount():bool
    {
        try
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
        catch(\PDOException $e)
        {
            echo $e->getMessage();
            return false;
        }
    }

    /**
     * Set the value of quantity
     *
     * @param int $quantity
     * 
     * @return  self
     */ 
    public function setQuantity(int $quantity):self
    {
        $this->quantity = $quantity;

        return $this;
    }
}