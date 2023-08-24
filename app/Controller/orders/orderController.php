<?php
namespace App\Controller\orders;
require "../../../vendor/autoload.php";
use App\View\orders\ordersView;

class orderController
{
    private ordersView $orderView;
    public function __construct($orderView)
    {
      $this->orderView=$orderView;
    }
    public function ordersController()
    {
        $this->orderView->displayBook($_POST['quantity'],$_POST['bid']);
    }
}
$ordersview= new ordersView();
$orderController = new orderController($ordersview);
$orderController->ordersController();