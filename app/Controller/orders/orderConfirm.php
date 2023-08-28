<?php
namespace App\Controller\orders;
session_start();
require "../../../vendor/autoload.php";
use App\Model\orders\ordersModel;
use App\View\Home\displayHome;
class OrderConfirm
{
    private ordersModel $ordersModel;
    private displayHome $orderConfirmView;

    public function __construct($ordersModel,$orderConfirm)
    {
        $this->ordersModel=$ordersModel;
        $this->orderConfirmView=$orderConfirm;
    }
    public function ordersConfirmController()
    {
        
        $this->ordersModel->setBookid($_POST['bookid']);
        $this->ordersModel->setTotalPrice($_POST['totalprice']);
        $this->ordersModel->setUserid($_SESSION['Userid']);
        $this->ordersModel->setQuantity($_POST['quantity']);
        $returnValue=$this->ordersModel->placeOrder();
        if($returnValue)
        {
            
            //$this->orderConfirmView->displayBook();
            $msg = "recent Order was successfully Placed";
            $loggedUser = $_SESSION['loggedUser']??"no";
            $name = $_SESSION['UserName']??"no";
            $this->orderConfirmView->displayMessages($msg,$loggedUser,$name);
            
        }
        else
        {
            echo "ordernotplaced";
        }
    }
    
}
$ordermodel=new ordersModel();
$orderConfirmView = new displayHome();
$ordersconfirm = new OrderConfirm($ordermodel,$orderConfirmView);
$ordersconfirm->ordersConfirmController();