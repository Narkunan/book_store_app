<?php
namespace App\Controller\orders;
use App\Model\Home\CategoryModel;
use App\Model\Home\HomeDTO;
use App\Controller\orders\OrderBase;
/**
 * orderController will get book detail
 * 
 * and get book category wise for showing similarBooks.
 * 
 */
class checkout extends OrderBase
{
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
    public function checkoutcontroller(array $value):void
    {
        $category =new CategoryModel();
        $homedto = new HomeDTO();
        $homedto->setCategory($_POST['category']);
        $category->fetchBookByCategory($homedto);
        $categoryBooks= $homedto->getFetchBook();
        $this->checkOutDTO->setPrice($_POST['bprice']);
        $this->checkOutDTO->setQuantity($_POST['quantity']);
        $this->checkOutDTO->setTotalPrice();
        $totalprice =$this->checkOutDTO->getTotalPrice();
        $loggeduser = $_SESSION['loggedUser'];
        $name = $_SESSION['UserName'];
        
        $this->orderview->displayOrders($loggeduser,$name,$_POST,$totalprice,$categoryBooks);
    }
}
