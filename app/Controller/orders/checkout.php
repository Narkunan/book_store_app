<?php
namespace App\Controller\orders;
use App\Model\Home\category;
use App\Model\Home\CategoryModel;
use App\Model\Home\HomeDTO;
use App\Controller\orders\OrderBase;
use App\Model\orders\checkOutDTO;
use App\View\ViewDTO;

/**
 * orderController will get book detail
 * 
 * and get book category wise for showing similarBooks.
 * 
 */
class checkout extends OrderBase
{
    private $model;
    public function __construct($model)
    {
        $this->model = $model;
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
    public function checkoutcontroller(array $value):ViewDTO
    {

        $checkOutDTO = new checkOutDTO();
        $category =new CategoryModel();
        $homedto = new HomeDTO();
        $homedto->setCategory($_POST['category']);
        $category->fetchBookByCategory($homedto);
        $categoryBooks= $homedto->getFetchBook();
        $checkOutDTO->setPrice($_POST['bprice']);
        $checkOutDTO->setQuantity($_POST['quantity']);
        $checkOutDTO->setTotalPrice();
        $totalprice =$checkOutDTO->getTotalPrice();
        //$loggeduser = $_SESSION['loggedUser'];
        //$name = $_SESSION['UserName'];
        $categorywise=new category();
        $categorywisebook=$categorywise->category();
         $data =[
            "price"=>$totalprice,
            "bid"=>$_POST['bid'],
            "source"=>$_POST['imagesource'],
            "title"=>$_POST['btitle'],
            'quantity'=>$_POST['quantity'],
            'category'=>$categorywisebook,
            'similar'=>$categoryBooks

         ];
         return new ViewDTO(
             "app/view/orders","ordersView.html.twig",$data
         );
        //$this->orderview->displayOrders($loggeduser,$name,$_POST,$totalprice,$categoryBooks);
    }
}
