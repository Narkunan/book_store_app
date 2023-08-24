<?php
namespace App\Controller\orders;
session_start();
require "../../../vendor/autoload.php";
use App\Model\orders\ordersModel;
use App\View\orders\ordersConfirmView;
class OrderConfirm
{
    private ordersModel $ordersModel;
    private ordersConfirmView $orderConfirmView;

    public function __construct($ordersModel,$orderConfirm)
    {
        $this->ordersModel=$ordersModel;
        $this->orderConfirmView=$orderConfirm;
    }
    public function ordersConfirmController()
    {
        
        $this->ordersModel->setBookid($_SESSION['bid']);
        $this->ordersModel->setTotalPrice($_SESSION['tprice']);
        $this->ordersModel->setUserid($_SESSION['userid']);
        $this->ordersModel->setQuantity($_SESSION['quantity']);
        $returnValue=$this->ordersModel->placeOrder();
        if($returnValue)
        {
            $this->uninitializeSession();
            $this->orderConfirmView->displayBook();
            
        }
        else
        {
            echo "ordernotplaced";
        }
    }
    public function uninitializeSession()
    {
        unset($_SESSION['bid']);
        unset($_SESSION['tprice']);
        
        unset($_SESSION['quantity']);
        unset($_SESSION['img']);
        unset($_SESSION['title']);
    }
}
$ordermodel=new ordersModel();
$orderConfirmView = new ordersConfirmView();
$ordersconfirm = new OrderConfirm($ordermodel,$orderConfirmView);
$ordersconfirm->ordersConfirmController();