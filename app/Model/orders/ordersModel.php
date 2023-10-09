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
        $args=[
            "quantity"=>$checkOutDTO->getQuantity(),
            "bookid"=>$checkOutDTO->getBookid()
        ];
        $result = $this->saveOrder($sql,$args);
        if($result)
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
        $date=date("Y-m-d");
        $args=[
            "userid"=>$checkOutDTO->getUserid(),
            "bookid"=>$checkOutDTO->getBookid(),
            "orderdate"=>$date,
            "ordervalue"=>$checkOutDTO->getFinalprice()
        ];
        $result = $this->saveOrder($sql,$args);
        if($result)
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
       
            $sql="UPDATE book SET sales_count=sales_count+:quantity where bookid=:bookid;";
            $args=[
                "quantity"=>$checkOutDTO->getQuantity(),
                "bookid"=>$checkOutDTO->getBookid()
            ];
            $result = $this->saveOrder($sql,$args);
            if($result)
            {
                return true;
            }
            else
            {
                return false;
            }
       
    }
    private function saveOrder(string $sql,array $args):bool{

        try
        {
        $stm = $this->conn->prepare($sql);
        foreach($args as $key=>$value)
        {
            $stm->bindValue(":".$key,$value);
        }
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
           $e->getMessage();
           return false;
        }

    }

    
}