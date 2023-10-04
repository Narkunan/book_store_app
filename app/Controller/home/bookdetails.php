<?php
namespace App\Controller\home;
use App\Controller\home\HomeBaseClass;
use App\Model\Home\HomeDTO;
use App\View\ViewDTO;
use App\model\Home\category;
/**
 * indexController is for Display Selected book in home page.
 */
class bookdetails extends HomeBaseClass
{
   private $model;

   public function __construct($model)
   {
      $this->model = $model;
   }
    
    /**
     * By using bookid display details of book.
     *
     * 
     * @access public
     * 
     * @return void
     * 
     */
    public function findBook(array $value):ViewDTO
    {
       $homeDto = new HomeDTO();
       $category = new category();
        $categorys = $category->category();
       $homeDto->setBookId($value["id"]);
       if($this->model->fetchBook($homeDto))
       {
          //$this->books=$this->homeDTO->getFetchBook();
          //$this->view->displaySelectedBook($this->books,$this->loggedUser,$this->name);
          $data=[
            "book"=>$homeDto->getFetchBook(),
            'category'=>$categorys

          ];
          return new ViewDTO(
            "app/view/home","bookdetails.html.twig",$data
          );
       }
       else
       {
            $data=[
               "msg"=>"problem with fetching book"
            ];
            return new ViewDTO(
               "app/view/home","HomeDisplayMessage.html.twig",$data
            );
       }
       
    }
}
