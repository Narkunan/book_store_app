<?php
namespace App\Controller\orders;
require "../../../vendor/autoload.php";
use App\View\orders\displayOrder;
session_start();

class orderController
{
    private displayOrder $orderView;
    public function __construct($orderView)
    {
      $this->orderView=$orderView;
    }
    public function ordersController()
    {
        $loggeduser = $_SESSION['loggedUser'];
        $name = $_SESSION['UserName'];
        $this->orderView->displayOrders($loggeduser,$name,$_POST);
    }
}
$ordersview= new displayOrder();
$orderController = new orderController($ordersview);
$orderController->ordersController();