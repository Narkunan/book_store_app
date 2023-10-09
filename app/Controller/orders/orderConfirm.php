<?php
namespace App\Controller\orders;
use App\Controller\orders\OrderBase;
use App\Model\orders\checkOutDTO;
use App\View\ViewDTO;

/**
 * orderConfirm will Create new order record in the database.
 * 
 */
class OrderConfirm extends OrderBase
{

    private $model;
    public function __construct($model)
    {
        $this->model = $model;
    }

    /**
     * orderConfirmController will create new order record 
     * 
     * in the database.
     * 
     * @access public
     *
     * @return void
     */
    public function ordersConfirmController(array $value):ViewDTO
    {
        $checkoutDto = new checkOutDTO(); 
        $checkoutDto->setBookid($value['bookid']);
        $checkoutDto->setFinalPrice($value['totalprice']);
        $checkoutDto->setQuantity($value['quantity']);
        $checkoutDto->setUserid($_SESSION['Userid']);
        $returnValue=$this->model->placeOrder($checkoutDto);
        if($returnValue)
        {
          $this->data =[
            "msg"=>"recent Order was successfully Placed"
        ];
           
            return $this->displayMessage();
            
        }
        else
        {
            $this->data=[
                "msg"=>"ordernotplaced"
            ];
            
            return $this->displayMessage();
        }
    }
    
}
