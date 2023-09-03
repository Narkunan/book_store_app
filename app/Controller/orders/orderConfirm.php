<?php
namespace App\Controller\orders;
session_start();
require "../../../vendor/autoload.php";
use App\Model\orders\ordersModel;
use App\View\Home\HomeView;
/**
 * orderConfirm will Create new order record in the database.
 * 
 */
class OrderConfirm
{
    private ordersModel $ordersModel;
    private HomeView $orderConfirmView;
    
    public function __construct(ordersModel $ordersModel,HomeView $orderConfirm)
    {
        $this->ordersModel=$ordersModel;
        $this->orderConfirmView=$orderConfirm;
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
    public function ordersConfirmController():void
    {
        
        $this->ordersModel->setBookid($_POST['bookid']);
        $this->ordersModel->setTotalPrice($_POST['totalprice']);
        $this->ordersModel->setUserid($_SESSION['Userid']);
        $this->ordersModel->setQuantity($_POST['quantity']);
        
        $returnValue=$this->ordersModel->placeOrder();
        if($returnValue)
        {
    
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
$orderConfirmView = new HomeView();
$ordersconfirm = new OrderConfirm($ordermodel,$orderConfirmView);
$ordersconfirm->ordersConfirmController();