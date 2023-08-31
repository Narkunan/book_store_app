<?php
namespace App\Controller\orders;
use App\Model\Home\category;
session_start();
require "../../../vendor/autoload.php";
use App\Model\orders\ordersModel;
use App\View\Home\displayHome;
/**
 * orderConfirm will Create new order record in the database.
 * 
 */
class OrderConfirm
{
    private ordersModel $ordersModel;
    private displayHome $orderConfirmView;
    
    public function __construct(ordersModel $ordersModel,displayHome $orderConfirm)
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
$orderConfirmView = new displayHome();
$ordersconfirm = new OrderConfirm($ordermodel,$orderConfirmView);
$ordersconfirm->ordersConfirmController();