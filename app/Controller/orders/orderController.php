<?php
namespace App\Controller\orders;
require "../../../vendor/autoload.php";
use App\Model\Home\CategoryModel;
use App\View\orders\OrderView;
session_start();

/**
 * orderController will get book detail
 * 
 * and get book category wise for showing similarBooks.
 * 
 */
class orderController
{
    private OrderView $orderView;
    public function __construct(OrderView $orderView)
    {
      $this->orderView=$orderView;
    }
    /**
     * ordersController function will
     * 
     * will get books by category and also send quantity,totalprice,
     * 
     * title,bookid as parameter to displayOrders function.
     * 
     * @access public
     *
     * @return void
     */
    public function ordersController():void
    {
        $category =new CategoryModel();
        $category->setCategory($_POST['category']);
        $category->fetchBookByCategory();
        $categoryBooks= $category->getFetchBook();
        $loggeduser = $_SESSION['loggedUser'];
        $name = $_SESSION['UserName'];
        $this->orderView->displayOrders($loggeduser,$name,$_POST,$categoryBooks);
    }
}
$ordersview= new OrderView();
$orderController = new orderController($ordersview);
$orderController->ordersController();