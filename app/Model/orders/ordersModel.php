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
    
    private  $conn;

    
    public function __construct()
    {
       $this->conn = Connection::getInstance();
       $this->conn=$this->conn->getConnection();
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
    public function placeOrder(checkOutDTO $checkOutDTO):bool
    {
        if($this->createOrder($checkOutDTO))
        {
            
            if($this->updateSaleCount($checkOutDTO))
            {
                 if($this->updateStockCount($checkOutDTO))
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
    public function updateStockCount(checkOutDTO $checkOutDTO):bool
    {
        $sql="UPDATE book SET stock=stock-:quantity where bookid=:bookid;";
        $stm=$this->conn->prepare($sql);
        $stm->bindParam("quantity",$checkOutDTO->quantity);
        $stm->bindParam("bookid",$checkOutDTO->bookid);
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
    public function createOrder(checkOutDTO $checkOutDTO):bool
    {
        
        $sql="INSERT INTO ORDERS (user_id,bookid,order_date,ordervalue) values(:userid,:bookid,:orderdate,:ordervalue);";
        $stm=$this->conn->prepare($sql);
        $stm->bindParam("userid",$checkOutDTO->userid);
        $stm->bindParam("bookid",$checkOutDTO->bookid);
        $date=date("Y-m-d");
        $stm->bindParam("orderdate",$date);
        $stm->bindParam("ordervalue",$checkOutDTO->finalprice);
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
    public function updateSaleCount(checkOutDTO $checkOutDTO):bool
    {
        try
        {
            $sql="UPDATE book SET sales_count=sales_count+:quantity where bookid=:bookid;";
            $stm=$this->conn->prepare($sql);
            $quantity=$checkOutDTO->quantity;
            $bookid=$checkOutDTO->bookid;
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

    
}