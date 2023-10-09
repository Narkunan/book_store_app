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
    private CategoryModel $model;

    private category $category;
    public function __construct(CategoryModel $model,category $category)
    {
        $this->model = $model;
        $this->category = $category;
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
        $homedto = new HomeDTO();
        $homedto->setCategory($_POST['category']);
        $this->model->fetchBookByCategory($homedto);
        $categoryBooks= $homedto->getFetchBook();
        $checkOutDTO->setPrice($_POST['bprice']);
        $checkOutDTO->setQuantity($_POST['quantity']);
        $checkOutDTO->setTotalPrice();
        $totalprice =$checkOutDTO->getTotalPrice();
        $categorywisebook=$this->category->category();
         $this->data =[
            "price"=>$totalprice,
            "bid"=>$_POST['bid'],
            "source"=>$_POST['imagesource'],
            "title"=>$_POST['btitle'],
            'quantity'=>$_POST['quantity'],
            'category'=>$categorywisebook,
            'similar'=>$categoryBooks

         ];
         return new ViewDTO(
             "app/view/orders","ordersView.html.twig",$this->data
         );
       
    }
}
