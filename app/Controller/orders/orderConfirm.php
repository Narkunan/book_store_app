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
    
            $this->msg = "recent Order was successfully Placed";
            //$this->loggedUser = $_SESSION['loggedUser']??"no";
            //$this->name = $_SESSION['UserName']??"no";
            $this->homeview->displayMessages($this->msg,$this->loggeduser,$this->name);
            $data=[
                "msg"=>$this->msg
            ];
            return new ViewDTO(
                "app/view/home","HomeDisplayMessage.html.twig",$data
            );
            
        }
        else
        {
            $this->msg="ordernotplaced";
            $data=[
                "msg"=>$this->msg
            ];
            return new ViewDTO(
                "app/view/home","HomeDisplayMessage.html.twig",$data
            );
        }
    }
    
}
