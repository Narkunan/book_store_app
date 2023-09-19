<?php
namespace App\Controller\orders;
use App\Controller\orders\OrderBase;

/**
 * orderConfirm will Create new order record in the database.
 * 
 */
class OrderConfirm extends OrderBase
{
    /**
     * orderConfirmController will create new order record 
     * 
     * in the database.
     * 
     * @access public
     *
     * @return void
     */
    public function ordersConfirmController(array $value):void
    {
        
        $this->checkOutDTO->setBookid($value['bookid']);
        $this->checkOutDTO->setFinalPrice($value['totalprice']);
        $this->checkOutDTO->setQuantity($value['quantity']);
        $this->checkOutDTO->setUserid($_SESSION['Userid']);
        $returnValue=$this->model->placeOrder($this->checkOutDTO);
        if($returnValue)
        {
    
            $this->msg = "recent Order was successfully Placed";
            $this->loggedUser = $_SESSION['loggedUser']??"no";
            $this->name = $_SESSION['UserName']??"no";
            $this->homeview->displayMessages($this->msg,$this->loggeduser,$this->name);
            
        }
        else
        {
            echo "ordernotplaced";
        }
    }
    
}
